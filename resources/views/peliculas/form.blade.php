
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

    <div>
        <label class="block font-bold">Archivo:</label>
        <input type="file" name="ruta" class="w-full p-2 border border-gray-300 rounded-lg">
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

{{--
  <div class="row">
    <div class="col-xs-12 col-md-6">
            <div class="form-group {{ $errors->has('titulo') ? 'has-error' : ''}}">
                <label for="titulo" class="control-label">{{ 'Título' }}</label>
                <input class="form-control {{ $errors->has('titulo') ? 'is-invalid' : ''}}" name="titulo" type="text" id="titulo" value="{{ isset($peliculas->titulo) ? $peliculas->titulo : old('titulo')}}" >
                {!! $errors->first('titulo', '<div class="invalid-feedback d-block">:message</div>') !!}
            </div>
    </div>
    <div class="col-xs-12 col-md-6">
            <div class="form-group {{ $errors->has('duracion') ? 'has-error' : ''}}">
                <label for="duracion" class="control-label">{{ 'Duración' }}</label>
                <input class="form-control {{ $errors->has('duracion') ? 'is-invalid' : ''}}" name="duracion" type="text" id="duracion" value="{{ isset($peliculas->duracion) ? $peliculas->duracion : old('duracion')}}" placeholder=" en minutos ejemplo: 80" >
                {!! $errors->first('duracion', '<div class="invalid-feedback d-block">:message</div>') !!}
            </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-6">

    </div>
    <div class="col-xs-12 col-md-6">
        
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group {{ $errors->has('anio') ? 'has-error' : ''}}">
            <label for="anio" class="control-label">{{ 'Año' }}</label>
            <input class="form-control {{ $errors->has('anio') ? 'is-invalid' : ''}}" name="anio" type="number" id="anio" value="{{ isset($peliculas->anio) ? $peliculas->anio : old('anio')}}" >
            {!! $errors->first('anio', '<div class="invalid-feedback d-block">:message</div>') !!}
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        <div class="form-group {{ $errors->has('ruta') ? 'has-error' : ''}}">
            <label for="ruta" class="control-label">{{ 'Imagen promocional' }}</label>
            <input class="form-control {{ $errors->has('ruta') ? 'is-invalid' : ''}}" name="ruta" type="file" id="ruta" value="{{ isset($peliculas->ruta) ? $peliculas->ruta : old('ruta')}}" >
            {!! $errors->first('ruta', '<div class="invalid-feedback d-block">:message</div>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-md-6">
        <div class="form-group {{ $errors->has('youtube_enlace') ? 'has-error' : ''}}">
            <label for="youtube_enlace" class="control-label">{{ 'Enlace de youtube trailer' }}</label>
            <input class="form-control {{ $errors->has('youtube_enlace') ? 'is-invalid' : ''}}" name="youtube_enlace" type="text" id="youtube_enlace" value="{{ isset($peliculas->youtube_enlace) ? $peliculas->youtube_enlace : old('youtube_enlace')}}" >
            {!! $errors->first('youtube_enlace', '<div class="invalid-feedback d-block">:message</div>') !!}
        </div>
    </div>
    <div class="col-xs-12 col-md-6">
        
    </div>
</div>
<div class="form-group {{ $errors->has('descripcion') ? 'has-error' : ''}}">
    <label for="descripcion" class="control-label">{{ 'Descripcion' }}</label>
    <textarea class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : ''}}" rows="3" name="descripcion" type="textarea" id="descripcion" >{{ isset($cuentasefectivo->descripcion) ? $cuentasefectivo->descripcion : old('descripcion')}}</textarea>
    {!! $errors->first('descripcion', '<div class="invalid-feedback d-block">:message</div>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>

--}}