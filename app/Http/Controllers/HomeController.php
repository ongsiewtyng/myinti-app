<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Approval;
use App\Models\Contact;

use Carbon\Carbon;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $approvedEvents = Approval::where('status', 'approved')->take(5)->get();
        $info = Contact::all();

        $events = Approval::select('id', 'event_title', 'start_date', 'end_date')->get();

        $formattedEvents = [];

        foreach ($events as $event) {
            $formattedEvents[] = [
                'id' => $event->id,
                'title' => $event->title,
                'start' => Carbon::parse($event->start_date)->toIso8601String(),
                'end' => Carbon::parse($event->end_date)->toIso8601String(),
            ];
        }

        return view('home', compact('approvedEvents','info', 'formattedEvents'));
    }
}
