<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Items;
use App\Models\User;
use App\Models\Food;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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
    
    public function index(){
        $user_id = auth()->user()->id;
        $orders = Order::where('user_id', $user_id)->get();
        $orderIds = $orders->pluck('id');
        $items = Items::whereIn('order_id', $orderIds)->get();
        
        // Calculate order total for each order
        $totals = [];
        foreach ($orders as $order) {
            $total = $items->where('order_id', $order->id)->sum('total');
            $totals[$order->id] = $total;
        }
        
        $status = $items->pluck('status')->unique();

        return view('menus.orders', compact('orders', 'items', 'totals', 'status'));
    }


    public function details($id){
        $user_id = auth()->user()->id;
        $order = Order::where('user_id', $user_id)->find($id);
        $items = Items::where('order_id', $id)->get();
        $details = Food::whereIn('id', $items->pluck('food_id'))->get();
        $total = $items->sum('total');

        return view('menus.details', compact('order', 'items', 'total', 'details'));
    }


}
