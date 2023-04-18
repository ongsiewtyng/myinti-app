<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function service1(){
        return view('menus.service1');
    }

    public function service2(){
        return view('menus.service2');
    }

    public function service3(){
        return view('menus.service3');
    }

}
