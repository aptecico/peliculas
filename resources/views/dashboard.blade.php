@extends('layouts.app')

@section('content')
Hola como estas
<div class="container">
	Hola como estas dentro del contenedor
	<div class="row">
		<div class="col-xs-12 col-md-4">
			columna 1
			<button class="btn btn-primary">Botón</button>
		</div>
        <div class="col-xs-12 col-md-4">
        	columna 2
        	<a href="https://www.youtube.com" class="btn btn-warning" target="_blank">Enlace convertido en botón</a>
        </div>
        <div class="col-xs-12 col-md-4">
        	columan 3
        	<input class="btn btn-danger" type="submit" name="boton">
        </div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="text-center">
  <img src="https://i.ytimg.com/vi/CjQ6d1U8WA8/maxresdefault.jpg" class="rounded" alt="Mi primera imagen">
</div>
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="embed-responsive embed-responsive-16by9">
  <iframe width="560" height="315" src="https://www.youtube.com/embed/4k8qtOYU18k?si=0BQYJy25URM_kz-D" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
</div>
		</div>
	</div>

<div class="row">
	<div class="col-12">
		<!-- Button trigger modal -->
<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Mi primer modal
</button>
	</div>
</div>
</div>

{{--Esto es un comentario--}}
<!-- secciones de modales-->
<!-- Modal -->
<div class="modal fade modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal de noticias</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
@endsection