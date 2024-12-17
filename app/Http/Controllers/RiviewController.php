<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RiviewController extends Controller
{
    public function index()
    {

        return view('userpage.layout.review'); 
    }
}
