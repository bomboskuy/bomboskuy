<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'productID';
    protected $fillable = ['namaProduk', 'harga', 'stok'];

    public function orders()
    {
        return $this->hasMany(Order::class, 'productID');
    }

    public function stock()
    {
        return $this->hasOne(Stock::class, 'productID');
    }
}
