<?php

namespace App\Http\Controllers;


use App\Http\Controllers\TransportasiController;
use App\Models\JenisTransportasi;
use App\Models\TipePerjalanan;
use Illuminate\Http\Request;

class TransportasiController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('transportasi.index', ['transportasi' => JenisTransportasi::all()]);
    }

    public function create()
    {
        $tipe_perjalanan = TipePerjalanan::all();
        return view('transportasi.create', ['tipe_perjalanan' => $tipe_perjalanan]);
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
            'tipe_perjalanan_id'         => 'required',
            'nama'            		  => 'required'
        ]);

        $transportasi = new JenisTransportasi($request->all());    
        $transportasi->save();

        return redirect()->route('transportasi')->with('success', 'Jenis transportasi telah berhasil ditambahkan');
    }

    /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

        $transportasi = JenisTransportasi::find($id);
        return view('transportasi.modal',compact('transportasi'))->renderSections()['content'];
    }

    public function edit($id)
    {
        $tipe_perjalanan = TipePerjalanan::all();
        $transportasi = JenisTransportasi::find($id);
        return view('transportasi.edit', compact('transportasi'), ['tipe_perjalanan' => $tipe_perjalanan]); 
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
            'tipe_perjalanan_id'       => 'required',
            'nama'                   => 'required'
        ]);

        $transportasi = JenisTransportasi::find($id);  
        $transportasi->tipe_perjalanan_id      = $request->get('tipe_perjalanan_id');
        $transportasi->nama      			   = $request->get('nama');

        $transportasi->save();

        return redirect('/transportasi')->with('success', 'Transportasi updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JenisTransportasi::destroy($id);
        return redirect()->route('transportasi'); 
    }
}
