<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->get();
        confirmDelete('Hapus Artikel', 'Apakah anda yakin ingin menghapus data ini?');
        return view('artikel.index', compact('artikels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
        ]);

        $data = $request->all();

        if ($request->kategori === 'lainnya' && $request->filled('kategori_lainnya')) {
            $data['kategori'] = $request->kategori_lainnya;
        }

        Artikel::create($data);
        
        toast()->success('Artikel berhasil disimpan');
        return redirect()->route('artikel.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
        ]);

        $artikel = Artikel::findOrFail($id);
        
        $data = $request->all();
        if ($request->kategori === 'lainnya' && $request->filled('kategori_lainnya')) {
            $data['kategori'] = $request->kategori_lainnya;
        }
        
        $artikel->update($data);

        toast()->success('Artikel berhasil diperbarui');
        return redirect()->route('artikel.index');
    }

    public function destroy($id)
    {
        Artikel::destroy($id);
        toast()->success('Artikel berhasil dihapus');
        return redirect()->route('artikel.index');
    }
}
