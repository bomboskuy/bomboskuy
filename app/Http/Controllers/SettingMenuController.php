<?php

namespace App\Http\Controllers;

use App\Models\SettingMenu;
use App\Models\Role;
use App\Models\Menu;
use Illuminate\Http\Request;

class SettingMenuController extends Controller
{
    // Menampilkan semua Setting Menu
    public function index()
    {
        // Memuat relasi role dan menu untuk mengurangi query tambahan
        $settingMenus = SettingMenu::with('menu', 'role')->get();

        // Mengambil data roles dan menus untuk digunakan di view
        return view('dashboard.setting_menus.index', [
            'settingMenus' => $settingMenus,
        ]);
    }

    // Menampilkan form untuk menambah setting menu baru
    public function create()
    {
        $roles = Role::all();
        $menus = Menu::all();

        // Mengirim data ke view create
        return view('dashboard.setting_menus.create', compact('roles', 'menus'));
    }

    // Menyimpan setting menu baru ke dalam database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'role_id' => 'required|exists:roles,roleID',
            'menu_id' => 'required|array',
            'menu_id.*' => 'exists:menus,id', // Validasi agar menu_id valid
        ]);

        \DB::transaction(function () use ($validated) {
            // Loop melalui menu_id yang dipilih dan cek jika setting belum ada
            foreach ($validated['menu_id'] as $menuId) {
                SettingMenu::firstOrCreate([
                    'role_id' => $validated['role_id'],
                    'menu_id' => $menuId,
                ]);
            }
        });

        return redirect()->route('dashboard.setting_menus.index')->with('success', 'Setting Menu berhasil ditambahkan');
    }

    // Menampilkan form edit untuk setting menu berdasarkan role
    public function edit($id)
    {
        // Mengambil setting berdasarkan role_id
        $settingMenu = SettingMenu::where('role_id', $id)->get();
        $roles = Role::all();
        $menus = Menu::all();

        // Mengambil daftar menu yang dipilih
        $selectedMenus = $settingMenu->pluck('menu_id')->toArray();

        // Mengirim data ke view edit
        return view('dashboard.setting_menus.edit', compact('settingMenu', 'roles', 'menus', 'selectedMenus'));
    }

    // Memperbarui setting menu berdasarkan role
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'role_id' => 'required|exists:roles,roleID',
            'menu_id' => 'required|array',
            'menu_id.*' => 'exists:menus,id', // Validasi agar menu_id valid
        ]);

        \DB::transaction(function () use ($validated, $id) {
            // Hapus semua setting menu yang lama
            SettingMenu::where('role_id', $id)->delete();

            // Simpan setting menu baru
            foreach ($validated['menu_id'] as $menuId) {
                SettingMenu::create([
                    'role_id' => $validated['role_id'],
                    'menu_id' => $menuId,
                ]);
            }
        });

        return redirect()->route('dashboard.setting_menus.index')->with('success', 'Setting Menu berhasil diupdate');
    }

    // Menghapus setting menu berdasarkan role
    public function destroy($id)
    {
        // Menghapus semua setting menu yang terkait dengan role_id
        SettingMenu::where('role_id', $id)->delete();
        return redirect()->route('dashboard.setting_menus.index')->with('success', 'Setting Menu berhasil dihapus');
    }
}