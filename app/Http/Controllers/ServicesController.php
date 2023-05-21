<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session; // Import your Session model
use App\Models\Facility; // Import your Facility model
use App\Models\User; // Import your User model
use App\Models\Food; // Import your Food model
use App\Models\Category; // Import your Category model


class ServicesController extends Controller
{
    public function service1(){
        // Retrieve the users' data
        $users = User::all();

        // Get the first user (assuming you want to autofill with the first user's data)
        $user = $users->first();

        return view('menus.service1', [
            'user' => $user, // Pass the first user to the view
            'users' => $users
        ]);
    }

    public function service2(){
        $categoryGroups = Category::all()->groupBy('category');
        
        // Retrieve the food items from the database
        $foodItem = Food::all(); // Replace this with your logic to retrieve food items
        
        return view('menus.service2', compact('categoryGroups', 'foodItem'));
    }




    public function service3(){
    $available_sessions = Session::where('booked', false)->get(); // Fetch all sessions where booked=false
    $booked_sessions = Session::where('booked', true)->get(); // Fetch all sessions where booked=true

    $facilities = [    
        (object) ['f_id' => 1, 'name' => 'Snooker Table', 'icon_url' => asset('image/icons/facility/snooker.png')],
        (object) ['f_id' => 2, 'name' => 'Ping Pong', 'icon_url' => asset('image/icons/facility/ping-pong.png')],
        (object) ['f_id' => 3, 'name' => 'Music Room', 'icon_url' => asset('image/icons/facility/music.png')],
        (object) ['f_id' => 4, 'name' => 'Basketball Court', 'icon_url' => asset('image/icons/facility/basketball.png')],
        (object) ['f_id' => 5, 'name' => 'Tennis Court', 'icon_url' => asset('image/icons/facility/tennis.png')],
        (object) ['f_id' => 6, 'name' => 'Discussion Room', 'icon_url' => asset('image/icons/facility/room.png')],
        (object) ['f_id' => 7, 'name' => 'Class Room', 'icon_url' => asset('image/icons/facility/class.png')],
    ];
    
    $grouped_sessions = $available_sessions->groupBy('f_id');

    $sessions = Session::all();

    return view('menus.service3', compact('available_sessions', 'booked_sessions','facilities','grouped_sessions','sessions'));
    }

}

