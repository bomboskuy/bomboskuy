<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak mengikuti konvensi penamaan Laravel
    protected $table = 'produk';

    // Tentukan kolom primary key sesuai dengan nama kolom di database
    protected $primaryKey = 'productID';

    // Tentukan kolom yang dapat diisi secara mass-assignment
    protected $fillable = [
        'namaProduk',
        'harga',
        'stok',
        'foto', // Menambahkan foto jika ingin menyimpannya dalam database
    ];

    // Tentukan kolom yang tidak bisa diisi (optional)
    protected $guarded = [];

    /**
     * Accessor untuk kolom foto, mengembalikan foto dalam format base64
     */
    public function getFotoAttribute($value)
    {
        return $value; // Tidak perlu encode base64 jika ingin mengambil file dari storage
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product', 'productID', 'order_id')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();
    }

}