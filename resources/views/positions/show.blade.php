@extends('adminlte::page')
@section ('title','Indicación | vista')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Indicación</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('positions.index') }}"> Regresar a indicaiones</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Indicación:</strong>
                {{ $position->name }}
            </div>
        </div>
    </div>
@endsection