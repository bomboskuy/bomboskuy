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
    Schema::create('menus', function (Blueprint $table) {
        $table->id();  // ID Menu
        $table->string('name');  // Nama Menu
        $table->string('icon')->nullable();  // Ikon Menu, bisa menggunakan nama ikon atau path
        $table->string('url')->nullable();  // URL atau route yang dituju
        $table->foreignId('parent_id')->nullable()->constrained('menus')->onDelete('cascade');  // Parent Menu, jika menu ini adalah submenu
        $table->integer('sort_order')->default(0);  // Urutan Menu, lebih jelas dengan nama sort_order
        $table->timestamps(); 
    });
}

public function down()
{
    Schema::dropIfExists('menus');
}
};
