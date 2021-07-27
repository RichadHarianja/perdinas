<?php

namespace App\Http\Controllers;

use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', ['users' => User::all()]);
    }

    public function create()
    {
        $roles = Role::all();
        return view('users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'username'                => 'required|max:100|unique:users,username',
            'name'            		  => 'required',
            'password'				  => 'required',
            'posisi'                  => 'required',
            'bank'                    => 'required',
            'rekening'                => 'required|numeric',
            'role_id'                 => 'required'
        ]);


        $pass = $request->password;	
        $users = new User($request->all());  
        $users->password = bcrypt($pass);      
        $users->save();

        return redirect()->route('users')->with('success', 'User telah berhasil ditambahkan');
    }

    public function edit($id)
    {
        $roles = Role::all();
        $users = User::find($id);
        return view('users.edit', compact('users'), ['roles' => $roles]); 
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
            'rekening'                 => 'required|numeric',
            'role_id'                  => 'required'
        ]);

        $users = User::find($id);  
        $users->name      = $request->get('name');
        $users->posisi      = $request->get('posisi');
        $users->bank      = $request->get('bank');
        $users->rekening      = $request->get('rekening');
        $users->role_id      = $request->get('role_id');

        $users->save();

        return redirect('/users')->with('success', 'Users updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users'); 
    }

    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

        $user = User::find($id);
        return view('users.modal',compact('user'))->renderSections()['content'];
    }

}
