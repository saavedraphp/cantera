@extends('layouts.app')

@section('content')
<?php
 

?>


 <?php
//dd($reservasCanchas);
 ?>

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
        <?php
        foreach($array_fecha_hora as  $key => $value)
        {  
        ?>                    
                             

        <div class="container-listado-horas">
                <div class="container-title text-center">
                    <h4>{{$fechas[$key]['dia']}}</h4>
                    <h4>DIA: {{ date('d/m/Y',strtotime($fechas[$key]['fecha']))}} </h4>
                    <h4>Cancha {{$tipo_cancha}}</h4>
                </div>

             
                <table class="table text-center table-horarios  table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Hora</th>
                            <th>Estado</th>
                        </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                          //  var_dump($array_fecha_hora);
   
                                for ($i=0; $i < count($value); $i++) { 
                                    $hora_texto = $value[$i]['hora_inicio'].':00 - '.$value[$i]['hora_fin'].':00';
                                    
                                ?>
                                    @if($value[$i]['disponible'] == 'TRUE')

                                    <tr>
                                        <td>{{$hora_texto}}</td>
                                        <td>
                                            <?php
                                            $url = 'http://127.0.0.1:8080/cancha/reservar/'.$tipo_cancha.'/12-13';
                                            ?>
                                            <a href="{{route('reserva',[$tipo_cancha,$value[$i]['fecha'],$value[$i]['hora_inicio'].'-'.$value[$i]['hora_fin']])}}" title="Reservar" class="btn btn-success">Reservar</a>

                                        </td>
                                    </tr>  

                                    @else
                                    <tr>
                                        <td>{{$hora_texto}}</td>
                                        <td title="{{$value[$i]['nombre']}}"><button class="btn " disabled="disabled">{{substr($value[$i]['nombre'],0,10)}}</button></td>
                                    </tr>
                                    @endif
                
                                
                                    
                               
                               <?php
                                }
                                
                  
                        ?>
                            
                          
                        </tbody>


                    </table>


                
            </div>
            
          <?php
            }
          ?>

 
 
        </div>

</div>


 
 
@endsection                    