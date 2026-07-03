<?php

namespace App\Http\Controllers;

use App\Models\Proker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProkerController extends Controller
{
    public function index()
    {
        $prokers = Proker::latest()->get();
        confirmDelete('Hapus Program Kerja', 'Apakah anda yakin ingin menghapus data ini?');
        return view('proker.index', compact('prokers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_proker' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'anggaran' => 'nullable|numeric|min:0',
            'status' => 'nullable|in:planning,ongoing,completed,cancelled',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = $this->prokerData($request);
        $uuid = Str::uuid()->toString();
        $data['id'] = $uuid;
        $data['slug'] = Str::slug($request->nama_proker) . '-' . $uuid;

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('proker_images', 'public');
        }

        Proker::create($data);
        
        toast()->success('Program Kerja berhasil disimpan');
        return redirect()->route('proker.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_proker' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
            'anggaran' => 'nullable|numeric|min:0',
            'status' => 'nullable|in:planning,ongoing,completed,cancelled',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $proker = Proker::findOrFail($id);
        $data = $this->prokerData($request);
        $data['slug'] = Str::slug($request->nama_proker) . '-' . $proker->id;

        if ($request->hasFile('gambar')) {
            if ($proker->gambar) {
                Storage::disk('public')->delete($proker->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('proker_images', 'public');
        }

        $proker->update($data);

        toast()->success('Program Kerja berhasil diperbarui');
        return redirect()->route('proker.index');
    }

    public function destroy($id)
    {
        $proker = Proker::findOrFail($id);
        if ($proker->gambar) {
            Storage::disk('public')->delete($proker->gambar);
        }
        $proker->delete();
        toast()->success('Program Kerja berhasil dihapus');
        return redirect()->route('proker.index');
    }

    private function prokerData(Request $request): array
    {
        $data = $request->only([
            'nama_proker',
            'tanggal_mulai',
            'tanggal_selesai',
            'penanggung_jawab',
            'deskripsi',
            'anggaran',
            'status',
        ]);

        $data['anggaran'] = $request->filled('anggaran') ? $request->input('anggaran') : 0;
        $data['status'] = $request->input('status') ?: 'planning';

        return $data;
    }
}
