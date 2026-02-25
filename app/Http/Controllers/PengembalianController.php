<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    // ======================
    // SHOW DATA
    // ======================
    public function index()
    {
        $pengembalian = DB::table('pengembalian')
            ->join('gambars', 'pengembalian.id_buku', '=', 'gambars.id')
            ->select(
                'pengembalian.*',
                'gambars.foto',
                'gambars.judul',
                'gambars.penulis',
                'gambars.stok',
                'gambars.dipinjam',
                'gambars.status'
            )
            ->paginate(5);

        return view('buku-pengembalian.show', compact('pengembalian'));
    }

    // ======================
    // FORM CREATE
    // ======================
    public function create()
    {
        $user = DB::table('users')->get();
        $gambars = DB::table('gambars')->get(); // ← INI KUNCINYA

        return view('buku-pengembalian.create', compact('user', 'gambars'));
    }


    // ======================
    // STORE DATA
    // ======================
    public function store(Request $request)
    {
        $request->validate([
            'no_anggota'           => 'required',
            'tanggal_pengembalian' => 'required|date',
            'buku_id'              => 'required|integer|exists:gambars,id',
        ]);

        DB::transaction(function () use ($request) {

            // 1️⃣ Ambil data buku
            $buku = DB::table('gambars')
                ->where('id', $request->buku_id)
                ->lockForUpdate()
                ->firstOrFail();

            // 2️⃣ Simpan pengembalian
            DB::table('pengembalian')->insert([
                'id_buku'              => $buku->id,
                'no_anggota'           => $request->no_anggota,
                'judul_buku'           => $buku->judul,
                'tanggal_pengembalian' => $request->tanggal_pengembalian,
                'created_at'           => now(),
                'updated_at'           => now(),
            ]);


            // 3️⃣ Tambah stok buku
            DB::table('gambars')
                ->where('id', $buku->id)
                ->increment('stok', 1);
        });

        return redirect('/pengembalian-buku')
            ->with('success', 'Pengembalian berhasil');
    }

    // ======================
    // DELETE DATA
    // ======================
    public function delete($id)
    {
        DB::transaction(function () use ($id) {

            // 1️⃣ Ambil data pengembalian
            $pengembalian = DB::table('pengembalian')->where('id', $id)->first();

            if (!$pengembalian) {
                return;
            }

            // 2️⃣ Ambil buku berdasarkan judul
            $buku = DB::table('gambars')
                ->where('judul', $pengembalian->judul_buku)
                ->lockForUpdate()
                ->first();

            if ($buku) {
                // 3️⃣ Kurangi stok buku
                DB::table('gambars')
                    ->where('id', $buku->id)
                    ->decrement('stok', 1);
            }

            // 4️⃣ Hapus data pengembalian
            DB::table('pengembalian')->where('id', $id)->delete();
        });

        return redirect('/pengembalian-buku')
            ->with('danger', 'Data pengembalian dihapus');
    }
}
