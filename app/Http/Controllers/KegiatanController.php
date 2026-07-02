<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatans = Kegiatan::latest()->get();
        confirmDelete('Hapus Kegiatan', 'Apakah anda yakin ingin menghapus data ini?');
        return view('kegiatan.index', compact('kegiatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required|date',
        ]);

        Kegiatan::create($request->all());
        
        toast()->success('Kegiatan berhasil disimpan');
        return redirect()->route('kegiatan.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required|date',
        ]);

        $kegiatan = Kegiatan::findOrFail($id);
        $kegiatan->update($request->all());

        toast()->success('Kegiatan berhasil diperbarui');
        return redirect()->route('kegiatan.index');
    }

    public function destroy($id)
    {
        Kegiatan::destroy($id);
        toast()->success('Kegiatan berhasil dihapus');
        return redirect()->route('kegiatan.index');
    }
}
