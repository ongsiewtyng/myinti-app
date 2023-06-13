<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Approval;
use App\Models\Contact;

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

        return view('home', compact('approvedEvents','info'));
    }
}
