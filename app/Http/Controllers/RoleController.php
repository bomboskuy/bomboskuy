<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Menampilkan semua roles
    public function index()
    {
        $roles = Role::all(); // Ambil semua data roles
        return view('dashboard.roles.index', compact('roles')); // Pass ke view 'roles.index'
    }

    // Menampilkan form untuk membuat role baru
    public function create()
    {
        return view('dashboard.roles.create'); // Return view form create
    }

    // Menyimpan role baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'namaRole' => 'required|string|max:50',
        ]);

        Role::create($validated); // Simpan role baru ke database

        return redirect()->route('dashboard.roles.index')->with('success', 'Role created successfully!');
    }

    // Menampilkan form untuk mengedit role
    public function edit($id)
    {
        $role = Role::findOrFail($id); // Ambil role berdasarkan ID
        return view('dashboard.roles.edit', compact('role')); // Return view form edit
    }

    // Mengupdate role yang sudah ada
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'namaRole' => 'required|string|max:50',
        ]);

        $role = Role::findOrFail($id); // Ambil role berdasarkan ID
        $role->update($validated); // Update data role

        return redirect()->route('dashboard.roles.index')->with('success', 'Role updated successfully!');
    }

    // Menghapus role
    public function destroy($id)
    {
        $role = Role::findOrFail($id); // Ambil role berdasarkan ID
        $role->delete(); // Hapus role

        return redirect()->route('dasboard.roles.index')->with('success', 'Role deleted successfully!');
    }
}