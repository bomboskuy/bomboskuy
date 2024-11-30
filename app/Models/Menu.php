<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // Ganti 'order' menjadi 'sort_order' di sini
    protected $fillable = ['name', 'icon', 'url', 'parent_id', 'sort_order'];  // Kolom 'order' diganti dengan 'sort_order'

    // Relasi ke parent menu (jika ada)
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    // Relasi ke submenu (children) menu
    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('sort_order');  // Ganti 'order' dengan 'sort_order'
    }
}
