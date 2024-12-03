<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    // Menambahkan produk ke keranjang
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
        return view('userpage.layout.cart', compact('cart', 'cartTotal'));
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
    private function updateCartTotal($cart)
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        session()->put('cart_total', $total);
    }

    // Update kuantitas produk di keranjang
    public function updateQuantity($index, $change)
    {
        $cart = session()->get('cart');

        if (isset($cart[$index])) {
            $cart[$index]['quantity'] += $change;

            if ($cart[$index]['quantity'] < 1) {
                $cart[$index]['quantity'] = 1;
            }

            session()->put('cart', $cart);
            $this->updateCartTotal($cart);

            $totalPrice = session()->get('cart_total', 0);
            return response()->json([
                'quantity' => $cart[$index]['quantity'],
                'totalPrice' => number_format($totalPrice, 0, ',', '.'),
            ]);
        }

        return response()->json(['error' => 'Produk tidak ditemukan'], 404);
    }
}
