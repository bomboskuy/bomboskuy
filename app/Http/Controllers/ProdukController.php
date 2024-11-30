<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Menampilkan daftar produk.
     */
    public function index()
    {
        // Mengambil semua data produk
        $produks = Produk::all();
        return view('dashboard.produk.index', compact('produks'));
    }

    /**
     * Menampilkan form untuk membuat produk baru.
     */
    public function create()
    {
        return view('dashboard.produk.create');
    }

    /**
     * Menyimpan produk yang baru dibuat ke database.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'namaProduk' => 'required|string|max:100',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Menyimpan data produk
        $produk = new Produk();
        $produk->namaProduk = $request->input('namaProduk');
        $produk->harga = $request->input('harga');
        $produk->stok = $request->input('stok');

        // Cek apakah ada file gambar dan simpan ke storage
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('produk', 'public');
            $produk->foto = $fotoPath;
        }

        $produk->save();

        return redirect()->route('dashboard.produk.index')->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Menampilkan form untuk mengedit produk.
     */
    public function edit(Produk $produk)
    {
        return view('dashboard.produk.edit', compact('produk'));
    }

    /**
     * Mengupdate produk yang sudah ada.
     */
    public function update(Request $request, Produk $produk)
    {
        // Validasi input
        $request->validate([
            'namaProduk' => 'required|string|max:100',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Update data produk
        $produk->namaProduk = $request->input('namaProduk');
        $produk->harga = $request->input('harga');
        $produk->stok = $request->input('stok');

        // Jika ada gambar baru, hapus gambar lama dan simpan gambar baru
        if ($request->hasFile('foto')) {
            // Hapus gambar lama jika ada
            if ($produk->foto && Storage::exists('public/' . $produk->foto)) {
                Storage::delete('public/' . $produk->foto);
            }

            // Simpan gambar baru
            $fotoPath = $request->file('foto')->store('produk', 'public');
            $produk->foto = $fotoPath;
        }

        $produk->save();

        return redirect()->route('dashboard.produk.index')->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Menampilkan detail produk.
     */
    public function show(Produk $produk)
    {
        return view('dashboard.produk.show', compact('produk'));
    }

    /**
     * Menghapus produk dari database.
     */
    public function destroy(Produk $produk)
    {
        // Hapus gambar produk dari storage jika ada
        if ($produk->foto && Storage::exists('public/' . $produk->foto)) {
            Storage::delete('public/' . $produk->foto);
        }

        // Hapus produk dari database
        $produk->delete();

        return redirect()->route('dashboard.produk.index')->with('success', 'Produk berhasil dihapus!');
    }
}