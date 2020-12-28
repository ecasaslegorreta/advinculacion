<?php

namespace App\Http\Controllers;

use App\correspondence;
use App\Sender;
use Illuminate\Http\Request;

class CorrespondenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$correspondences= Sender::with('correspondences')->get();
       //dd($correspondences);

        $correspondences = Correspondence::all();
        return view('correspondences.index',compact('correspondences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $senders =Sender::all();
        //dd($senders);
        return view('correspondences.create',compact('senders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'sender_id'  => 'required',
            'noSiase' => 'required',
            'noOficio'  => 'required',
            'fechaRecepcion' => 'required',
            'body'=>'required'
     
        ]);
         //  dd($request);
        Correspondence::create($request->all());
   
        return redirect()->route('correspondences.index')
                            ->with('opcion','si');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
