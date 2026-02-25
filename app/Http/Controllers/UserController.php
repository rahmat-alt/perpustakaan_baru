<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Berita;
use App\Models\Jadwal;
use App\Models\heroinfo;
use App\Models\card;


class UserController extends Controller
{
    public function user()
    {
        // berita hanya yang publish
        $berita = Berita::where('status', 'publish')
            ->latest()
            ->limit(6)
            ->get();

        // jadwal
        $jadwal   = Jadwal::latest()->get();
        $heroinfo = Heroinfo::latest()->get();
        $card1    = card::latest()->get();

        // kalau masih perlu gambar slider
        $gambar = DB::table('gambars')->get();
        return view('user.user', compact('berita', 'jadwal', 'gambar', 'heroinfo', 'card1'));
    }
}
