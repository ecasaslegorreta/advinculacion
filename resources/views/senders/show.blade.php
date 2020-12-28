@extends('adminlte::page')
@section ('title','Remitentes | vista')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Remitente</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('senders.index') }}"> Regresar a Remitentes</a>
            </div>
        </div>
    </div>
   <br>
   <div class="card text-center">
        <div class="card-header">
           <h3> {{ $sender->name }}</h3>
            <p class="card-text">{{ $sender->cargo }}, Área: {{ $sender->area }}</p>
            <p class="card-text"><small> Telefono: {{ $sender->telefono }}, Celular: {{ $sender->celular }}, email:{{ $sender->email }} Calle
                {{ $sender->calle  }}, No. Interior  {{ $sender->noInterior }}, No. Exterior {{ $sender->noExterior }}
              Col. {{ $sender->colonia }}, CP {{ $sender->cp }}, {{ $sender->ciudad }}</small></p>
        </div>
        <div class="card-body">
  

            <table class="table table-striped table-bordered" data-order='[[ 0, "des" ]]' id="tabla" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>SIASE</th>
                        <th>No. oficio</th>
                        <th>Fecha</th>
                        <th>Asunto</th>
                        <th width="120px">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($correspondences as $correspondences)
                        <tr>
                            <td>{{ $correspondences->id }}</td>
                            
                            <td>{{ $correspondences->noSiase }} </td>
                            <td><p> <small> {{ $correspondences->noOficio }}</small></p></td>
                            <td><p> <small> {{ $correspondences->fechaRecepcion }} </small></p></td>
                            <td class="text-left">{{ $correspondences->body }}</td>
                            <td><a class="btn btn-info" href="#">Show</a></td>
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
