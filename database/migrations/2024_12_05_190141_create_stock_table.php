<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            // Tabel stock memiliki kolom stokID sebagai primary key
            $table->id('stokID');

            // Kolom productID mengacu ke produk di tabel produk
            $table->unsignedBigInteger('productID');

            // Kolom stokJumlah yang akan dihubungkan dengan stok di tabel produk
            $table->unsignedInteger('stokJumlah');  // disesuaikan dengan tipe data di produk

            // Menambahkan foreign key untuk productID yang mengacu pada id di tabel produk
            $table->foreign('productID')
                  ->references('productID')
                  ->on('produk')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            // Menambahkan foreign key untuk stokJumlah yang mengacu pada stok di tabel produk
           

            // Menambahkan timestamp untuk pencatatan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
};
