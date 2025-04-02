@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <!-- Columna Izquierda: Video de YouTube -->
        <div class="col-md-5">
            @if($pelicula->youtube_enlace)
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{ $pelicula->youtube_enlace }}" allowfullscreen></iframe>
                </div>
            @else
                <img src="{{ asset('storage/' . $pelicula->ruta) }}" class="img-fluid" alt="{{ $pelicula->titulo }}">
            @endif
        </div>

        <!-- Columna Derecha: Información de la película -->
        <div class="col-md-7">
            <h2 class="fw-bold">{{ $pelicula->titulo }}</h2>
            <p class="text-muted"><strong>Año:</strong> {{ $pelicula->anio }}</p>

            <p><strong>Género:</strong> {{ $pelicula->genero }}</p>
            <p><strong>Clasificación:</strong> {{ $pelicula->clasificacion}}</p>
            
            <p class="mt-3"><strong>Descripción:</strong> {{ $pelicula->descripcion }}</p>
            
            <a href="{{ route('peliculas.index') }}" class="btn btn-primary mt-3">Volver al listado</a>
        </div>
    </div>
</div>
@endsection
