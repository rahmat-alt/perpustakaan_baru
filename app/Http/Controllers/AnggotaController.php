<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    public function view_anggota()
    {
        $anggota = DB::table('anggota')->get();
        return view('crud_anggota.view', ['anggota' => $anggota]);
    }
    // ================================================hapus anggota====================================================
    public function hapus_anggota($id)
    {
        DB::table('anggota')->where('id', $id)->delete();
        return redirect('/anggota')->with('danger', 'Data anggota berhasil dihapus!');
    }

    // =================================================tambah anggota====================================================
    public function tambah_anggota()
    {
        return view('crud_anggota.create-anggota');
    }

    public function anggota_proses(Request $request)
    {
        DB::table('anggota')->insert([
            'no_anggota'   => $request->no_anggota,
            'nama_anggota' => $request->nama_anggota,
            'alamat'       => $request->alamat,
            'email'        => $request->email,
            'no_telp'      => $request->no_telp
        ]);
        return redirect()->route('user.user')
            ->with('success', 'Data anggota berhasil ditambahkan!');
    }
// =================================================edit anggota====================================================
    public function anggota_edit($id)
    {
        $anggota = DB::table('anggota')->where('id', $id)->get();
        return view('crud_anggota.edit-anggota', ['anggota' => $anggota]);
    }

    public function anggota_update(Request $request)
    {
        DB::table('anggota')->where('id', $request->id)->update([
            'no_anggota'   => $request->no_anggota,
            'nama_anggota' => $request->nama_anggota,
            'alamat'       => $request->alamat,
            'email'        => $request->email,
            'no_telp'      => $request->no_telp
        ]);
        return redirect('/anggota')->with('success', 'Data anggota berhasil diubah!');
    }
}
