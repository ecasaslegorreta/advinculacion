<?php

namespace App\Http\Controllers;

use App\Document;
use App\Office;
use App\Sender;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $documents =Document::all();
        return view('documents.index',compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $documents=Document::all();
        $ultimoDocument = $documents->last();

        if (is_null($ultimoDocument)) {
            $no_Oficio=1;}
        else{
            $no_Oficio= $ultimoDocument->id+1;
        }
        
       // echo $no_Oficio;
        $no_Oficio = str_pad($no_Oficio, 5, "0", STR_PAD_LEFT);
        $no_Oficio='2101300102L/'.$no_Oficio.'/2021';
        
        $senders = Sender::all();
        $offices = Office::all();
        return view('documents.create', compact('no_Oficio','senders','offices'));
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
            'noOficio' =>'required',
            'fecha' => 'required',
            'sender_id'  => 'required',
            'office_id' =>'required',
            'body' => 'required',
  
    
        ]);
         //dd($request);
        Document::create($request->all());
   
        return redirect()->route('documents.index')
                            ->with('opcion','si');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
        $senders  = Sender::all();
        $senderr  = Sender::where('id',$document->sender_id)->first();
        $offices  = Office::all();
        $officess = Office::where('id',$document->office->id)->first();
        
        return view('documents.edit',compact('document','senders','senderr','offices','officess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
        $request->validate([
            'noOficio' =>'required',
            'fecha' => 'required',
            'sender_id'  => 'required',
            'office_id' =>'required',
            'body' => 'required',
        ]);

        $document->update($request->all());
   
        return redirect()->route('documents.index')
                            ->with('opcion','si');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
        $document->delete();
        return redirect()->route('documents.index')->with('opcion','de');

    }
}
