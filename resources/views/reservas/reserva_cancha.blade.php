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
        <h2>Ultimo paso</h2>
        <h4>RESERVA</h4>
        <h4>DIA: {{$fecha}} </h4>
        <h4>Cancha {{$tipo_cancha}}</h4>
        <h4>Hora: {{$hora}}</h4>
    </div>

    <div class="row"  >
        
        
         

        <form action="/cancha/reservar" method="POST" id="frm_formulario" >
        @csrf

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nombre">Nombre *</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"> 
                    
                    <input type="hidden" id="fecha" name="fecha" value="{{$fecha}}"> 
                    <input type="hidden" id="tipo_cancha" name="tipo_cancha" value="{{$tipo_cancha}}"> 
                    <input type="hidden" id="hora" name="hora" value="{{$hora}}"> 
                    
                </div>
            
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="correo">Correo *</label>
                    <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"> 
                </div>
            
            </div>
 
 
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="telefono">Teléfono *</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"> 
                </div>
            
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="dni">Dni *</label>
                    <input type="text" class="form-control" id="dni" name="dni" placeholder="Dni" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"> 
                </div>
            
            </div>

            <div class="form-row">
                <label for="cantidad_horas" >Cantidad de horas *</label>

                <div class="col-sm-12">
                    <select class="form-control" id="horario_adyacentes" name="horario_adyacentes" value="">
                    @for($x = 1;$x<=$horas_adyacentes;$x++)
                        <option values="{{$x}}">{{$x}}</option>
                    @endfor
                    </select>
                </div>
                <p>
            </div>

 

            <div class="form-row">
               
                <button type="submit" class="btn btn-success">Reservar</button>
            </div>

        </form>
    </div>
</div>

</div> 

@endsection                    