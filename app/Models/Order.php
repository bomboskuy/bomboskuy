<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Relasi ke produk

    // Tentukan atribut yang dapat diisi melalui mass assignment
    protected $fillable = [
        'name',
        'phone',
        'productID',
        'quantity',
        'total_price',
        'status',
    ];

    // Relasi ke produk
    public function produk()
    {
        return $this->belongsToMany(Produk::class, 'order_product')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
       
    }

    // Relasi ke pembayaran
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    
}
