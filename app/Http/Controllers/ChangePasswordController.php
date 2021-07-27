<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ChangePasswordController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;

class ChangePasswordController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function changeProfilePassword(){
        return view('profile.changepassword');
    }

    public function changeProfilePasswords(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }

    public function changeUserPassword($id){
    	$users = User::find($id);
        return view('users.changepassword', compact('users'), ['id' => $id]);
    }

    public function changeUserPasswords(Request $request, $id){

    	$user = User::find($id);
    	$password = $user->password;

        if (!(Hash::check($request->get('current-password'), $password))) {
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);


        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }
}
