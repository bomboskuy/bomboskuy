<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $users = User::with('role')->get(); // Ambil semua data pengguna beserta data role
        return view('dashboard.users.index', compact('users')); // Mengarahkan ke view dashboard/users/index
    }

    // Menampilkan form untuk menambah pengguna
    public function create()
    {
        $roles = Role::all(); // Ambil semua data role
        return view('dashboard.users.create', compact('roles')); // Mengarahkan ke view dashboard/users/create
    }

    // Menyimpan data pengguna baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'namaUser' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'roleID' => 'required|exists:roles,roleID',
        ]);

        $user = User::create([
            'namaUser' => $validated['namaUser'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'roleID' => $validated['roleID'],
        ]);

        return redirect()->route('dashboard.users.index')->with('success', 'User created successfully.');
    }

    // Menampilkan form untuk mengedit pengguna
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('dashboard.users.edit', compact('user', 'roles')); // Mengarahkan ke view dashboard/users/edit
    }

    // Memperbarui data pengguna
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'namaUser' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->idUser,
            'password' => 'nullable|string|min:6|confirmed',
            'roleID' => 'required|exists:roles,roleID',
        ]);

        $user->update([
            'namaUser' => $validated['namaUser'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? Hash::make($validated['password']) : $user->password,
            'roleID' => $validated['roleID'],
        ]);

        return redirect()->route('dashboard.users.index')->with('success', 'User updated successfully.');
    }

    // Menghapus pengguna
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('dashboard.users.index')->with('success', 'User deleted successfully.');
    }
}