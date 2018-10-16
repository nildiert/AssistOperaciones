<?php

namespace App\Http\Controllers;

use App\RecursosFisicos;
use Illuminate\Http\Request;

class recursosFisicosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $recursosFisicos= RecursosFisicos::orderBy('RecFisID','DESC')->paginate(50);
        return view('recursosFisicos.index',compact('recursosFisicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('recursosFisicos.create');
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
        $this->validate($request,[
            'RecFisCod',
            'RecFisTipo'
        ]
        );

        $request->merge([
            'RecFisTipo'=>strtoupper($request->RecFisTipo)
        ]);

        RecursosFisicos::create($request->all());

        return redirect()->route('recursosfisicos.index')->with('succes','Registro agregado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RecursosFisicos  $recursosFisicos
     * @return \Illuminate\Http\Response
     */
    public function show(RecursosFisicos $recursosFisicos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RecursosFisicos  $recursosFisicos
     * @return \Illuminate\Http\Response
     */
    public function edit(RecursosFisicos $recursosFisicos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecursosFisicos  $recursosFisicos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecursosFisicos $recursosFisicos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RecursosFisicos  $recursosFisicos
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecursosFisicos $recursosFisicos)
    {
        //
    }
}
