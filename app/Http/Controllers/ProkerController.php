<?php

namespace App\Http\Controllers;

use App\Models\Proker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'gambar' => 'required|image',
        ]);

        $data = $request->all();

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
        ]);

        $proker = Proker::findOrFail($id);
        $data = $request->all();

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
}
