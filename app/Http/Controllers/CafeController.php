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

    public function cart(){
        return view('cart.payment');
    }

    public function showPayment(){
        $cartItems = json_decode(urldecode(request('cartItems')), true);

        // Check if $cartItems is not empty
        if (!empty($cartItems)) {
            // Calculate the total price
            $totalPrice = 0;
            foreach ($cartItems as $item) {
                $totalPrice += $item['[price'];
            }

            return view('cart.payment', compact('cartItems', 'totalPrice'));
        }

        // Handle the case when $cartItems is empty (no items in the cart)
        return redirect()->back()->with('error', 'No items in the cart.');
    }

}
