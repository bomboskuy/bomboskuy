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
        // Tabel users
        Schema::create('users', function (Blueprint $table) {
            $table->id('idUser'); // Primary key idUser
            $table->string('namaUser', 100); // Kolom namaUser
            $table->string('email', 100)->unique(); // Kolom email dengan constraint unique
            $table->string('password', 255); // Kolom password
            $table->unsignedBigInteger('roleID'); // Foreign key roleID
            $table->foreign('roleID')->references('roleID')->on('roles')->onDelete('cascade'); // Relasi ke tabel roles
            $table->timestamp('email_verified_at')->nullable(); // Kolom email_verified_at
            $table->rememberToken(); // Kolom remember_token
            $table->timestamps(); // Kolom created_at dan updated_at
        });

        // Tabel password_reset_tokens
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary(); // Primary key email
            $table->string('token'); // Kolom token
            $table->timestamp('created_at')->nullable(); // Kolom created_at
        });

        // Tabel sessions
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // Primary key id
            $table->foreignId('user_id')->nullable()->index(); // Foreign key user_id
            $table->string('ip_address', 45)->nullable(); // Kolom ip_address
            $table->text('user_agent')->nullable(); // Kolom user_agent
            $table->longText('payload'); // Kolom payload
            $table->integer('last_activity')->index(); // Kolom last_activity
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions'); // Hapus tabel sessions
        Schema::dropIfExists('password_reset_tokens'); // Hapus tabel password_reset_tokens
        Schema::dropIfExists('users'); // Hapus tabel users
    }
};