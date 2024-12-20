<?php

namespace App\Http\Controllers;

use App\Models\dimension;
use App\Models\ambitos;
use App\Models\indicadores;
use Illuminate\Http\Request;

class DimensionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data= Ambitos::with('dimension.indicadores')->get();
        return view('autoevaluacion',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(dimension $dimension)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dimension $dimension)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dimension $dimension)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dimension $dimension)
    {
        //
    }
}
