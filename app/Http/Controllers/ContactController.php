<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\message;

class ContactController extends Controller
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
        $user = auth()->user();
        $name = $user->name;
        $email = $user->email;

        return view('menus.contact', compact('name', 'email'));
    }

    
    public function submitForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);

        // Create a new instance of the Contact model
        $contact = new message();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        
        // Save the contact form data to the database
        $contact->save();

        // Redirect the user back to the contact form with a success message
        return redirect()->back()->with('success', 'Your message has been submitted successfully.');
    }
}
