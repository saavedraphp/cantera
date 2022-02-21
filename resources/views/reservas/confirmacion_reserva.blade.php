@extends('layouts.app')

@section('content')
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<div class="container">

<ol class="breadcrumb">
        <li><a href="{{url('/')}}">Paso 1</a></li>
        <li><a href="{{route('cancha',$tipo_cancha)}}">Paso 2</a></li>
        <li><a href="{{url('cancha/fecha',[$tipo_cancha,$fecha])}}">Paso 3</a></li>

        <li class="active">Ultimo paso</li>
    </ol>

    <div class="container-title text-center">
        <h2>La Operacion se Realizo con Éxito</h2>
        <h4>RESERVA</h4>
        <h4>DIA: {{$fecha}} </h4>
        <h4>Cancha {{$tipo_cancha}}</h4>
        <h4>Horas: {{$hora1.' - '.$hora2}}</h4>
    </div>

    <div class="row"  >
    <div class="alert alert-success" style="font-size: 20px;">
                    Su reservación fue realizada con exito. Para más información visitar nuestra web <a href="http://futbolplaza.com.pe" style="color: blue;"> http://futbolplaza.com.pe</a>                </div>
    
    </div>
</div>

</div> 

@endsection                    