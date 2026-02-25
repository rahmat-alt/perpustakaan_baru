<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Gambar;
use Illuminate\Support\Facades\File;


class BukuController extends Controller
{

    public function show()
    {
        return view('crud_buku.create');
    }

    public function buku()
    {
        return view('dashboard.buku');
    }
    public function update()
    {
        $gambar = Gambar::get();
        return view('crud_buku.update', ['gambar' => $gambar]);
    }

    public function proses(Request $request)
    {
        $request->validate([
            'foto'     => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'judul'    => 'required',
            'penulis'  => 'required',
            'stok'     => 'required',
            'dipinjam' => 'required',
            'status'   => 'required|in:tersedia,tidak tersedia',
        ]);

        $foto = $request->file('foto');

        $nama_foto = time() . "_" . $foto->getClientOriginalName();
        echo '<br>';

        $tujuan_upload = 'data_file';

        $foto->move($tujuan_upload, $nama_foto);

        gambar::create([
            'foto'     => $nama_foto,
            'judul'    => $request->judul,
            'penulis'  => $request->penulis,
            'stok'     => $request->stok,
            'dipinjam' => $request->dipinjam,
            'status'   => $request->status,
        ]);
        return redirect('update');
    }
    public function hapus($id)
    {
        $gambar = Gambar::findOrFail($id);

        // path file
        $path = public_path('data_file/' . $gambar->foto);

        // hapus file jika ada
        if (File::exists($path)) {
            File::delete($path);
        }

        // hapus data database
        $gambar->delete();

        return redirect()->route('update')->with('success', 'Data berhasil dihapus');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:tersedia,tidak tersedia',
        ]);

        $buku = Gambar::findOrFail($id);
        $buku->status = $request->status;
        $buku->save();

        return redirect()->back()->with('success', 'Status buku berhasil diperbarui');
    }
}
