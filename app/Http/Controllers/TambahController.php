<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class TambahController extends Controller
{
    public function index()
    {
        $tambah = DB::table('tambah')->get();
        $tambah = DB::table('tambah')->paginate(5);
        return view('tambah-buku.create-tambah', ['tambah' => $tambah]);
    }
    // =====================================================hapus====================================================
    public function hapus($id)
    {
        DB::table('tambah')->where('id', $id)->delete();
        return redirect('/tambah-buku')->with('danger', 'Data berhasil dihapus');
    }
    //====================================================tambah data====================================================


    public function tambah()
    {
        $gambar = Gambar::all();
        return view('user.tambah-buku', compact('gambar'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'judul_buku'           => 'required|string',
            'tanggal_dipinjam'     => 'required|date',
            'tanggal_dikembalikan' => 'required|date|after_or_equal:tanggal_dipinjam',
        ]);

        DB::table('tambah')->insert([
            'nama_peminjam'        => Auth::user()->name,
            'nomor_anggota'        => Auth::user()->no_anggota,
            'judul_buku'           => $request->judul_buku,
            'tanggal_dipinjam'     => $request->tanggal_dipinjam,
            'tanggal_dikembalikan' => $request->tanggal_dikembalikan,
        ]);

        return redirect()->route('user.user')
            ->with('success', 'Data berhasil ditambahkan');
    }
    //====================================================end tambah data====================================================


    public function createPeminjaman($id)
    {
        $buku = Gambar::findOrFail($id);
        return view('user.tambah-buku', compact('buku'));
    }
}
