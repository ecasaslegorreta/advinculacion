@extends('adminlte::page')
@section ('title','Remitente | nuevo')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Crear nueva correspondencia</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('correspondences.index') }}"> Regresa a remitentes</a>
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

<form action="{{ route('correspondences.store') }}" method="POST">
    @csrf
   <br>

            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <h2>Remitente</h2>
                        <select class="form-control" name="sender_id" id="sender">
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
                        <input type="text" name="noSiase" class="form-control" placeholder="No. de SIASE" value="{{ old('noSiase') }}" >
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>No. Oficio: </strong>
                        <input type="text" name="noOficio" class="form-control" placeholder="Número de Oficio" value="{{ old('noOficio') }}">
                    </div>
                </div>
            
                <!--<label for="example-date-input" class="col-2 col-form-label"></label>-->
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>Fecha de recepción</strong>
                    <input type="date" name="fechaRecepcion" class="form-control" id="example-date-input" value="{{ old('fechaRecepcion') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Asunto:</strong>
                    <textarea class="form-control" style="height:150px" name="body" placeholder="Asunto" value="{{ old('body') }}"></textarea>
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