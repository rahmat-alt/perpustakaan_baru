<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\hero;

class HeroController extends Controller
{

    public function show()
    {
        $hero = DB::table('hero')->get();

        return view('user.dashboard-user.hero-banner.show', compact('hero'));
    }

    // ==================================================create hero==================================================
    public function create()
    {

        return view('user.dashboard-user.hero-banner.create');
    }

    public function store(Request $request)
    {
        $info = DB::table('hero')->first();

        if ($info) {
            // Jika ada, update data
            DB::table('hero')->where('id', $info->id)->update([
                'pre_title' => $request->pre_title,
                'judul'     => $request->judul,
                'deskripsi' => $request->deskripsi,

            ]);
        } else {
            // Jika tidak ada, insert data baru
            DB::table('info')->insert([
                'pre_title' => $request->pre_title,
                'judul'     => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);
        }

        return redirect()->route('info-hero')->with('success', 'Data hero berhasil ditambahkan!');
    }
    //===================================================edit hero===================================================
    public function edit($id)
    {
        $hero = DB::table('hero')->where('id', $id)->get();
        return view('user.dashboard-user.hero-banner.edit', compact('hero'));
    }

    public function update(Request $request, $id)
    {
        DB::table('hero')->where('id', $id)->update([
            'pre_title' => $request->pre_title,
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi
        ]);
        return redirect('/info-hero')->with('success', 'Data hero berhasil diubah!');
    }
    // end edit

    //==============================================================destroy hero==============================================================
    public function destroy($id)
    {
        DB::table('hero')->where('id', $id)->delete();
        return redirect()->route('info-hero')->with('danger', 'Data hero berhasil dihapus!');
    }
    // end destroy
}
