@extends('tareas.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
      
        <div class="pull-right">
            <a class="btn bg-warning" href="{{ route('tareas.index') }}"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
</svg>   Regresa</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Upss!</strong> Hay algun problema.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   <br>
   <br>
<form action="{{ route('tareas.store') }}" method="POST">
    @csrf
    <div class="form-group">
    <label for="exampleFormControlSelect1"><h4>Ingresa tu tarea</h4></label>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
            </div>
        </div>

        <div class="form-group"  >
    <label for=""> <strong>Categoria</strong></label>
    <select class="form-control " name="categoria_id" id="inputCategoria_Id">
        @foreach ($categorias as $categoria )
        <option value="{{$categoria['id']}}">{{$categoria['nombre']}}</option>
            
        @endforeach
    </select>
      


            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
   
</form>


@endsection