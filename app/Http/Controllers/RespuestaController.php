<?php

namespace App\Http\Controllers;

use App\Models\respuesta;
use App\Models\indicadores;
use App\Models\resultado;
use App\Models\comentarios;
use Illuminate\Http\Request;

class RespuestaController extends Controller
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
    }

    /**
     * Display the specified resource.
     */
    public function show($respuesta)
    {
        //
        $id=auth()->user()->idcolegios;
        $data = respuesta::where('idindicadores', $respuesta)->get();
        $data1 = indicadores::with(['comentarios'=> function ($query) use ($id) {
            $query->where('idcolegios', $id);
        }])->where('idindicadores', $respuesta)->with('dimension')->get();
        $respuesta1 = resultado::where('idindicadores', $respuesta)->where('idcolegios',$id)->get();
        //return response()->json($respuesta);
        return view('indicador', compact('data','data1','respuesta1','id'));
    }
    public function showfac($respuesta,$colegio)
    {
        //
        $id=$colegio;
        $data = respuesta::where('idindicadores', $respuesta)->get();
        $data1 = indicadores::with(['comentarios'=> function ($query) use ($id) {
            $query->where('idcolegios', $id);
        }])->where('idindicadores', $respuesta)->with('dimension')->get();
        $respuesta1 = resultado::where('idindicadores', $respuesta)->where('idcolegios',$colegio)->get();

       // return response()->json($respuesta1);
        return view('indicador', compact('data','data1','respuesta1','id'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(respuesta $respuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, respuesta $respuesta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(respuesta $respuesta)
    {
        //
    }
}
