<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $id = Auth::user()->id;
        // $profile =  Profile::where('id', $id)->first();
        // return view('profile.index',compact('profile'));
        $id = Auth::user()->id;
        return view('profile.index', ['profile' => User::where('id', $id)->first()]);
    }

    public function edit($id)
    {
        $profile = User::find($id);
        return view('profile.edit', compact('profile')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'                     => 'required',
            'posisi'                   => 'required',
            'bank'                     => 'required',
            'rekening'                 => 'required|numeric'
        ]);

        $profile = User::find($id);  
        $profile->name      = $request->get('name');
        $profile->posisi      = $request->get('posisi');
        $profile->bank      = $request->get('bank');
        $profile->rekening      = $request->get('rekening');

        $profile->save();

        return redirect('/profile')->with('success', 'Profile updated!');
    }

}
