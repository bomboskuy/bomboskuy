<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->foreignId('productID')->constrained('produk'); // Produk yang dipesan
            $table->integer('quantity');
            $table->decimal('total_price', 10, 2);
            $table->string('status');
            $table->timestamps();

            $table->foreign('productID')->references('productID')->on('produk')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
