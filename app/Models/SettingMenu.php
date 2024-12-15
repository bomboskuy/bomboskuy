<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingMenu extends Model
{
    use HasFactory;

    protected $fillable = ['role_id', 'menu_id'];

    // Relasi ke Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'roleID'); // Sesuaikan foreign key (role_id) dan primary key (roleID)
    }

    // Relasi ke Menu
    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id'); // Foreign key menu_id, primary key id
    }
}