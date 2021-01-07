@extends('adminlte::page')
@section ('title','Oficinas | Actualizar')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Actualiza Oficina</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('offices.index') }}"> Regresa a la dirección</a>
            </div>
        </div>
    </div>
   
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
  
    <form action="{{ route('offices.update',$office->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Nombre: </strong>
                    <input type="text" name="name" class="form-control" placeholder="enter Nombre" value="{{ $office->name }}">
                </div>
            </div>
            <div class="col-xs-5 col-sm-5 col-md-5">
                <div class="form-group">
                    <strong>Cargo: </strong>
                    <input type="text" name="cargo" class="form-control" placeholder="enter Cargo" value="{{ $office->cargo }}">
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Calle: </strong>
                        <input type="text" name="calle" class="form-control" placeholder="enter Nombre" value="{{ $office->calle}}" >
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong>No. Interio: </strong>
                        <input type="text" name="noInterior" class="form-control" placeholder="Número interior" value="{{ $office->noInterior }}">
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3">
                    <div class="form-group">
                        <strong>No. Exterior: </strong>
                        <input type="text" name="noExterior" class="form-control" placeholder="Número exterior" value="{{ $office->noExterior }}">
                    </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5">
                    <div class="form-group">
                        <strong>Colonia: </strong>
                        <input type="text" name="colonia" class="form-control" placeholder="Número eterior" value="{{ $office->colonia}}">
                    </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>CP: </strong>
                        <input type="text" name="cp" class="form-control" placeholder="Código Postal" value="{{ $office->cp }}">
                    </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5">
                    <div class="form-group">
                        <strong>Ciudad: </strong>
                        <input type="text" name="ciudad" class="form-control" placeholder="Ciudad" value="{{$office->ciudad }}">
                    </div>
                </div>
    
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>Telefono: </strong>
                        <input type="text" name="telefono" class="form-control" placeholder="Telefono de oficina" value="{{ $office->telefono }}">
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>Celular: </strong>
                        <input type="text" name="celular" class="form-control" placeholder="Celular a 10 digítos" value="{{ $office->celular }}">
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>Email: </strong>
                        <input type="text" name="email" class="form-control" placeholder="Correo Electronico"  value="{{ $office->email }}">
                    </div>
                </div>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Enviar Formuario</button>
            </div>
        </div>
   




         <!--<div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Grado academico:</strong>
                    <input type="text" name="name" value="#" class="form-control" placeholder="Name">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Enviar formulario</button>
            </div>
        </div>-->
   
    </form>
@endsection
