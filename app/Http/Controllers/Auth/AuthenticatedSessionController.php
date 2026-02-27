<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

    public function store(Request $request)
    {
        // Validasi email, password dan captcha
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'captcha' => ['required'],
        ], [
            'captcha.required' => 'Kode captcha wajib diisi!',
        ]);

        // Cek captcha secara manual
        if (!captcha_check($request->captcha)) {
            return back()
                ->withErrors(['captcha' => 'Captcha tidak sesuai!'])
                ->withInput();
        }

        // Ambil hanya email & password untuk login
        $credentials = $request->only('email', 'password');

        // Lakukan login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            return $user->role === 'admin' ? redirect('/content') : redirect('/user');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
