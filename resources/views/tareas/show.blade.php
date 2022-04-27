@extends('tareas.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Muestra Tarea</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tareas.index') }}"> Retorna</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $tarea->nombre }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categoria:</strong>
                {{ $categoria->nombre }}
            </div>
        </div>
    </div>
@endsection