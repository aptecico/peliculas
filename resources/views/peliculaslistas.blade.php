@extends('layouts.app')

@section('content')
	<div class="container">
		<table class="table">
			<thead>
				<tr>
					<th>#</th>
					<th>Título</th>
					<th>Duración</th>
					<th>Descripción</th>
					<th>Imagen</th>
					<th>Enale youtube</th>
					<th>Acciones</th>

				</tr>
			</thead>
			<tbody>
				@foreach($peliculas as $item)
					<tr>
						<td></td>
						<td>{{$item->titulo}}</td>
						<td>{{$item->duracion}} mins</td>
						<td>
							Genero: {{$item->genero}}
							<br>
							Clasificación: {{$item->clasificacion}}
						</td>
						<td>
							<img src="{{asset('images/'.$item->ruta)}}" alt="Imagen de pelicula">
						</td>
						<td>
							<div class="embed-responsive embed-responsive-16by9">
  <iframe width="200" height="100" src="{{$item->youtube_enlace}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
</div>

						</td>
						<td>
							Botones de acciones
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>

	</div>
@endsection