<div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
    <label for="nombre" class="control-label">{{ 'Nombre' }}</label>
    <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : ''}}" name="nombre" type="text" id="nombre" value="{{ isset($genero->nombre) ? $genero->nombre : old('nombre')}}" >
    {!! $errors->first('nombre', '<div class="invalid-feedback d-block">:message</div>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Actualizar' : 'Crear' }}">
</div>