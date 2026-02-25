<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use Illuminate\Support\Facades\DB;

class PerpustakaanController extends Controller
{
    public function dashboard()
    {
        // Ringkasan data
        $totalStok     = Gambar::sum('stok');
        $totalDipinjam = Gambar::sum('dipinjam');

        $dikembalikan = DB::table('pengembalian')
            ->whereNotNull('tanggal_pengembalian')
            ->count();

        $belumDikembalikan = DB::table('pengembalian')
            ->whereNull('tanggal_pengembalian')
            ->count();

        // ===== CHART BUKU YANG SERING DIPINJAM =====
        $bukuSeringDipinjam = Gambar::orderByDesc('dipinjam')
            ->take(5)
            ->get(['judul', 'dipinjam']);

        $chartBukuLabels = $bukuSeringDipinjam->pluck('judul');
        $chartBukuData   = $bukuSeringDipinjam->pluck('dipinjam');

        return view('dashboard.content', compact(
            'totalStok',
            'totalDipinjam',
            'dikembalikan',
            'belumDikembalikan',
            'chartBukuLabels',
            'chartBukuData'
        ));
    }
}
