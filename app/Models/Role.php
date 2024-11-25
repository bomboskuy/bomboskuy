<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $primaryKey = 'roleID';
    public $incrementing = true;
    protected $keyType = 'int';
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
