<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\form;

class FormController extends Controller
{

    public function show()
    {
        $form = DB::table('form')->get();
        return view('form-contact.show', compact('form'));
    }

    //===================================================Tambah form======================================================
    public function create()
    {
        return view('user.user');
    }
    public function store(request $request)
    {
        $request->validate([
            'nama'    => 'required',
            'email'   => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        DB::table('form')->insert([
            'nama'    => $request->nama,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('user.user')->with('success', 'Data berhasil ditambahkan!');
    }
    //=======================================================destroy form=========================================
    public function destroy($id)
    {
        DB::table('form')->where('id', $id)->delete();
        return redirect()->route('form.user')->with('danger', 'Data berhasil dihapus!');
    }

    //====================================================edit form================================================
    public function edit($id)
    {
        $form = DB::table('form')->where('id', $id)->first();
        return view('form-contact.edit', compact('form'));
    }

    public function update(request $request, $id)
    {
        $request->validate([
            'nama'    => 'required',
            'email'   => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);
        DB::table('form')->where('id', $id)->update([
            'nama'    => $request->nama,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('form.user')->with('success', 'Data berhasil diubah!');
    }
}
