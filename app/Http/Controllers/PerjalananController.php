<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PerjalananController;
use App\Models\TujuanPerjalanan;
use Illuminate\Http\Request;

class PerjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('perjalanan.index', ['perjalanan' => TujuanPerjalanan::all()]);
    }

    public function create()
    {
        $perjalanan = TujuanPerjalanan::all();
        return view('perjalanan.create', ['perjalanan' => $perjalanan]);
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
            'nama'            		  => 'required'
        ]);

        $perjalanan = new TujuanPerjalanan($request->all());    
        $perjalanan->save();

        return redirect()->route('perjalanan')->with('success', 'Tujuan perjalanan telah berhasil ditambahkan');
    }

    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

        $perjalanan = TujuanPerjalanan::find($id);
        return view('perjalanan.modal',compact('perjalanan'))->renderSections()['content'];
    }

    public function edit($id)
    {
        $perjalanan = TujuanPerjalanan::find($id);
        return view('perjalanan.edit', compact('perjalanan')); 
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
            'nama'                   => 'required'
        ]);

        $perjalanan = TujuanPerjalanan::find($id);  
        $perjalanan->nama      			   = $request->get('nama');

        $perjalanan->save();

        return redirect('/perjalanan')->with('success', 'Tujuan perjalanan updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TujuanPerjalanan::destroy($id);
        return redirect()->route('perjalanan'); 
    }
}
