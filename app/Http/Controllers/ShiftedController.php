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
        //gerar condición de busqueda solo los que no esta en acurdo del catalogo de position
       //dd($shifteds);
        return view('shifteds.index',compact('shifteds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        //$correspondences = Correspondence::all();
        $correspondence = Correspondence::where('id',$id)->first();
        $correspondences = Correspondence::all();
        $senders =Sender::all();
        $positions = Position::all();

        //dd($senders);
        return view('shifteds.create',compact('correspondences','correspondence','senders','positions'));
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
        $shifteds = Shifted::where('correspondence_id',$correspondence->id)->get();
        //$sender ->Correspondences;
        //$senders =Sender::with('correspondences')->get();
        $correspondence = Correspondence::where('id',$correspondence->id)->first();
        //dd($correspondences);
        return view('correspondences.show',compact('correspondence','shifteds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shifted  $shifted
     * @return \Illuminate\Http\Response
     */
    public function edit(Shifted $shifted)
    {
 
        $senders =Sender::all();
        $senderr = Sender::where('id',$correspondence->sender_id)->first();
        return view('correspondences.edit',compact('shifted','senders','senderr'));
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

        $shifted ->delete();
        return redirect()->route('shifteds.index')
                        ->with('opcion','de');
    }
}
