@extends('layouts.app')

@section('content')

<div class="container">

    <div class="container-title text-center">
        <h2>Ultimo paso</h2>
        <h4>RESERVA</h4>
        <h4>DIA: {{$fecha}} </h4>
        <h4>Cancha {{$tipo_cancha}}</h4>
        <h4>Hora: {{$hora}}</h4>
    </div>

    <div class="row"  >
        
        
        
        <form class="form-reserva form-horizontal col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1" role="form" method="post" action="http://reservas.futbolplaza.com.pe/cancha/reservar/1/10/02/2022/09-10" novalidate="novalidate">

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nombre">Nombre *</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();"> 
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
                        <option values="1">1</option>
                            <option values="2">2</option>
                            <option values="3">3</option>
                            <option values="4">4</option>
                            <option values="5">5</option>
                            <option values="6">6</option>
                            <option values="7">7</option>
                    </select>
                </div>

            </div>

 

            <div class="form-row">
                <button type="submit" class="btn btn-success">Reservar</button>
            </div>

        </form>
    </div>
</div>

</div> 
@endsection                    