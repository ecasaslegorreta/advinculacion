<?php

namespace App\Http\Controllers;

use App\Correspondence;
use App\Position;
use App\Sender;
use App\Shifted;
use Illuminate\Http\Request;

class ShiftedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $shifteds = Shifted::all();
//        dd($shifteds);
        return view('shifteds.index',compact('shifteds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $correspondences = Correspondence::all();
        $senders =Sender::all();
        $positions = Position::all();

        //dd($senders);
        return view('shifteds.create',compact('correspondences','senders','positions'));
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
            'correspondence_id' =>'required',
            'sender_id'  => 'required',
            'position_id' =>'required',
            'fechaTurno' => 'required',
            'bodyTurno' => 'required',
            'observacion'  => 'nullable',
    
        ]);
         //dd($request);
        Shifted::create($request->all());
   
        return redirect()->route('shifteds.index')
                            ->with('opcion','si');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shifted  $shifted
     * @return \Illuminate\Http\Response
     */
    public function show(Shifted $shifted)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shifted  $shifted
     * @return \Illuminate\Http\Response
     */
    public function edit(Shifted $shifted)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shifted  $shifted
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shifted $shifted)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shifted  $shifted
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shifted $shifted)
    {
        //
    }
}
