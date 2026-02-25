<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\heroinfo;

class UserhiController extends Controller
{
    public function show()
    {
        $heroinfo = DB::table('heroinfo')->get();
        return view('userhi.show', compact('heroinfo'));
    }

    //=================================================Tambah UserHI==============================================
    public function create()
    {
        return view('userhi.create');
    }

    public function store(Request $request)
    {
        $heroinfo = DB::table('heroinfo')->first();

        if ($heroinfo) {
            DB::table('heroinfo')->where('id', $heroinfo->id)->update([
                'pre_title'     => $request->pre_title,
                'judul'         => $request->judul,
                'deskripsi'     => $request->deskripsi,
                'phone_number'  => $request->phone_number,
                'email'         => $request->email,
                'address'       => $request->address,
                'website'       => $request->website,
            ]);
        } else {
            DB::table('heroinfo')->insert([
                'pre_title'     => $request->pre_title,
                'judul'         => $request->judul,
                'deskripsi'     => $request->deskripsi,
                'phone_number'  => $request->phone_number,
                'email'         => $request->email,
                'address'       => $request->address,
                'website'       => $request->website,
            ]);
        }
        return redirect('userhi')->with('success', 'Data hero berhasil ditambahkan!');
    }
    //=================================================Edit UserHI==============================================
    public function edit($id)
    {
        $heroinfo = DB::table('heroinfo')->where('id', $id)->first();
        return view('userhi.edit', compact('heroinfo'));
    }

    public function update(Request $request, $id)
    {
        DB::table('heroinfo')->where('id', $id)->update([
            'pre_title'     => $request->pre_title,
            'judul'         => $request->judul,
            'deskripsi'     => $request->deskripsi,
            'phone_number'  => $request->phone_number,
            'email'         => $request->email,
            'address'       => $request->address,
            'website'       => $request->website,
        ]);
        return redirect('userhi')->with('success', 'Data hero berhasil diubah!');
    }
}
