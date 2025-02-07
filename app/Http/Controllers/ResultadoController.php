<?php

namespace App\Http\Controllers;

use App\Models\resultado;
use App\Models\respuesta;
use App\Models\indicadores;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function indexapre()
    {
        //
        $id=auth()->user()->idcolegios;
        $data1= indicadores::with(['comentarios'=> function ($query) use ($id) {
            $query->where('idcolegios', $id);
        }])->where('idindicadores','5')->get();
        $data = resultado::with('comentarios')->where('idindicadores','5')->where('idcolegios',$id)->get();
        //return response()->json($data);
        return view('resultadosaprendizaje',compact('data','data1','id'));
    }
    public function indexaprefac($idc)
    {
        //
        $id=$idc;
        $data1= indicadores::with(['comentarios'=> function ($query) use ($id) {
            $query->where('idcolegios', $id);
        }])->where('idindicadores','5')->get();
        $data = resultado::with('comentarios')->where('idindicadores','5')->where('idcolegios',$id)->get();
        //return response()->json($data);
        return view('resultadosaprendizaje',compact('data','data1','id'));
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
        //Validar los datos
        $datosResultado = request()->except('_token');
        $datosResultado['idindicadores'] = respuesta::where('id',$request['idrespuesta'])->value('idindicadores');
            //Solo se pueden subir imagenes o archivos de texto??
        if ($request->hasFile('evidencia')) {
            $request->validate([
                'evidencia' => 'required|file|mimes:doc,docx,pdf|max:2048',
                //'evidencia' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $file = $request->file('evidencia');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            $datosResultado['evidencia'] = '/storage/' . $filePath;
        }
        $datosResultado['idcolegios'] = auth()->user()->idcolegios;
        
        //return response()->json($datosResultado);
        resultado::insert($datosResultado);
         return redirect()->route('autoevaluacion.index')->with('success', 'Resultado creado correctamente.');
    }
    public function resul(Request $request)
    {
        //Validar los datos
        $datosResultado = request()->except('_token');
            //Solo se pueden subir imagenes o archivos de texto??
        if ($request->hasFile('evidencia')) {
            $request->validate([
                'evidencia' => 'required|file|mimes:doc,docx,pdf|max:2048',
                //'evidencia' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $file = $request->file('evidencia');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('uploads', $fileName, 'public');
            $datosResultado['evidencia'] = '/storage/' . $filePath;
        }
        $datosResultado['idcolegios'] = auth()->user()->idcolegios;
        $datosResultado['idrespuesta'] = '6';
        $datosResultado['idindicadores'] = '5';
        $datosResultado['fundamentacion'] = 'No aplica';
        //return response()->json($datosResultado);
        resultado::insert($datosResultado);
         return redirect()->route('autoevaluacion.index')->with('success', 'Resultado creado correctamente.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(resultado $resultado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(resultado $resultado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, resultado $resultado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(resultado $resultado)
    {
        //
    }
}
