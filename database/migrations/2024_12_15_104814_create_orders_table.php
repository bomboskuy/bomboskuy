<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // ID untuk setiap pesanan
            $table->string('name'); // Nama pembeli
            $table->string('phone'); // Nomor telepon pembeli
            $table->unsignedBigInteger('productID'); // ID produk yang dipesan
            $table->enum('status', ['processed', 'completed'])->default('processed'); // Status pesanan
            $table->timestamps(); // Waktu dibuat dan diupdate
        }); 

        // Menambahkan foreign key untuk menghubungkan dengan tabel products
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign('productID')->references('productID')->on('produk')->onDelete('cascade');
        });
    }

    /**
     * Membatalkan migrasi
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['productID']);
        });
        Schema::dropIfExists('orders');
    }
};
