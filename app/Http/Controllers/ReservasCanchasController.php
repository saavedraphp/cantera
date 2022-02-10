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
    {   $fecha = explode("-",$fecha);
        
        for ($i=0; $i < 4; $i++) { 
            $array_fechas[$i]['dia'] = date('D',mktime(0, 0, 0, $fecha[1]  , $fecha[0]+$i, $fecha[2]));
            $array_fechas[$i]['fecha'] = date('d-m-Y',mktime(0, 0, 0, $fecha[1]  , ($fecha[0]+$i), $fecha[2]));
         }
        
        //$array_fechas[0] = mktime(0, 0, 0, $fecha[0]  , $fecha[1]+1, $fecha[2]);
        
        return view('reservas.resultado',['tipo_cancha' => $tipo_cancha,'fechas' => $array_fechas]);

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
