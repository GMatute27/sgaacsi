<?php

namespace App\Http\Controllers;

use App\Models\dimension;
use App\Models\ambitos;
use App\Models\indicadores;
use App\Models\Respuesta;
use Illuminate\Http\Request;

class DimensionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $id=auth()->user()->idcolegios;
        $data = Ambitos::with(['dimension.indicadores.respuesta.resultado' => function ($query) use ($id) {
            $query->where('idcolegios', $id);
        }])->where('idambito','!=','4')->get();
        //return response()->json($data);
        
        return view('autoevaluacion',compact('data','id'));
    }
    public function indexfaci($index){
        $id=auth()->user()->idcolegios;
        if($id==0){     
            $id=$index;
           }
           $data = Ambitos::with(['dimension.indicadores.respuesta.resultado' => function ($query) use ($id) {
            $query->where('idcolegios', $id);
        }])->where('idambito','!=','4')->get();
        return view('autoevaluacion',compact('data','id'));
    }
    public function resumen()
    {
        $id = auth()->user()->idcolegios;
        $data = Indicadores::with(['comentarios' => function ($query) use ($id) {
            $query->where('idcolegios', $id);
        }, 'respuesta.resultado' => function ($query) use ($id) {
            $query->where('idcolegios', $id);
        }])->where('idindicadores', '!=', '5')->get();
        //return response()->json($data);
        
        return view('resumen',compact('data','id'));
    }
    public function resumenfaci($index)
    {
        $id = auth()->user()->idcolegios;
        if($id==0){     
            $id=$index;
           }
        $data = Indicadores::with(['comentarios' => function ($query) use ($id) {
            $query->where('idcolegios', $id);
        }, 'respuesta.resultado' => function ($query) use ($id) {
            $query->where('idcolegios', $id);
        }])->where('idindicadores', '!=', '5')->get();
        //return response()->json($data);
        
        return view('resumen', compact('data', 'id'));
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
