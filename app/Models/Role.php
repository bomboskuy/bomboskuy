<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $primaryKey = 'roleID';
    protected $fillable = ['namaRole'];

    public function users()
    {
        return $this->hasMany(User::class, 'roleID');
    }

    public function menus()
    {
        return $this->hasMany(Menu::class, 'roleID');
    }
}
