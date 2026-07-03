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
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
            'deskripsi' => 'nullable|string',
            'dokumentasi' => 'nullable|array|max:5',
            'dokumentasi.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'dokumentasi_caption' => 'nullable|array|max:5',
            'dokumentasi_caption.*' => 'nullable|string|max:160',
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

        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('kegiatan_banners', 'public');
        }

        $kegiatan = Kegiatan::create($data);

        $this->storeDocumentations(
            $kegiatan,
            $request->file('dokumentasi', []),
            $request->input('dokumentasi_caption', [])
        );

        toast()->success('Kegiatan berhasil disimpan');
        return redirect()->route('kegiatan.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required|date',
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
            'deskripsi' => 'nullable|string',
            'dokumentasi' => 'nullable|array|max:5',
            'dokumentasi.*' => 'image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'dokumentasi_caption' => 'nullable|array|max:5',
            'dokumentasi_caption.*' => 'nullable|string|max:160',
            'caption_dokumentasi' => 'nullable|array',
            'caption_dokumentasi.*' => 'nullable|string|max:160',
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

        if ($request->hasFile('banner')) {
            if ($kegiatan->banner) {
                Storage::disk('public')->delete($kegiatan->banner);
            }
            $data['banner'] = $request->file('banner')->store('kegiatan_banners', 'public');
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

        foreach ($request->input('caption_dokumentasi', []) as $documentationId => $caption) {
            $cleanCaption = trim((string) $caption);
            $kegiatan->documentations()
                ->whereKey($documentationId)
                ->update([
                    'caption' => $cleanCaption !== '' ? $cleanCaption : null,
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
        $this->storeDocumentations(
            $kegiatan,
            $newDocumentations,
            $request->input('dokumentasi_caption', [])
        );

        toast()->success('Kegiatan berhasil diperbarui');
        return redirect()->route('kegiatan.index');
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::with('documentations')->findOrFail($id);
        if ($kegiatan->banner) {
            Storage::disk('public')->delete($kegiatan->banner);
        }

        foreach ($kegiatan->documentations as $documentation) {
            Storage::disk('public')->delete($documentation->image_path);
        }

        $kegiatan->delete();
        toast()->success('Kegiatan berhasil dihapus');
        return redirect()->route('kegiatan.index');
    }

    private function storeDocumentations(Kegiatan $kegiatan, array $files, array $captions = []): void
    {
        $nextSortOrder = (int) $kegiatan->documentations()->max('sort_order');

        foreach (array_values($files) as $index => $file) {
            if (!$file) {
                continue;
            }

            $caption = isset($captions[$index]) ? trim((string) $captions[$index]) : null;
            $caption = $caption !== null && $caption !== '' ? $caption : null;

            $kegiatan->documentations()->create([
                'image_path' => $file->store('kegiatan_documentations', 'public'),
                'caption' => $caption,
                'sort_order' => ++$nextSortOrder,
            ]);
        }
    }
}
