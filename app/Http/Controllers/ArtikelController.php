<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Traits\ProcessesBase64Images;

class ArtikelController extends Controller
{
    use ProcessesBase64Images;

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
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $data = $request->all();
        $uuid = Str::uuid()->toString();
        $data['id'] = $uuid;
        $data['slug'] = Str::slug($request->judul) . '-' . $uuid;

        if ($request->kategori === 'lainnya' && $request->filled('kategori_lainnya')) {
            $data['kategori'] = $request->kategori_lainnya;
        }

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('artikels', 'public');
        }

        // Process base64 images in content
        if (isset($data['konten'])) {
            $data['konten'] = $this->processBase64Images($data['konten'], 'public', 'artikels_content');
        }
        
        $data['is_headline'] = $request->has('is_headline');
        if ($data['is_headline']) {
            Artikel::where('is_headline', true)->update(['is_headline' => false]);
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
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $artikel = Artikel::findOrFail($id);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul) . '-' . $artikel->id;
        if ($request->kategori === 'lainnya' && $request->filled('kategori_lainnya')) {
            $data['kategori'] = $request->kategori_lainnya;
        }

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('artikels', 'public');
        }

        // Process base64 images in content
        if (isset($data['konten'])) {
            $data['konten'] = $this->processBase64Images($data['konten'], 'public', 'artikels_content');
        }

        $data['is_headline'] = $request->has('is_headline');
        if ($data['is_headline']) {
            Artikel::where('id', '!=', $id)->where('is_headline', true)->update(['is_headline' => false]);
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
