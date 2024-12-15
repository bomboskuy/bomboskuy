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
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // ID untuk setiap pembayaran
            $table->unsignedBigInteger('order_id'); // Menghubungkan dengan order
            $table->enum('payment_method', ['ovo', 'qris', 'dana', 'bank_transfer', 'credit_card']); // Metode pembayaran
            $table->text('payment_details')->nullable(); // Detail pembayaran
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending'); // Status pembayaran
            $table->timestamps(); // Waktu dibuat dan diupdate
        });

        // Menambahkan foreign key untuk menghubungkan dengan tabel orders
        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Membatalkan migrasi
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
        });
        Schema::dropIfExists('payments');
    }
};
