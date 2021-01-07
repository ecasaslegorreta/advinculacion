<?php

namespace App\Http\Controllers;

use App\correspondence;
use App\Office;
use App\Sender;
use App\Shifted;
use Illuminate\Http\Request;
use OfficeSeeder;

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
        $senders=Sender::all();
        $offices =Office::all();
        //dd($senders);
        return view('correspondences.create',compact('offices','senders'));
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
            'office_id' =>'required',
            'noSiase' => 'required',
            'noOficio'  => 'required',
            'fechaRecepcion' => 'required',
            'body'=>'required'
     
        ]);
         //dd($request);
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
    public function show(Correspondence $correspondence)
    {
        //
        $shifteds = Shifted::where('correspondence_id',$correspondence->id)->get();
        //$sender ->Correspondences;
        //$senders =Sender::with('correspondences')->get();

        //dd($correspondences);
        return view('correspondences.show',compact('correspondence','shifteds'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(correspondence $correspondence)
    {
        //
        $senders =Sender::all();
        $senderr = Sender::where('id',$correspondence->sender_id)->first();
        return view('correspondences.edit',compact('correspondence','senders','senderr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Correspondence $correspondence)
    {
        //
        //dd($correspondence);
        $request->validate([
            'sender_id'  => 'required',
            'noSiase' => 'required',
            'noOficio'  => 'required',
            'fechaRecepcion' => 'required',
            'body'=>'required'
     
        ]);
        
        $correspondence->update($request->all());
        //$sender ->update($request->all());
   
        return redirect()->route('correspondences.index')
                            ->with('opcion','si');

    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(correspondence $correspondence)
    {
        //

        $correspondence ->delete();
        return redirect()->route('correspondences.index')
                        ->with('opcion','de');
    }
}
