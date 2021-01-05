@extends('adminlte::page')
@section ('title','Turnos | nuevo')

    <!--usamos select 2 para rrellenar los select -->
    @section('css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    @stop

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Crear turno</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('shifteds.index') }}"> Regresa a turnos</a>
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
<div class="card text-center">
    <div class="card-header">
        <p class="card-text">{{ $correspondence->sender->name }}</p>
        <p class="card-text"><small> {{ $correspondence->fechaRecepcion }} / {{ $correspondence->noSiase }} / {{ $correspondence->noOficio }}</small></p>
        <p class="card-text text-left"><small> {{ $correspondence->body }}</small></p>

    </div>
</div>
<form action="{{ route('shifteds.store') }}" method="POST">
    @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <strong> Para:</strong>
                        <select class="form-control" name="sender_id" id="sender">
                            @foreach($senders as $sender)
                                 <option value="{{ $sender->id }}">{{$sender->name}}</option>
                            @endforeach
                        </select>
                    </div> 
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <strong> Indicación:</strong>
                        <select class="form-control" name="position_id" id="position">
                            @foreach($positions as $position)
                                 <option value="{{ $position->id }}">{{$position->name}}</option>
                            @endforeach
                        </select>
                    </div> 
                </div>
            
         
                <!--<label for="example-date-input" class="col-2 col-form-label"></label>-->
                <div class="col-xs-2 col-sm-2 col-md-2">
                    <div class="form-group">
                        <strong>Fecha de turno</strong>
                    <input type="date" name="fechaTurno" class="form-control" id="example-date-input" value="{{ old('fechaTurno') }}">
                    </div>
                </div>
            </div>

 
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Turno:</strong>
                    <textarea class="form-control" style="height:150px" name="bodyTurno" placeholder="Propuesta de oficio" >
                        {{{ old('bodyTurno') }}}
                    </textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Observaciónes:</strong>
                    <textarea class="form-control" style="height:80px" name="observacion" placeholder="Oservaciones" value="{{ old('observacion') }}"></textarea>
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
            $('#correspondence').select2();
        });
        $(document).ready(function() {
            $('#sender').select2();
        });
        $(document).ready(function() {
            $('#position').select2();
        });
</script>
@endsection