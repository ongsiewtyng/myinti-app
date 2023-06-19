<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use App\Models\User;
use App\Models\Contact;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function service1(){
        $clubs = Contact::pluck('club_name');
        return view('menus.service1', compact('clubs'));
    }

    public function submitProposal(Request $request){
        // Validate the form data
        $validatedData = $request->validate([
            'club_name' => 'required',
            'event_title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'urgency' => 'required',
            'document.*' => 'required|mimes:pdf,doc,docx',
        ]);

        // Check if the uploaded files are in the correct format
        $uploadedFiles = $request->file('document');
        foreach ($uploadedFiles as $file) {
            $extension = $file->getClientOriginalExtension();
            if (!in_array($extension, ['pdf', 'doc', 'docx'])) {
                return redirect()->route('service1')->with('error', 'Wrong file format. Please ensure the document is in PDF or Word format.');
            }
        }

        // Get the contact ID based on the selected club name
        $clubName = $request->input('club_name');
        $contact = Contact::where('club_name', $clubName)->first();
        $contactId = $contact ? $contact->id : null;


        // Create a new Approval instance and populate it with the form data
        $approval = new Approval();
        $approval->club_name = $request->input('club_name');
        $approval->event_title = $request->input('event_title');
        $approval->start_date = $request->input('start_date');
        $approval->end_date = $request->input('end_date');
        $approval->start_time = $request->input('start_time');
        $approval->end_time = $request->input('end_time');
        $approval->urgency = $request->input('urgency');
        
        // Get the authenticated user's ID and associate it with the approval
        $user_id = Auth::id();
        $approval->user_id = $user_id;
        $approval->contact_id = $contactId;

        // Handle file upload and store the filename(s) in the approval
        if ($request->hasFile('document')) {
            $files = $request->file('document');
            $filenames = [];

            foreach ($files as $file) {
                $timestamp = time();
                $formattedDate = date('j F Y', $timestamp);
                $filename = $formattedDate . '_' . $file->getClientOriginalName();
                $filename = str_replace(['[', ']'], '', $filename); // Remove square brackets
                $file->storeAs('documents', $filename);
                $filenames[] = $filename;
            }

            $approval->document = implode(',', $filenames); // Store filenames as comma-separated string
        }


        // Save the approval to the database
        $approval->save();
        // Save the approval to the database
        if ($approval->save()) {
            // Data saved successfully
            return redirect()->route('service1')->with('success', 'Proposal Submitted Successfully');
        } else {
            // Data saving failed
            $error = $approval->getConnection()->getPdo()->errorInfo();
            return redirect()->route('service1')->with('error', 'Proposal Submission Failed: '.$error[2]);
        }
        // // Redirect to a success page or display a success message
        // return redirect()->back()->with('success', 'Approval request submitted successfully.');
    }
}
