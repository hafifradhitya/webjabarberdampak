<?php

namespace App\Http\Controllers;

use App\Models\Proker;
use Illuminate\Http\Request;

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
        ]);

        Proker::create($request->all());
        
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
        $proker->update($request->all());

        toast()->success('Program Kerja berhasil diperbarui');
        return redirect()->route('proker.index');
    }

    public function destroy($id)
    {
        Proker::destroy($id);
        toast()->success('Program Kerja berhasil dihapus');
        return redirect()->route('proker.index');
    }
}
