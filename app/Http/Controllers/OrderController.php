<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Produk; 

class OrderController extends Controller
{
    public function create(Request $request)
{
    // Validasi input
    
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'product_id' => 'required|array', // product_id harus array
        'product_id.*' => 'integer|exists:produk,productID', // Validasi setiap productID
    ]);

    $orderIds = [];

    // Membuat order untuk setiap produk
    foreach ($validated['product_id'] as $productID) {
        $order = Order::create([
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'productID' => $productID, // Simpan setiap productID
            'status' => 'processed',   // Status order
        ]);
        $orderIds[] = $order->id; // Simpan ID order
    }

    // Redirect ke halaman dengan pesan berhasil dan ID order terakhir
    return redirect()->route('cart.show')->with([
        'success' => 'Order berhasil dibuat!',
        'orderId' => end($orderIds), // Kirimkan ID order terakhir
    ]);
}

}
