<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // Menampilkan daftar menu
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));  // Menampilkan view daftar menu
    }

    // Menampilkan form untuk menambah menu
    public function create()
    {
        $menus = Menu::whereNull('parent_id')->orderBy('sort_order')->get();  // Ambil menu utama untuk parent selection
        return view('menu.create', compact('menus'));
    }

    // Menyimpan menu baru
    public function store(Request $request)
{
    menu::create($request->all());
    return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan.');
}


    // Menampilkan form untuk mengedit menu
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $menus = Menu::whereNull('parent_id')->orderBy('sort_order')->get();  // Ambil menu utama untuk parent selection
        return view('menu.update', compact('menu', 'menus'));
    }

    // Mengupdate data menu
    public function update(Request $request, $id)
    {

        $menu = Menu::findOrFail($id);
        $menu->update($request->all());

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diupdate.');
    }

    // Menghapus menu
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus.');
    }

    // Menata ulang urutan menu
    public function reorder(Request $request)
    {
        foreach ($request->sort_order as $id => $order) {
            Menu::where('id', $id)->update(['sort_order' => $order]);
        }

        return response()->json(['success' => 'Urutan menu berhasil diperbarui.']);
    }
}
