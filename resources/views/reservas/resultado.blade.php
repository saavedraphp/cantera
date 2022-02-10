@extends('layouts.app')

@section('content')

 

 

<div class="container">

    <div class="row" >
        <div class="col-md-12" style="text-align: center;">
            <h2>Paso 3</h2>
            <h4>SELECIONE SU RESERVA</h4>
            <h4>Cancha {{$tipo_cancha}}</h4>
        </div>
    </div>
    
    <style>
        .container-listado-horas {
        display: inline-block;
        }

        .table-horarios {
        display: inline-block;
        margin: 50px auto;
        width: auto;
        }
        .table-bordered {
        border: 20px solid #ddd;
        }
        .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 20px;
        }

    </style>

        <div class="row">
 
        @foreach($fechas as $fecha)

        <div class="container-listado-horas">
                <div class="container-title text-center">
                    <h4>{{$fecha['dia']}}</h4>
                    <h4>DIA: {{ date('d/m/Y',strtotime($fecha['fecha']))}} </h4>
                    <h4>Cancha {{$tipo_cancha}}-</h4>
                </div>

             
                <table class="table text-center table-horarios  table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Hora</th>
                            <th>Estado</th>
                        </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>07:00 - 08:00</td>
                                <td><button class="btn " disabled="disabled">bruno</button></td>
                            </tr>
                            
                            <tr>
                                <td>08:00 - 09:00</td>
                                <td><button class="btn btn-success" disabled="disabled">Reservar</button></td>
                            </tr>
                        
                            <tr>
                                <td>09:00 - 10:00</td>
                                <td>
                                    <?php
                                    $url = 'http://127.0.0.1:8080/cancha/reservar/'.$tipo_cancha.'/12-13';
                                    ?>
                                     <a href="{{route('reserva',[$tipo_cancha,$fecha['fecha'],3])}}" title="Reservar" class="btn btn-success">Reservar</a>

                                </td>
                            </tr>                            
                        </tbody>
                    </table>


                
            </div>
            
            @endforeach

 
 
        </div>

</div>


 
 
@endsection                    