<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\info;

class InfoController extends Controller
{

    public function show()
    {
        $info = DB::table('info')->get();
        return view('user.dashboard-user.info-card.show', compact('info'));
    }

    public function create()
    {
        return view('user.dashboard-user.info-card.create');
    }

    public function store(Request $request)
    {
        // Cek ada data atau tidak
        $info = DB::table('info')->first();

        if ($info) {
            // Jika ada, update data
            DB::table('info')->where('id', $info->id)->update([
                'phone_number' => $request->phone_number,
                'email'        => $request->email,
                'address'      => $request->address,
                'website'      => $request->website,
            ]);
        } else {
            // Jika tidak ada, insert data baru
            DB::table('info')->insert([
                'phone_number' => $request->phone_number,
                'email'        => $request->email,
                'address'      => $request->address,
                'website'      => $request->website,
            ]);
        }

        return redirect()->route('info-card')->with('success', 'Data info berhasil disimpan!');
    }

    // destroy
    public function destroy($id)
    {
        DB::table('info')->where('id', $id)->delete();
        return redirect('/info-card')->with('danger', 'Data info berhasil dihapus!');
    }

    // edit
    public function edit($id)
    {
        $info = DB::table('info')->where('id', $id)->first();
        return view('user.dashboard-user.info-card.edit', compact('info'));
    }

    public function update(Request $request, $id)
    {
        DB::table('info')->where('id', $id)->update([
            'phone_number' => $request->phone_number,
            'email'        => $request->email,
            'address'      => $request->address,
            'website'      => $request->website
        ]);
        return redirect('/info-card')->with('success', 'Data info berhasil diubah!');
    }
    // end edit
}
