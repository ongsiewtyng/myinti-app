<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking; // Import your Session model
use App\Models\Session;
use App\Models\Facility; // Import your Facility model
use Illuminate\Support\Facades\Auth; // Import the Auth facade


class FacilityController extends Controller
{
    /**
     * Create a new controller inst ance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $facilities = Facility::all();

        return view('menus.service3', compact('facilities'));
    }

    public function store(Request $request)
    {
        $booking = new Booking();
        $booking->f_id = $request->facility_id;
        $booking->session_id = $request->session_id;
        $booking->user_id = Auth::id();
        $booking->name = $request->name;
        $booking->studentid = $request->studentid;

        
        // Check if the selected room ID is 6 or 7
        if ($request->facility_id == 6 || $request->facility_id == 7) {
            $booking->room = $request->room;
        } else {
            $booking->room = null; // Set to null if the room ID is not 6 or 7
        }

        $booking->time = $request->time;
        // Add any other relevant data to the booking

        // Save the booking
        $booking->save();

        // Redirect or return a response according to your needs
        return redirect()->route('service3')->with('success', 'Booking successfully created!');
    }

    public function getSessionID(Request $request){
        $facilityId = $request->input('facility_id');
        $time = $request->input('time');

        $session = Session::where('f_id', $facilityId)->where('time', $time)->first();

        if ($session) {
            if (!$session->booked || $session->isExpired()) {
                $session->booked = true;
                $session->save();
    
                return response()->json(['success' => true, 'session_id' => $session->id, 'room' => $session->rooms]);
            } else {
                return response()->json(['success' => false, 'message' => 'Session is already booked.']);
            }
        }

        return response()->json(['success' => false]);
    }
    
}
