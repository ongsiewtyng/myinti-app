<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food; // Import your Food model
use App\Models\Category; // Import your Category model
use App\Models\Cart; // Import your Cart model

class CafeController extends Controller
{
    //
    public function drinks(){
        $category = 'Drinks';
        $foods = Food::where('category', $category)->get();

        return view('cafemenu.drinks',['foods' => $foods]);
    }

    public function burgers(){
        $category = 'Burgers';
        $foods = Food::where('category', $category)->get();
        
        return view('cafemenu.burgers',['foods' => $foods]);

    }

    
    public function sandwich(){
        $category = 'Sandwiches';
        $foods = Food::where('category', $category)->get();

        return view('cafemenu.sandwiches', ['foods' => $foods]);
    }

    public function wrap(){
        $category = 'Wraps';
        $foods = Food::where('category', $category)->get();

        return view('cafemenu.wraps', ['foods' => $foods]);
    }

    public function snack(){
        $category = 'Snacks';
        $foods = Food::where('category', $category)->get();

        return view('cafemenu.snacks', ['foods' => $foods]);
    }

    public function western(){
        $category = 'Western food';
        $foods = Food::where('category', $category)->get();

        return view('cafemenu.westernfood', ['foods' => $foods]);
    }

    public function rice(){
        $category = 'Fried rice';
        $foods = Food::where('category', $category)->get();

        return view('cafemenu.friedrice', ['foods' => $foods]);
    }

    public function noodles(){
        $category = 'Noodles';
        $foods = Food::where('category', $category)->get();


        return view('cafemenu.noodles', ['foods' => $foods]);
    }

    public function cart(){
        $cartItems = Cart::all(); // Retrieve all cart items from the database

        // Retrieve the associated food items
        $foodItems = Food::whereIn('id', $cartItems->pluck('food_id'))->get();

        return view('cart.payment', compact('cartItems', 'foodItems'));
    }

    

    
    
}
