<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Produk;

class PaymentController extends Controller
{
    public function showPaymentForm($id)
    {
        // Validasi bahwa $id adalah angka
        if (!is_numeric($id)) {
            return redirect()->back()->with('error', 'ID pesanan tidak valid.');
        }
    
        // Ambil data order berdasarkan ID
        $order = Order::with('produk')->find($id);
    
        // Jika order tidak ditemukan
        if (!$order) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }
    
        // Tampilkan view pembayaran
        return view('userpage.layout.payment', compact('order'));
    }
    


    // Memproses pembayaran
    public function processPayment(Request $request)
    {
        // Validasi data pembayaran
        $validated = $request->validate([
            'payment_method' => 'required|string',
            'payment_details' => 'nullable|string|max:500',
        ]);

        // Simpan data pembayaran ke session atau database
        session(['payment_data' => $validated]);

        // Berdasarkan metode pembayaran, redirect ke halaman konfirmasi atau pembayaran lebih lanjut
        switch ($validated['payment_method']) {
            case 'ovo':
                // Redirect ke halaman OVO (misalnya API pembayaran OVO)
                return redirect()->route('ovo-payment');
            case 'qris':
                // Redirect ke halaman QRIS
                return redirect()->route('qris-payment');
            case 'dana':
                // Redirect ke halaman DANA
                return redirect()->route('dana-payment');
            case 'bank_transfer':
                // Redirect ke halaman bank transfer
                return redirect()->route('bank-transfer');
            case 'credit_card':
                // Redirect ke halaman kartu kredit
                return redirect()->route('credit-card-payment');
            default:
                return redirect()->back()->with('error', 'Metode pembayaran tidak valid');
        }
    }
    
}
