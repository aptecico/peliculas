@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3 class="page__heading">Editar Genero {{ $pelicula->nombre }}</h3></div>
                    <div class="card-body">
                        <a href="{{ url('/peliculas') }}" title="Atrás"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás</button></a>
                        <br />
                        <br />
                        <form method="POST" action="{{ url('/peliculas/' . $pelicula->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('peliculas.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Obtener el elemento de entrada de archivo
    const inputFile = document.getElementById('ruta');
    const imageContainer = document.querySelector('.col-xs-12.col-md-5');
    const imgElement = imageContainer.querySelector('img');
    
    // Crear el botón de eliminar y ocultarlo inicialmente
    const deleteButton = document.createElement('button');
    deleteButton.innerHTML = '✖';
    deleteButton.className = 'delete-btn btn btn-danger btn-sm position-absolute';
    deleteButton.style.cssText = 'top: 10px; right: 10px; display: none; z-index: 10;';
    
    // Añadir el botón al contenedor de la imagen
    imageContainer.style.position = 'relative';
    imageContainer.appendChild(deleteButton);
    
    // Función para mostrar la imagen
    function displayImage(src) {
        imgElement.src = src;
        deleteButton.style.display = 'block';
    }
    
    // Función para eliminar la imagen
    function removeImage() {
        imgElement.src = ''; // Limpiar la fuente de la imagen
        inputFile.value = ''; // Limpiar el input file
        deleteButton.style.display = 'none'; // Ocultar el botón
    }
    
    // Evento para cuando se selecciona un archivo
    inputFile.addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                displayImage(e.target.result);
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
    
    // Evento para el botón de eliminar
    deleteButton.addEventListener('click', function(e) {
        e.preventDefault(); // Prevenir comportamiento por defecto
        removeImage();
    });
    
    // Mostrar el botón si ya hay una imagen al cargar la página
    if (imgElement.src && imgElement.src !== window.location.href) {
        deleteButton.style.display = 'block';
    }
});

function CargarImagen(){
    alert('Hola como estas desde la funcion');
}
    
</script>
@endsection
