<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DrinkController extends Controller
{
    //
    public function drink()
    {
        return view('cafemenu.drinks');
    }
}
