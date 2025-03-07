<?php

namespace App\Http\Controllers;

use App\Models\comentarios;
use Illuminate\Http\Request;
use App\Models\resultado;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $data = request()->except('_token');
        $data['idusers'] = auth()->user()->id;
        comentarios::insert($data);
        $idcol= request('idcolegios');
        //return response()->json($idcol);
        return redirect()->to('autoevaluacion/facilitador/'.$idcol)->with('success', 'Comentario agregado con éxito');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(comentarios $comentarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(comentarios $comentarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, comentarios $comentarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comentarios $comentarios)
    {
        //
    }
}
