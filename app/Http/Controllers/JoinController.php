<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Join;

class JoinController extends Controller
{
    public function show()
    {
        $join = DB::table('join')->get();
        return view('card-user.join-us_anggota.show', compact('join'));
    }

    public function create()
    {
        return view('card-user.join-us_anggota.create');
    }

    public function store(request $request)
    {
        $request->validate([
            'nama_anggota' => 'required',
            'alamat'       => 'required',
            'email'        => 'required',
            'no_hp'        => 'required',
        ]);

        DB::table('join')->insert([
            'nama_anggota' => $request->nama_anggota,
            'alamat'       => $request->alamat,
            'email'        => $request->email,
            'no_hp'        => $request->no_hp,
        ]);
        return redirect()->route('join.show')->with('success', 'Data berhasil ditambahkan!');
    }
}
