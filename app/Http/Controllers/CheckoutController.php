<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // app/Http/Controllers/CheckoutController.php
    public function showCheckoutForm()
    {
        // Ambil data total dari keranjang atau session
        $cartTotal = session('cartTotal', 0);
        return view('checkout', compact('cartTotal'));
    }

    // Memproses data checkout setelah form disubmit
    public function processCheckout(Request $request)
    {
        // Validasi form input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15', // Menambahkan validasi untuk no telepon
            'address' => 'required|string|max:500',
            'notes' => 'nullable|string|max:500', // Validasi catatan, optional
            'payment_method' => 'required|string',
        ]);

        // Simpan data checkout ke session atau database
        session(['checkout_data' => $validated]);

        // Redirect ke halaman pembayaran (misalnya route 'payment')
        return redirect()->route('payment');
    }

}
