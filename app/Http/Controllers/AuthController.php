<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    /**
     * Process login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nik' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('nik', $credentials['nik'])->first();

        if ($user && $user->verifyPassword($credentials['password'])) {
            Auth::login($user, $request->boolean('remember'));

            // Set backward-compatible legacy session variables
            session([
                'user_id' => $user->id,
                'nik' => $user->nik,
                'nama' => $user->nama,
                'lvl' => $user->lvl,
            ]);

            $request->session()->regenerate();

            return redirect()->intended(route('dashboard'))
                ->with('success', 'Selamat datang kembali, ' . $user->nama);
        }

        return back()->withErrors([
            'nik' => 'NIK atau password yang Anda masukkan salah.',
        ])->onlyInput('nik');
    }

    /**
     * Log the user out.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('info', 'Anda telah berhasil logout.');
    }
}

