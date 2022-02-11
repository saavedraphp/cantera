<?php

namespace App\Http\Controllers;

use App\ReservasCanchas;
use Illuminate\Http\Request;

class ReservasCanchasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscarFecha($tipo_cancha,$fecha)
    {   

        
        $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");

        $hora_inicio = 7;
        $hora_fin = 24;
        $fecha_inicio = date('Y-m-d', strtotime($fecha));

        $cantidad_dias = 4;

        $fecha = explode("-",$fecha);

        $fecha_fin = date('Y-m-d',mktime(0, 0, 0, $fecha[1]  , ($fecha[0]+$cantidad_dias), $fecha[2]));
        
    
         
        

        for ($i=0; $i < $cantidad_dias; $i++) { 
            $numero_semana = date('w',mktime(0, 0, 0, $fecha[1]  , $fecha[0]+$i, $fecha[2]));
            $array_fechas[$i]['dia']  = $diassemana[$numero_semana];
            $array_fechas[$i]['fecha'] = date('d-m-Y',mktime(0, 0, 0, $fecha[1]  , ($fecha[0]+$i), $fecha[2]));
         }
        
        $reservasCanchas = ReservasCanchas::where('fecha_registro','=',$fecha_inicio);
         
        return view('reservas.resultado',['tipo_cancha' => $tipo_cancha,'fechas' => 
        $array_fechas,'hora_inicio' =>$hora_inicio,'hora_fin' => $hora_fin,
        'reservasCanchas' =>$reservasCanchas]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reservarCancha($tipo_cancha,$fechaReserva,$hora)
    {

        return view('reservas.reserva_cancha',['tipo_cancha' => $tipo_cancha,'fecha' => $fechaReserva, 'hora' => $hora]);

         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReservasCanchas  $reservasCanchas
     * @return \Illuminate\Http\Response
     */
    public function cancha( $cancha_id)
    {
        return view('reservas.calendario');


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReservasCanchas  $reservasCanchas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReservasCanchas $reservasCanchas)
    {
        //
    }

 
}
