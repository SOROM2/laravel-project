<?php

namespace App\Http\Controllers;

use App\Height;
use Illuminate\Http\Request;

class HeightController extends Controller
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
     * @param  \App\Height  $height
     * @return \Illuminate\Http\Response
     */
    public function show(Height $height)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Height  $height
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $height = Height::find($id);

        return view('height.edit')->with('height',$height); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Height  $height
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Height $height)
    {
        $height = Height::find($request->input('id'));
        $request->validate([
            'date'=>'required',
            'Centimeters'=>'required'     
        ]);
        $height->update($request->all());
        return redirect('tables')->with('success','Your Height has been Updated ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Height  $height
     * @return \Illuminate\Http\Response
     */
    public function destroy(Height $height)
    {
        $height->delete();

        return redirect('tables')->with('success','Height deleted successfully');
    }
}
