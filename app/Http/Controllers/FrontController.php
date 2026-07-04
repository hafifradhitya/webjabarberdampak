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
        $kegiatans = Kegiatan::with('documentations')->latest()->get();
        
        return view('front.program', compact('prokers', 'kegiatans'));
    }

    public function detailProker($slug)
    {
        $proker = Proker::where('slug', $slug)->firstOrFail();
        return view('front.detail-proker', compact('proker'));
    }

    public function detailKegiatan($slug)
    {
        $kegiatan = Kegiatan::with('documentations')->where('slug', $slug)->firstOrFail();
        return view('front.detail-kegiatan', compact('kegiatan'));
    }

    public function artikel(Request $request)
    {
        $kategoris = Artikel::where('status', 'Published')->select('kategori')->distinct()->pluck('kategori');

        $query = Artikel::where('status', 'Published');

        if ($request->has('kategori') && $request->kategori != 'all') {
            $query->where('kategori', strtolower($request->kategori));
        }

        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $query->latest('tanggal_publish');

        // Featured article is the first result of the filtered query that has is_headline = true
        // If no headline exists, fallback to the latest article
        $featuredArtikel = (clone $query)->where('is_headline', true)->first() ?? $query->first();

        // The rest of the grid articles (paginate 9 per page)
        if ($featuredArtikel) {
            $gridQuery = clone $query;
            $gridArtikels = $gridQuery->where('id', '!=', $featuredArtikel->id)->paginate(9)->withQueryString();
        } else {
            $gridArtikels = new \Illuminate\Pagination\LengthAwarePaginator([], 0, 9);
        }

        return view('front.artikel', compact('featuredArtikel', 'gridArtikels', 'kategoris'));
    }

    public function detailArtikel($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        return view('front.detail-artikel', compact('artikel'));
    }
}
