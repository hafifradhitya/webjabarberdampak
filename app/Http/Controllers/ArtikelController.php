<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->get();
        confirmDelete('Hapus Artikel', 'Apakah anda yakin ingin menghapus data ini?');
        return view('artikel.index', compact('artikels'));
    }

    public function create()
    {
        return view('artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->kategori === 'lainnya' && $request->filled('kategori_lainnya')) {
            $data['kategori'] = $request->kategori_lainnya;
        }

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('artikels', 'public');
        }

        Artikel::create($data);

        toast()->success('Artikel berhasil disimpan');
        return redirect()->route('artikel.index');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $artikel = Artikel::findOrFail($id);

        $data = $request->all();
        if ($request->kategori === 'lainnya' && $request->filled('kategori_lainnya')) {
            $data['kategori'] = $request->kategori_lainnya;
        }

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('artikels', 'public');
        }

        $artikel->update($data);

        toast()->success('Artikel berhasil diperbarui');
        return redirect()->route('artikel.index');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->gambar) {
            Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();

        toast()->success('Artikel berhasil dihapus');
        return redirect()->route('artikel.index');
    }

    public function preview($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('artikel.preview', compact('artikel'));
    }
}
