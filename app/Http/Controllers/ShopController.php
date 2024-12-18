<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Order;

class ShopController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('shop.index', compact('produks')); 
    }

    public function cart()
    {
        
        $produks = Produk::all();
        return view('shop.cart', compact('produks')); 
    }

    public function checkout()
{
    $cart = session()->get('cart', []);
    $cartTotal = 0;

    foreach ($cart as $item) {
        $cartTotal += $item['price'] * $item['quantity'];
    }

    return view('shop.checkout', compact('cart', 'cartTotal'));
}



    public function addToCart(Request $request, $productId)
    {
        $product = Produk::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan!');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                'name' => $product->namaProduk,
                'quantity' => 1,
                'price' => $product->harga,
                'image' => $product->foto,
            ];
        }

        session()->put('cart', $cart);
        $this->updateCartTotal($cart);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Menampilkan keranjang
    public function showCart()
    {
        $cart = session()->get('cart');
        $cartTotal = session()->get('cart_total', 0);
        return view('shop.checkout', compact('cart', 'cartTotal'));
    }

    // Menghapus item dari keranjang
    public function removeFromCart($productId)
    {
        $cart = session()->get('cart');

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            $this->updateCartTotal($cart);
        }

        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    // Update total harga keranjang
    public function updateQuantity($productId, $change)
{
    $cart = session()->get('cart');

    // Periksa apakah produk ada di keranjang
    if (isset($cart[$productId])) {
        // Perbarui kuantitas produk berdasarkan perubahan (tambah atau kurang)
        $newQuantity = $cart[$productId]['quantity'] + $change;

        // Pastikan kuantitas tidak kurang dari 1
        if ($newQuantity < 1) {
            $newQuantity = 1; // Set ke 1 jika kurang dari 1
        }

        $cart[$productId]['quantity'] = $newQuantity;

        // Menyimpan kembali keranjang ke sesi
        session()->put('cart', $cart);

        // Menghitung total harga setelah update
        $this->updateCartTotal($cart);

        // Ambil total harga terbaru dari sesi
        $totalPrice = session()->get('cart_total', 0);

        return response()->json([
            'quantity' => $cart[$productId]['quantity'],
            'totalPrice' => number_format($totalPrice, 0, ',', '.')
        ]);
    }

    return response()->json(['error' => 'Produk tidak ditemukan'], 404);
}

private function updateCartTotal($cart)
{
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity']; // Hitung total harga
    }

    session()->put('cart_total', $total); // Simpan total ke sesi
}

public function showOrder()
{
    // Mengambil data keranjang dari sesi
    $cart = session()->get('cart');

    // Menghitung total harga keranjang
    $cartTotal = 0;
    if ($cart) {
        foreach ($cart as $item) {
            $cartTotal += $item['price'] * $item['quantity'];
        }
    }

    // Menyimpan total harga ke sesi
    session()->put('cart_total', $cartTotal);

    // Mengirim data keranjang dan total ke view
    return view('shop.checkout', compact('cart', 'cartTotal')); // Pastikan nama view benar
}

public function history()
    {
        $orders = Order::all();
        return view('shop.history'); 
    }

}
