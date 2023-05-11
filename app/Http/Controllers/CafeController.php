<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CafeController extends Controller
{
    //
    public function drink()
    {
        return view('cafemenu.drinks');
    }

    public function burger(){
        return view('cafemenu.burgers');
    }
    
    public function sandwich(){
        return view('cafemenu.sandwiches');
    }

    public function wrap(){
        return view('cafemenu.wraps');
    }

    public function snack(){
        return view('cafemenu.snacks');
    }

    public function western(){
        return view('cafemenu.westernfood');
    }

    public function rice(){
        return view('cafemenu.friedrice');
    }

    public function noodles(){
        return view('cafemenu.noodles');
    }




}
