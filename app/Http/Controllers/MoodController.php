<?php

namespace App\Http\Controllers;

use App\Mood;
use Illuminate\Http\Request;

class MoodController extends Controller
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
     * @param  \App\Mood  $mood
     * @return \Illuminate\Http\Response
     */
    public function show(Mood $mood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mood  $mood
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mood = Mood::find($id);

        return view('mood.edit')->with('mood',$mood); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mood  $mood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mood $mood)
    {
        $mood = Mood::find($request->input('id'));
        $request->validate([
            'date' => 'required',
            'level' => 'required',         
        ]);
        $mood->update($request->all());
        return redirect('tables')->with('success','Your Mood has been Updated ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mood  $mood
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mood $mood)
    {
        $mood->delete();

        return redirect('tables')->with('success','Mood deleted successfully');

    }
}
