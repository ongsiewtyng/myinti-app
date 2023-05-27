<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session; // Import your Session model
use App\Models\Facility; // Import your Facility model
use Illuminate\Support\Facades\Auth; // Import the Auth facade


class BookSessionController extends Controller
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
    
    public function index() {
        // Get the facility object for the requested session
        $facilities = Facility::all();

        return view('menus.confirmBooking', compact('facilities'));
    }


    public function confirmBooking($f_id, $time) {
        // Get the facility object for the booked session
        $facility = Session::find($f_id);
        if (!$facility) {
            return redirect('/service3')->with('error', 'Sorry, the requested facility does not exist.');
        }   
    
        // Get the user ID from the session
        $user_id = Auth::id();
    
        // Check if the requested session is available
        $session = Session::where('f_id', $facility->f_id)
                  ->where('time', $time)
                  ->whereNull('studentid')
                  ->first();
    
        // If the requested session is not available, return an error message
        if (!$session) {
            return redirect('/service3')->with('error', 'Sorry, the requested session is not available.');
        }
    
        // Return the confirmation view with the facility, session time, and user ID
        return view('menus.confirmBooking', [
            'facility' => $facility,
            'time' => $time,
            'user_id' => $user_id,
        ]);
    }
    
    
    
}
