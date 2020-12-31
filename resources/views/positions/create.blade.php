@extends('adminlte::page')
@section ('title','Grado academico | nuevo')
@section('content')
@section ('title','Grado academico | crear')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Crear nuevo grado academico</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('positions.index') }}"> Regresar a indicaciones</a>
            <br>
        </div>
    </div>
</div>
   <br>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('positions.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cargo: </strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar Formuario</button>
        </div>
    </div>
   
</form>
@endsection