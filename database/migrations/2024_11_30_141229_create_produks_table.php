<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Mengubah nama tabel menjadi 'produk'
        Schema::create('produk', function (Blueprint $table) {
            $table->id('productID');
            $table->string('namaProduk', 100);
            $table->decimal('harga', 10, 2);
            $table->integer('stok');
            $table->binary('foto'); // Kolom foto dengan tipe data BLOB (binary)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus tabel 'produk' pada rollback
        Schema::dropIfExists('produk');
    }
};