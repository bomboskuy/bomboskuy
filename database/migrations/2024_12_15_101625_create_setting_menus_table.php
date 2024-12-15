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
        Schema::create('setting_menus', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->unsignedBigInteger('role_id'); // Foreign key untuk roles
            $table->unsignedBigInteger('menu_id'); // Foreign key untuk menus
            $table->timestamps();
    
            // Relasi ke tabel roles
            $table->foreign('role_id')->references('roleID')->on('roles')->onDelete('cascade');
    
            // Relasi ke tabel menus
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
        });
    }    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_menus');
    }
};