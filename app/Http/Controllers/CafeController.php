<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food; // Import your Food model
use App\Models\Category; // Import your Category model
use App\Models\Cart; // Import your Cart model

class CafeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function category($categorySlug){
        // Capitalize the first letter of the category slug
        $categorySlug = ucfirst($categorySlug);

        // Retrieve the category based on the slug
        $category = Category::where('category', $categorySlug)->first();

        if (!$category) {
            abort(404); // or handle the category not found case
        }

        // Retrieve the foods belonging to the category
        $foods = Food::where('category', $category->category)->get();

        // Render the category view and pass the category and foods
        return view('cafemenu.category', compact('category', 'foods'));
    }

    public function cart(){
        $cartItems = Cart::all(); // Retrieve all cart items from the database

        // Retrieve the associated food items
        $foodItems = Food::whereIn('id', $cartItems->pluck('food_id'))->get();

        return view('cart.payment', compact('cartItems', 'foodItems'));
    }

}
