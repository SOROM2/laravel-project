<?php

namespace App\Http\Controllers;

use App\Sleep;
use Illuminate\Http\Request;

class SleepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sleep  $sleep
     * @return \Illuminate\Http\Response
     */
    public function show(Sleep $sleep)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sleep  $sleep
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sleep = Sleep::find($id);

        return view('sleep.edit')->with('sleep',$sleep); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sleep  $sleep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sleep $sleep)
    {
        $sleep = Sleep::find($request->input('id'));
        $request->validate([
            'date'=>'required',
            'hours'=>'required|integer|min:0'      
        ]);
        $sleep->update($request->all());
        return redirect('tables')->with('success','Your Sleep has been Updated ');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sleep  $sleep
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sleep $sleep)
    {
        $sleep->delete();

        return redirect('tables')->with('success','Sleep deleted successfully');
    }
}
