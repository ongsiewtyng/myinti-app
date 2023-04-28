<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

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
        if(empty($request->input('password')) || empty($request->input('password_confirmation'))) {
            $user->password = $user->password;
        } else {
            $user->password = Hash::make($request->input('password'));
            $user->password = Hash::make($request->input('password_confirmation'));
        }
        
        $user->password = Hash::make($request->input('password'));
        $user->password = Hash::make($request->input('password_confirmation'));

        if($request->hasFile('pic')){
            $request->validate(['pic' => 'image|mimes:jpg,png,jpeg|max:1000']);
            $file = $request->pic;
            $fileName = time() . uniqid() . '.' . $file->extension();
                $storeFile = $file->move(public_path('uploads/users'), $fileName);
                $user->pic = $fileName;
        }

        $user->save();
        return redirect()->back()->with('success', 'Your profile has been updated.');

    }
}
