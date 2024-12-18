<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan
    protected $table = 'feedback';

    // Tentukan kolom yang boleh diisi
    protected $fillable = [
        'order_id',
        'rating',
        'review',
    ];

    // Definisikan relasi dengan model Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
