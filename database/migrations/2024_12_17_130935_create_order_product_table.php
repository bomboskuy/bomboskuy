<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade'); // Foreign key ke tabel 'orders'
            $table->foreignId('productID')->constrained('produk', 'productID')->onDelete('cascade'); // Foreign key ke tabel 'produk' dengan referensi kolom 'productID'
            $table->integer('quantity'); // Jumlah produk dalam order
            $table->decimal('price', 10, 2); // Harga produk saat dipesan
            $table->timestamps(); // Timestamps untuk pencatatan waktu
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_product');
    }
}
