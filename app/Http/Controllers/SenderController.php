<?php

namespace App\Http\Controllers;

use App\Sender;
use App\Correspondence;
use Illuminate\Http\Request;

class SenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $senders =Sender::all();
        return view('senders.index',compact('senders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('senders.create');
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
            'name'  => 'required',
            'cargo' => 'required',
            'area'  => 'required',
            'cp'    => 'digits_between:5,5|numeric',
            'email' => 'email'
     
        ]);
  
        Sender::create($request->all());
   
        return redirect()->route('senders.index')
                            ->with('opcion','si');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sender  $sender
     * @return \Illuminate\Http\Response
     */
    public function show(Sender $sender)
    {
        //
        $correspondences = Correspondence::where('sender_id',$sender->id)->get();
        //$sender ->Correspondences;
        //$senders =Sender::with('correspondences')->get();

        //dd($correspondences);
        return view('senders.show',compact('sender','correspondences'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sender  $sender
     * @return \Illuminate\Http\Response
     */
    public function edit(Sender $sender)
    {
        //
        return view('senders.edit',compact('sender'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sender  $sender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sender $sender)
    {
        //
        $request->validate([
            'name'  => 'required',
            'cargo' => 'required',
            'area'  => 'required',
            'cp'    => 'digits_between:5,5|numeric',
            'email' => 'email'
     
        ]);
  
        $sender ->update($request->all());
   
   
        return redirect()->route('senders.index')
                            ->with('opcion','up');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sender  $sender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sender $sender)
    {
        //

        $sender ->delete();
        return redirect()->route('senders.index')
                        ->with('opcion','de');
    }
}
