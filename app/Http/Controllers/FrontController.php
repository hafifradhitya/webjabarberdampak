<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proker;
use App\Models\Kegiatan;
use App\Models\Artikel;

class FrontController extends Controller
{
    public function program()
    {
        $prokers = Proker::latest()->get();
        $kegiatans = Kegiatan::latest()->get();
        
        return view('front.program', compact('prokers', 'kegiatans'));
    }

    public function detailProker($id)
    {
        $proker = Proker::findOrFail($id);
        return view('front.detail-proker', compact('proker'));
    }

    public function detailKegiatan($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('front.detail-kegiatan', compact('kegiatan'));
    }

    public function artikel()
    {
        $artikels = Artikel::where('status', 'Published')->latest('tanggal_publish')->get();
        $kategoris = Artikel::where('status', 'Published')->select('kategori')->distinct()->pluck('kategori');
        
        return view('front.artikel', compact('artikels', 'kategoris'));
    }

    public function detailArtikel($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('front.detail-artikel', compact('artikel'));
    }
}
