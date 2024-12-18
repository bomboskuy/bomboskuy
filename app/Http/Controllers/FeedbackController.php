<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Produk;
use App\Models\Feedback;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
{
    // Ambil data feedback beserta relasi ke tabel orders
    $feedbacks = Feedback::with('order') // Pastikan relasi sudah dibuat di model
        ->get();

    // Kirim data feedback ke halaman testimonial
    return view('userpage.layout.main', compact('feedbacks'));
}

    public function create($orderId)
    {
        // Cek apakah pesanan milik user yang login dan statusnya complete
        $order = Order::findOrFail($orderId);
        
        return view('feedback.create', compact('order'));
    }

    public function store(Request $request, $orderId)
    {
        
        // Validasi data yang diterima
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',  // Rating bintang antara 1 dan 5
            'review' => 'required|string|max:500',  // Feedback wajib diisi, maksimal 500 karakter
        ]);

        
        // Cek apakah pesanan dengan orderId ada
        $order = Order::findOrFail($orderId);

        // Simpan feedback baru
        Feedback::create([
            'order_id' => $orderId,      // Menyimpan ID pesanan
            'rating' => $validated['rating'], // Menyimpan rating
            'review' => $validated['review'], // Menyimpan komentar
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect ke halaman feedback dengan pesan sukses
        return redirect()->route('feedback.create', $orderId)->with('success', 'Feedback berhasil dikirim!');
    }

}
