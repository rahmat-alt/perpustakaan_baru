<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class LoginjoinController extends Controller
{
    public function index()
    {
        return view('login-join.show');
    }

    public function show()
    {
        $user = DB::table('users')->get();
        $user = User::paginate(5); // tampilkan 5 data per halaman
        return view('login-join.show', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('deleted', 'Data berhasil dihapus');
    }
}
