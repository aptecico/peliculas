<?php

namespace App\Http\Controllers;

use App\Models\Peliculas;
use App\Http\Controllers\Controller;
use App\Models\Clasificaciones;
use App\Models\Generos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeliculasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculas = Peliculas::with(['genero', 'clasificacion'])->get();
        return view('peliculas.index', compact('peliculas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peliculas.create',[
            'generos' => Generos::all(),
            'clasificaciones' => Clasificaciones::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'duracion' => 'required|integer|min:1',
            'genero_id' => 'required|exists:generos,id',
            'clasificacion_id' => 'required|exists:clasificaciones,id',
            'anio' => 'required|digits:4|integer',
            'ruta' => 'nullable|file|max:2048',
            'youtube_enlace' => 'nullable|url',
            'descripcion' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('ruta')) {
            $data['ruta'] = $request->file('ruta')->store('peliculas', 'public');
        }

        Peliculas::create($data);

        return redirect()->route('peliculas.index')->with('success', 'Película creada con éxito.');
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Peliculas $pelicula)
    {
        return view('peliculas.edit', [
            'pelicula' => $pelicula,
            'generos' => Generos::all(),
            'clasificaciones' => Clasificaciones::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peliculas $pelicula)
    {
        return view('peliculas.edit', [
            'pelicula' => $pelicula,
            'generos' => Generos::all(),
            'clasificaciones' => Clasificaciones::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peliculas $pelicula)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'duracion' => 'required|integer|min:1',
            'genero_id' => 'required|exists:generos,id',
            'clasificacion_id' => 'required|exists:clasificaciones,id',
            'anio' => 'required|digits:4|integer',
            'ruta' => 'nullable|file|max:2048',
            'youtube_enlace' => 'nullable|url',
            'descripcion' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('ruta')) {
            $data['ruta'] = $request->file('ruta')->store('peliculas', 'public');
        }

        $pelicula->update($data);

        return redirect()->route('peliculas.index')->with('success', 'Película actualizada con éxito.');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peliculas $pelicula)
    {
        $pelicula->delete();
        return redirect()->route('peliculas.index')->with('success', 'Película eliminada con éxito.');
    
    }

//funcion para listar todas las peliculas

    public function peliculasall(){
        //variable para recibir las pelicuas
        $peliculas=DB::table('peliculas')->join('generos','peliculas.genero_id','generos.id')
        ->join('clasificaciones','peliculas.clasificacion_id','clasificaciones.id')
        ->select('peliculas.*','generos.nombre as genero','clasificaciones.nombre as clasificacion')->get();
//retornar la vista
        return view('peliculaslistas',compact('peliculas'));
    }
}
