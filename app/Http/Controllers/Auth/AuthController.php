<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Memproses data login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba melakukan autentikasi
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate(); // Mencegah Session Fixation Attack

            // Arahkan ke dashboard admin setelah sukses
            return redirect()->intended('admin/dashboard');
        }

        // Jika gagal, kembalikan ke halaman login dengan error
        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
        ])->onlyInput('email');
    }

    // Memproses logout
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}