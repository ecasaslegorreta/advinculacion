@extends('adminlte::page')

@section ('title','Remitentes')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
                <h1>Remitentes</h1>
        </div>
        <div class="pull-right">
                <a class="btn btn-success" href="{{ route('senders.create') }}"> Crear Nueva Remitente</a>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered" data-order='[[ 0, "des" ]]' id="tabla" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre/Cargo</th>
                        <th>Telefono</th>
                        <th>Celular</th>
                        <th>Email</th>
                        <th width="140px">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($senders as $sender)
                        <tr>
                            <td>{{ $sender->id }}</td>
                            <td>{{ $sender->name }} <p> <small> {{ $sender->cargo }}, {{ $sender->area }} </small></p> </td>
                            <td>{{ $sender->telefono }}</td>
                            <td>{{ $sender->celular }}</td>
                            <td>{{ $sender->email }}</td>
                            <td>
                                <form action="{{ route('senders.destroy',$sender->id) }}" method="POST" class="formulario-eliminar">
                
                                    <a class="btn btn-info" href="{{ route('senders.show',$sender->id) }}">Show</a>
                    
                                    <a class="btn btn-primary" href="{{ route('senders.edit',$sender->id) }}"><i class="far fa-edit"></i></a>
                
                                    @csrf
                                    @method('DELETE')
                    
                                    <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
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

    @if (session('opcion')=='si')

        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'El registro se guardo con éxito.',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    
    @if (session('opcion')=='up')

        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'El registro se actulizo con éxito.',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    @if (session('opcion')=='de')
 
        <script>
             Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'El registro se elimino con éxito.',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif

    <script>
        
        $('.formulario-eliminar').submit(function(e){
            e.preventDefault();
            Swal.fire({
            title: 'Estás seguro?',
            text: "Este registro se eliminará permanente mente!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar!',
            cancelButtonText: 'Cancelar!'
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })

        });
     
    </script>
@endsection
