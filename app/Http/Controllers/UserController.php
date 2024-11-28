<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil semua pengguna dengan relasi role
        $users = User::with('role')->get();
        return view('dashboard.users.index', compact('users'));
    }

    public function create()
    {
        // Ambil semua role untuk pilihan pada form
        $roles = Role::all(); // Ambil data role dari tabel roles
        return view('dashboard.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validasi input pengguna
        $validated = $request->validate([
            'namaUser' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'roleID' => 'required|integer', // Relasi ke Role
        ]);

        // Hash password sebelum disimpan
        $validated['password'] = Hash::make($validated['password']);

        // Buat pengguna baru
        User::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dashboard.users.index')->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function edit(User $user)
    {
        // Ambil semua role untuk pilihan pada form edit
        $roles = Role::all(); // Ambil data role untuk edit
        return view('dashboard.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'namaUser' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->idUser, // Pastikan menggunakan idUser
            'password' => 'nullable|string|min:8',
            'roleID' => 'required|integer',
        ]);
    
        // Jika password diisi, hash password baru
        if ($request->filled('password')) {
            $validated['password'] = Hash::make($validated['password']);
        }
    
        // Update data pengguna
        $user->update($validated);
    
        return redirect()->route('dashboard.users.index')->with('success', 'Pengguna berhasil diupdate');
    }

    public function destroy(User $user)
    {
        // Hapus pengguna
        $user->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dashboard.users.index')->with('success', 'Pengguna berhasil dihapus');
    }
}