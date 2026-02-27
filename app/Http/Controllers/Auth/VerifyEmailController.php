<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Jika email sudah diverifikasi sebelumnya
        if ($user->hasVerifiedEmail()) {
            return redirect()
                ->route('dashboard')
                ->with('info', 'Email sudah terverifikasi sebelumnya.');
        }

        // Jika belum diverifikasi, lakukan verifikasi
        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return redirect()
            ->route('dashboard')
            ->with('success', 'Email berhasil diverifikasi 🎉');
    }
}
