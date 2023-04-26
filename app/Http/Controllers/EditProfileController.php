<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;

class EditProfileController extends Controller
{
    /**
     * Show the form for editing the user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function edit($id){
        $user = User::find($id);
        return view('menus.edit-profile',compact('user'));
    }

    /**
     * Update the user's profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id){
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->password = $request->input('password_confirmation');

        if($request->hasFile('pic')){
            $destination = 'uploads/users/'.$user->pic;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('pic');
            $extension = $file->getClientOriginalExtension();
            $filename = user->id. '.' . $extension;
            $file->move(public_path('uploads/users'),$filename);
            $user->pic = $filename;
        }

        $user->update();
        return redirect()->back()->with('success', 'Your profile has been updated.');

    }
}
