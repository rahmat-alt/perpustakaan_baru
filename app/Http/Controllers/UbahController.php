<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UbahController extends Controller
{
    public function ubah(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);
        $user = User::findOrFail(Auth::id());
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Password lama salah']);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password berhasil diganti!');
    }
    //======================================================= untuk ubah password================================================
    public function ubah1()
    {
        return view('ubah-pass');
    }
}
