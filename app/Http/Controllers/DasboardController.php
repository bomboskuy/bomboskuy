<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DasboardController extends Controller
{
    public function index()
    {
        return view('layouts.main'); // pastikan Anda memiliki view 'dashboard.blade.php'
    }
}