<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        //dd(1); // <=> var_dump();die();
        return view('home');
    }
}
