<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class UserPageController extends Controller
{
    public function showProducts()
{
    // Mengambil semua data produk dari tabel 'produk'
    $produks = Produk::all();

    // Kirim data produk ke view
    return view('userpage.layout.main', compact('produks'));
}

}
