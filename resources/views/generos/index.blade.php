@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h3 class="page__heading">Generos</h3></div>
                    <div class="card-body">
                        
                        <a href="{{ url('/generos/create') }}" class="btn btn-success btn-sm" title="Agregar nuevo genero">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo
                        </a>
                  
                        <form method="GET" action="{{ url('/generos') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nombre</th><th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($generos as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>
                                            <a href="{{ url('/generos/' . $item->id) }}" title="Ver Genero"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/generos/' . $item->id . '/edit') }}" title="Edit Genero"><button class="btn btn-primary btn-sm"><i class="fa fa-edit" aria-hidden="true"></i> Editar</button></a>
                                            <form method="POST" action="{{ url('/generos' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete genero" onclick="return confirm(&quot;Confirmar Eliminar?&quot;)"><i class="fa fa-trash" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
