<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::with('documentations')->latest()->get();
        confirmDelete('Hapus Kegiatan', 'Apakah anda yakin ingin menghapus data ini?');
        return view('kegiatan.index', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required|date',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'deskripsi' => 'nullable|string',
            'dokumentasi' => 'nullable|array|max:5',
            'dokumentasi.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = $request->only([
            'nama_kegiatan',
            'tanggal_kegiatan',
            'lokasi',
            'deskripsi',
            'status',
        ]);
        $uuid = Str::uuid()->toString();
        $data['id'] = $uuid;
        $data['slug'] = Str::slug($request->nama_kegiatan) . '-' . $uuid;

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $kegiatan = Kegiatan::create($data);

        $this->storeDocumentations($kegiatan, $request->file('dokumentasi', []));

        toast()->success('Kegiatan berhasil disimpan');
        return redirect()->route('kegiatan.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required|date',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'deskripsi' => 'nullable|string',
            'dokumentasi' => 'nullable|array|max:5',
            'dokumentasi.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'hapus_dokumentasi' => 'nullable|array',
            'hapus_dokumentasi.*' => 'string',
        ]);

        $kegiatan = Kegiatan::with('documentations')->findOrFail($id);
        $data = $request->only([
            'nama_kegiatan',
            'tanggal_kegiatan',
            'lokasi',
            'deskripsi',
            'status',
        ]);
        $data['slug'] = Str::slug($request->nama_kegiatan) . '-' . $kegiatan->id;

        if ($request->hasFile('thumbnail')) {
            if ($kegiatan->thumbnail) {
                Storage::disk('public')->delete($kegiatan->thumbnail);
            }
            $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $deleteIds = collect($request->input('hapus_dokumentasi', []))->filter()->values();
        $newDocumentations = $request->file('dokumentasi', []);
        $newDocumentations = is_array($newDocumentations) ? array_filter($newDocumentations) : [];

        $remainingQuery = $kegiatan->documentations();
        if ($deleteIds->isNotEmpty()) {
            $remainingQuery->whereNotIn('id', $deleteIds);
        }

        if ($remainingQuery->count() + count($newDocumentations) > 5) {
            throw ValidationException::withMessages([
                'dokumentasi' => 'Total dokumentasi kegiatan maksimal 5 gambar.',
            ]);
        }

        if ($deleteIds->isNotEmpty()) {
            $kegiatan->documentations()
                ->whereIn('id', $deleteIds)
                ->get()
                ->each(function ($documentation) {
                    Storage::disk('public')->delete($documentation->image_path);
                    $documentation->delete();
                });
        }

        $kegiatan->update($data);
        $this->storeDocumentations($kegiatan, $newDocumentations);

        toast()->success('Kegiatan berhasil diperbarui');
        return redirect()->route('kegiatan.index');
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::with('documentations')->findOrFail($id);
        if ($kegiatan->thumbnail) {
            Storage::disk('public')->delete($kegiatan->thumbnail);
        }

        foreach ($kegiatan->documentations as $documentation) {
            Storage::disk('public')->delete($documentation->image_path);
        }

        $kegiatan->delete();
        toast()->success('Kegiatan berhasil dihapus');
        return redirect()->route('kegiatan.index');
    }

    private function storeDocumentations(Kegiatan $kegiatan, array $files): void
    {
        foreach ($files as $file) {
            if (!$file) {
                continue;
            }

            $kegiatan->documentations()->create([
                'image_path' => $file->store('kegiatan_documentations', 'public'),
            ]);
        }
    }
}
