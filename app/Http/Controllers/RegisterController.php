<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;

class RegisterController extends Controller
{
    /**
     * Menampilkan form registrasi.
     */
    public function showRegisterForm()
    {
        // Ambil semua role dari database
        $roles = Role::all();

        // Kirim data role ke view
        return view('auth.register', compact('roles'));
    }

    /**
     * Proses registrasi user baru.
     */
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'namaUser' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Tetapkan roleID default jika tidak diberikan
        $roleID = $request->roleID ?? 1; // Default ke 1 jika tidak ada input

        // Buat user baru
        $user = User::create([
            'namaUser' => $request->namaUser,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roleID' => $roleID,
        ]);

        return redirect()->route('register.form')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
