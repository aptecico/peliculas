<?php

namespace App\Http\Controllers;

use App\Models\Generos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenerosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generos = Generos::all();
        return view('generos.index', compact('generos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('generos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $campos=['nombre'=>'required|string|min:1|max:100'];
        $mensaje=[
                'required'=>' Este campo es requerido. ',
                'string'     => 'Este campo  debe ser solo texto',
                'min'   =>'Este campo debe tener como peso maximo :min caracteres',
                'max'   =>'Este campo debe tener como peso maximo :max caracteres'
        ];
         
         $request->validate($campos,$mensaje);

         $requestData=$request->all();
         Generos::create($requestData);

         return redirect()->route('generos.index')->with('success','Genero creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Generos $genero)
    {
    return view('generos.show', compact('genero'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Generos $genero)
    {
        return view('generos.edit',compact('genero'));
    }
    public function update(Request $request, Generos $genero)
    {
        $campos=['nombre'=>'required|string|min:1|max:100'];
        $mensaje=[
                'required'=>' Este campo es requerido. ',
                'string'     => 'Este campo  debe ser solo texto',
                'min'   =>'Este campo debe tener como peso maximo :min caracteres',
                'max'   =>'Este campo debe tener como peso maximo :max caracteres'
        ];
         
         $request->validate($campos,$mensaje);

         $requestData=$request->input();
        $genero->update($requestData);
        return redirect()->route('generos.index')->with('success','Genero actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Generos $genero)
    {
        $genero->delete();
        return redirect()->route('generos.index')->with('success','Genero eliminado correctamente');
    }
}
