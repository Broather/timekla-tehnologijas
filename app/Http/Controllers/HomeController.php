<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // rāda saturu no views/home/index.blade.php
        return view('home.index', ['title' => 'Sākumlapa']);
    }

}
