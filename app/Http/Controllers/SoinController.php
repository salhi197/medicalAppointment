<?php

namespace App\Http\Controllers;

use App\Soin;
use Illuminate\Http\Request;

class SoinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soins = [
            ['id'=>1,'description'=>'test','nom'=>"salhi"]
        ];
        $last_id = 2;
        return view('medecin.soins',compact('soins','last_id'));
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
     * @param  \App\Soin  $soin
     * @return \Illuminate\Http\Response
     */
    public function show(Soin $soin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Soin  $soin
     * @return \Illuminate\Http\Response
     */
    public function edit(Soin $soin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Soin  $soin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Soin $soin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Soin  $soin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soin $soin)
    {
        //
    }
}
