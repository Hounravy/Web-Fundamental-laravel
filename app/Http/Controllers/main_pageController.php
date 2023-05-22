<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class main_pageController extends Controller
{

    public function home()
    {
        return view('home');
    }
    public function categories()
    {
        return view('categories');
    }

    public function food()
    {
        return view('food');
    }

    public function order()
    {
        return view('order');
    }

    public function categ_food()
    {
        return view('categ_food');
    }
}
