<?php

namespace App\Http\Controllers;

use App\PersContr;
use Illuminate\Http\Request;

class persContrController extends Controller
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
        PersContr::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PersContr  $persContr
     * @return \Illuminate\Http\Response
     */
    public function show(PersContr $persContr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PersContr  $persContr
     * @return \Illuminate\Http\Response
     */
    public function edit(PersContr $persContr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PersContr  $persContr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PersContr $persContr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PersContr  $persContr
     * @return \Illuminate\Http\Response
     */
    public function destroy(PersContr $persContr)
    {
        //
    }
}
