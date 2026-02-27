<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Form;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Mews\Captcha\Facades\Captcha;
use App\Models\User;


class FormController extends Controller
{
    public function show()
    {
        $form = DB::table('form')->get();
        return view('form-contact.show', compact('form'));
    }

    public function create()
    {
        return view('user.user');
    }

    // refresh captcha
    public function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img('flat')]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required',
            'email'   => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'captcha' => 'required|captcha',  // <- validasi captcha
        ], [
            'captcha.captcha' => 'Kode captcha salah!'
        ]);
        if (!captcha_check($request->captcha)) {
            return redirect()->back()
                ->withErrors(['captcha' => 'Captcha tidak sesuai!'])
                ->withInput();
        }

        DB::table('form')->insert([
            'nama'    => $request->nama,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('user.user')->with('success', 'Data berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        DB::table('form')->where('id', $id)->delete();
        return redirect()->route('form.user')->with('danger', 'Data berhasil dihapus!');
    }

    public function edit($id)
    {
        $form = DB::table('form')->where('id', $id)->first();
        return view('form-contact.edit', compact('form'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'captcha' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::table('form')->where('id', $id)->update([
            'nama'    => $request->nama,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('form.user')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Aturan password (optional jika mau pakai validasi password)
     */
    protected function passwordRules()
    {
        return [
            'required',
            'string',
            'min:8',
            'confirmed',
        ];
    }
}
