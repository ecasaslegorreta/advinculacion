@extends('adminlte::page')
@section ('title','Seguimiento | vista')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Seguimiento</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('correspondences.index') }}"> Regresar a correspondencia</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <h2>Seguimiento</h2>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <a class="btn btn-primary" href="{{ route('correspondences.index') }}"> Regresar a correspondencia</a>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <a class="btn btn-success float-right" href="{{ route('shifteds.create',$correspondence->id) }} "> Nuevo registro</a>
        </div>
    </div>
   <br>
   <div class="card text-center">
        <div class="card-header">
            <p class="card-text">{{ $correspondence->sender->name }}</p>
            <p class="card-text"><small>  {{ $correspondence->fechaRecepcion }} / {{ $correspondence->noSiase }} / {{ $correspondence->noOficio }}</small></p>
            <p class="card-text"><small> {{ $correspondence->body }}</small></p>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" data-order='[[ 0, "des" ]]' id="tabla" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Referencias</th>
                        <th>Indicación</th>
                        <th>Respuesta</th>
                        <th width="120px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shifteds as $shifted)
                        <tr>
                            <td>{{ $shifted->id }}</td>
                            
                            <td>{{ $shifted->correspondence->noSiase }} <p> <small> {{ $shifted->correspondence->noOficio }}, {{ $shifted->correspondence->fechaRecepcion }} </small></p> </td>
                            
                            <td>{{ $shifted->position->name }}</td>
                            <td class="text-left">{{ $shifted->bodyTurno }}</td>

                            <td>
                                <form action="{{ route('shifteds.destroy',$shifted->id) }}" method="POST" class="formulario-eliminar">
                
                                    <a class="btn btn-primary" href="#">Edit</a>
                
                                    @csrf
                                    @method('DELETE')
                    
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        
        $('#tabla').DataTable();
               
    </script>
@endsection
