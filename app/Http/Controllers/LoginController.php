<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * Menampilkan form login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Proses login user.
     */
    public function login(Request $request)
    {
        // Validasi input login
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:100',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->route('login.form')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Cek kredensial dan login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Login berhasil
            return redirect()->route('dashboard.main'); // Redirect ke halaman dashboard setelah login
        } else {
            // Jika login gagal
            return redirect()->route('login.form')
                             ->with('error', 'Email atau password salah!')
                             ->withInput();
        }
    }

    /**
     * Logout user
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form')->with('success', 'Anda telah logout.');
    }
}