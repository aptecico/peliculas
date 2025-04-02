@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Lista de Películas</h2>
        <a href="{{ route('peliculas.create') }}" class="btn btn-primary">Agregar Película</a>
    </div>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Título</th>
                <th>Género</th>
                <th>Clasificación</th>
                <th>Año</th>
                <th>Duración</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peliculas as $pelicula)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pelicula->titulo }}</td>
                <td>{{ $pelicula->genero->nombre ?? 'Sin género' }}</td>
                <td>{{ $pelicula->clasificacion->nombre ?? 'Sin clasificación' }}</td>
                <td>{{ $pelicula->anio }}</td>
                <td>{{ $pelicula->duracion }} min</td>
                <td>
                    <a href="{{ route('peliculas.show', $pelicula->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('peliculas.edit', $pelicula->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('peliculas.destroy', $pelicula->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta película?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrapper"> 
        {!! $peliculas->appends(['search' => Request::get('search')])->render() !!} 
    </div>
</div>
@endsection
