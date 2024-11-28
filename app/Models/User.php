<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'idUser'; // Primary key baru

    protected $fillable = [
        'namaUser', // Mengganti "name" menjadi "namaUser"
        'email',
        'password',
        'roleID', // Relasi ke roles
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'roleID'); // Relasi ke model Role
    }
}