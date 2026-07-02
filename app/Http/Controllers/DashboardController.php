<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kegiatan;
use App\Models\Artikel;
use App\Models\Proker;
use Illuminate\Http\Request;
  
class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalKegiatan = Kegiatan::count();
        $totalArtikel = Artikel::count();
        $totalProker = Proker::count();

        // Data untuk grafik
        $prokerStatus = Proker::selectRaw('status, count(*) as count')
                              ->groupBy('status')
                              ->pluck('count', 'status')
                              ->toArray();
                              
        $kegiatanStatus = Kegiatan::selectRaw('status, count(*) as count')
                                  ->groupBy('status')
                                  ->pluck('count', 'status')
                                  ->toArray();

        return view('dashboard.index', compact(
            'totalUsers',
            'totalKegiatan',
            'totalArtikel',
            'totalProker',
            'prokerStatus',
            'kegiatanStatus'
        ));
    }
}
