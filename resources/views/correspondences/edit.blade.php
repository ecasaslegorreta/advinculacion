@extends('adminlte::page')
@section ('title','Correspondencia | Actualizar')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Actualiza dotos de Correspondencia</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('correspondences.index') }}"> Regresa a Correspondencia</a>
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
    <br>

    <form action="{{ route('correspondences.update',$correspondence->id) }}" method="POST">
    @csrf
    @method('PUT')    
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <h2>Remitente</h2>
                        <select class="form-control" name="sender_id" id="">
                        <option  value="{{ $senderr->id }}">{{ $senderr->name }}</option>
                            @foreach($senders as $sender)
                                <option value="{{ $sender->id }}">{{$sender->name}}</option>
                            @endforeach                        
                                                
                            
                        </select>
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong> No. de SIASE: </strong>
                        <input type="text" name="noSiase" class="form-control" placeholder="No. de SIASE" value="{{ $correspondence->noSiase }}" >
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>No. Oficio: </strong>
                        <input type="text" name="noOficio" class="form-control" placeholder="Número de Oficio" value="{{ $correspondence->noOficio }}">
                    </div>
                </div>
            
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>Fecha de recepción</strong>
                    <input type="date" name="fechaRecepcion" class="form-control" id="example-date-input" value="{{ $correspondence->fechaRecepcion}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group shadow-textarea">
                    <div class="form-group green-border-focus ">
                        <label for="body">Asunto:</label>
                        <textarea class="form-control z-depth-1" name="body" id="body" rows="8">{{$correspondence->body}}</textarea>
                    </div>
                </div>
            </div>
        </div>   
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar Formuario</button>
        </div>
    </form>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sender').select2();
        });
    </script>
@endsection