<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jadwal;

class JadwalController extends Controller
{

    public function show_jadwal()
    {
        $jadwal = DB::table('jadwal')->get();
        return view('jadwal-perpustakaan.show', compact('jadwal'));
    }

    //================================================ create jadwal===================================================
    public function upload_jadwal()
    {
        return view('jadwal-perpustakaan.create');
    }
    public function jadwal_upload(Request $request)
    {

        $jadwal = DB::table('jadwal')->first();

        $request->validate([
            'hari'       => 'required',
            'jam'        => 'required',
            'tutup'      => 'required',
            'keterangan' => 'required',
        ]);

        if ($jadwal) {
            // Jika ada, update data
            DB::table('jadwal')->where('id', $jadwal->id)->update([
                'hari'       => $request->hari,
                'jam'        => $request->jam,
                'tutup'      => $request->tutup,
                'keterangan' => $request->keterangan,
            ]);
        } else {
            // Jika tidak ada, insert data baru
            DB::table('jadwal')->insert([
                'hari'       => $request->hari,
                'jam'        => $request->jam,
                'tutup'      => $request->tutup,
                'keterangan' => $request->keterangan,
            ]);
        }
        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil ditambahkan!');
    }

    //================================================= edit jadwal===================================================
    public function edit($id)
    {
        $jadwal = DB::table('jadwal')->where('id', $id)->first();
        return view('jadwal-perpustakaan.edit', compact('jadwal'));
    }
    public function update(Request $request, $id)
    {
        DB::table('jadwal')->where('id', $id)->update([
            'hari'       => $request->hari,
            'jam'        => $request->jam,
            'tutup'      => $request->tutup,
            'keterangan' => $request->keterangan
        ]);
        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil diubah!');
    }

    //=================================================hapus jadwal===================================================
    public function hapus($id)
    {
        DB::table('jadwal')->where('id', $id)->delete();
        return redirect()->route('jadwal.index')->with('success', 'Data jadwal berhasil dihapus!');
    }
}
