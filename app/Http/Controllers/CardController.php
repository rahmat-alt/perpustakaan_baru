<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\card;

class CardController extends Controller
{
    public function show()
    {
        $card1 = DB::Table('card')->get();
        return view('card-user.show', compact('card1'));
    }

    public function create()
    {
        return view('card-user.create');
    }

    public function store(request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'judul'     => 'required',
            'deskripsi' => 'required',
            'gambar'    => 'required |image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $foto          = $request->file('gambar');
            $nama_foto     = time() . "_" . $foto->getClientOriginalName();
            $tujuan_upload = public_path('images/service');
            $foto->move($tujuan_upload, $nama_foto);

            card::create([
                'nama'      => $request->nama,
                'judul'     => $request->judul,
                'deskripsi' => $request->deskripsi,
                'gambar'    => $nama_foto

            ]);
            return redirect()->route('card.user')
                ->with('success', 'Data Berhasil Disimpan!');
        }

        return redirect()->back()->withErrors('Gagal mengupload gambar.');
    }


    // delete
    public function destroy($id)
    {
        DB::table('card')->where('id', $id)->delete();
        return redirect('/card/user')->with('danger', 'Data card berhasil dihapus!');
    }
    // end delete

    // edit
    // end edit
}
