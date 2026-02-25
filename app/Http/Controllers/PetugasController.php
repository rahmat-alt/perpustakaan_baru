<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PetugasController extends Controller
{
    public function petugas()
    {
        $petugas = DB::table('petugas')->get();
        return view('crud_petugas.view-petugas', ['petugas' => $petugas]);
    }

    //===========================================================Tambah Petugas======================================
    public function tambah()
    {
        return view('crud_petugas.create');
    }
    public function proses(Request $request)
    {
        DB::table('petugas')->insert([
            'nama_petugas'  => $request->nama_petugas,
            'no_telp'       => $request->no_telp
        ]);
        return redirect('/petugas')->with('success', 'Data petugas berhasil ditambahkan!');
    }

    // ==========================================================Hapus Petugas======================================
    public function hapus($id)
    {
        DB::table('petugas')->where('id', $id)->delete();
        return redirect('/petugas')->with('danger', 'Data petugas berhasil dihapus!');
    }

    // ==========================================================Edit Petugas======================================
    public function edit($id)
    {
        $petugas = DB::table('petugas')->where('id', $id)->get();
        return view('crud_petugas.edit', ['petugas' => $petugas]);
    }

    public function update(Request $request)
    {
        DB::table('petugas')->where('id', $request->id)->update([
            'nama_petugas'  => $request->nama_petugas,
            'no_telp'       => $request->no_telp
        ]);
        return redirect('/petugas')->with('success', 'Data petugas berhasil diubah!');
    }
}
