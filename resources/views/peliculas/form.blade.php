
@csrf
<div class="space-y-4">
    <div>
        <label class="block font-bold">Título:</label>
        <input type="text" name="titulo" value="{{ old('titulo', $pelicula->titulo ?? '') }}" 
               class="w-full p-2 border border-gray-300 rounded-lg">
    </div>

    <div>
        <label class="block font-bold">Duración (minutos):</label>
        <input type="number" name="duracion" value="{{ old('duracion', $pelicula->duracion ?? '') }}" 
               class="w-full p-2 border border-gray-300 rounded-lg">
    </div>

    <div>
        <label class="block font-bold">Género:</label>
        <select name="genero_id" class="w-full p-2 border border-gray-300 rounded-lg">
            @foreach($generos as $genero)
                <option value="{{ $genero->id }}" 
                    {{ (old('genero_id', $pelicula->genero_id ?? '') == $genero->id) ? 'selected' : '' }}>
                    {{ $genero->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-bold">Clasificación:</label>
        <select name="clasificacion_id" class="w-full p-2 border border-gray-300 rounded-lg">
            @foreach($clasificaciones as $clasificacion)
                <option value="{{ $clasificacion->id }}" 
                    {{ (old('clasificacion_id', $pelicula->clasificacion_id ?? '') == $clasificacion->id) ? 'selected' : '' }}>
                    {{ $clasificacion->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-bold">Año:</label>
        <input type="number" name="anio" value="{{ old('anio', $pelicula->anio ?? '') }}" 
               class="w-full p-2 border border-gray-300 rounded-lg">
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-7">
            <div>
                <label class="block font-bold">Archivo:</label>
                <input type="file" id="ruta" name="ruta" class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
        </div>
        <div class="col-xs-12 col-md-5">
            <img src="{{asset('images/'.$pelicula->ruta)}}" width="150" class="rounded mx-auto d-block" alt="...">
        </div>

    </div>

    

    <div>
        <label class="block font-bold">Enlace de YouTube:</label>
        <input type="url" name="youtube_enlace" value="{{ old('youtube_enlace', $pelicula->youtube_enlace ?? '') }}" 
               class="w-full p-2 border border-gray-300 rounded-lg">
    </div>

    <div>
        <label class="block font-bold">Descripción:</label>
        <textarea name="descripcion" class="w-full p-2 border border-gray-300 rounded-lg">{{ old('descripcion', $pelicula->descripcion ?? '') }}</textarea>
    </div>

    <div class="mt-4">
        <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg">Guardar</button>
    </div>
</div>

