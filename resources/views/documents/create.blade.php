@extends('adminlte::page')
@section ('title','Oficio | nuevo')
    <!--usamos select 2 para rrellenar los select -->
    @section('css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    @stop
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Crear Oficio</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('documents.index') }}"> Lista de oficios</a>
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

<form action="{{ route('documents.store') }}" method="POST">
    @csrf
    <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>No. Oficio: </strong>
                    <input readonly type="text" name="noOficio" class="form-control" placeholder="Número de Oficio" value="{{ $no_Oficio }}">
                </div>
            </div>
        
            <!--<label for="example-date-input" class="col-2 col-form-label"></label>-->
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>Fecha:</strong>
                <input type="date" name="fecha" class="form-control" id="example-date-input" value="{{ old('fecha') }}">
                </div>
            </div>
    </div>       
    <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                         <strong>Para quien va dirigido</strong>
                        <select class="form-control" name="sender_id" id="sender">
                            @foreach($senders as $sender)
                                 <option value="{{ $sender->id }}">{{$sender->name}}</option>
                            @endforeach
                        </select>
                    </div> 
                </div>
                <div class="col-md-2">
                    
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <strong> Quien firma:</strong>
                        <select class="form-control" name="office_id" id="office">
                            @foreach($offices as $office)
                                 <option value="{{ $office->id }}">{{$office->name}}</option>
                            @endforeach
                        </select>
                    </div> 
                </div>
            </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Asunto:</strong>
                    <textarea class="form-control" style="height:150px" name="body" placeholder="Asunto" >{{{ old('body') }}}</textarea>
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
        $(document).ready(function() {
            $('#office').select2();
        });


</script>
@endsection