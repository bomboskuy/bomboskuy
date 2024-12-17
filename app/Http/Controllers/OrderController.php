<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Produk;
use Illuminate\Support\Facades\Log;

use Midtrans\Config;
use Midtrans\Snap;

// Set API credentials
Config::$serverKey = env('MIDTRANS_SERVER_KEY');
Config::$clientKey = env('MIDTRANS_CLIENT_KEY');


class OrderController extends Controller
{
    public function create(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'product_id' => 'required|array', // Produk yang dipesan
            'product_id.*' => 'integer|exists:produk,productID', // Validasi setiap productID ada di tabel produk
            'quantity' => 'required|array', // Kuantitas produk yang dipesan
            'quantity.*' => 'integer|min:1', // Pastikan quantity adalah angka positif
        ]);

        $orderIds = [];

        // Loop untuk menyimpan setiap produk yang dipesan
        foreach ($validated['product_id'] as $index => $productID) {
            // Ambil data produk untuk menghitung total harga
            $produk = Produk::findOrFail($productID);
            $quantity = $validated['quantity'][$index]; // Ambil kuantitas untuk produk ini

            // Hitung total harga berdasarkan kuantitas dan harga produk
            $totalPrice = $produk->harga * $quantity;

            // Simpan data ke dalam tabel orders
            $order = Order::create([
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'productID' => $productID, // Simpan productID
                'quantity' => $quantity,   // Simpan quantity
                'total_price' => $totalPrice, // Hitung total price
                'status' => 'processed',   // Status default adalah processed
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Mengambil data cart dari session
            $cart = session()->get('cart', []);

            // Hitung total harga dari semua item dalam cart
            $cartTotal = 0;
            foreach ($cart as $item) {
                $cartTotal += $item['price'] * $item['quantity'];
            }

            // Simpan ID order yang berhasil dibuat
            $orderIds[] = $order->id;

            // MIDTRANS
        

            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;
        
            $params = [
                'transaction_details' => [
                    'order_id' => $order->id,
                    'gross_amount' => $order->total_price,
                ],
                'customer_details' => [
                    'name' => $request->name,
                    'phone' => $request->phone,
                ],
            ];
            
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            Log::info($snapToken);
            
            return view('userpage.layout.cart' ,compact('snapToken', 'order', 'cart', 'cartTotal'));
        } 

    //     // Redirect ke halaman cart dengan pesan sukses
    //     return redirect()->route('cart.show')->with([
    //         'success' => 'Order berhasil dibuat!',
    //         'orderId' => end($orderIds), // Kirimkan ID order terakhir
    //     ]);
    }
}
