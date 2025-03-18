@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3 class="page__heading">Genero {{ $genero->nombre }}</h3></div>
                    <div class="card-body">

                        <a href="{{ url('/generos') }}" title="Atrás"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Atrás</button></a>
                        <a href="{{ url('/generos/' . $genero->id . '/edit') }}" title="Editar Genero"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Editar</button></a>
                        <form method="POST" action="{{ url('generos' . '/' . $genero->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Borrar Categoría" onclick="return confirm(&quot;Confirmar Borrar?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Borrar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> Nombre </th><td> {{ $genero->nombre }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
