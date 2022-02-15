<?php

namespace App\Http\Controllers;

use App\ReservasCanchas;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;



class ReservasCanchasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function buscarFecha($tipo_cancha,$fecha)
    {   
        $cantidad_dias = 4;
        $fecha_aux = $fecha;
        $fecha = explode("-",$fecha);

        $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");

        $fecha_inicio = date('Y-m-d', strtotime($fecha_aux));
        $fecha_fin = date('Y-m-d',mktime(0, 0, 0, $fecha[1]  , ($fecha[0]+$cantidad_dias), $fecha[2]));



        
        $reservasCanchas = ReservasCanchas::whereBetween('fecha_reserva',[$fecha_inicio,$fecha_fin])->get();
        //var_dump($reservasCanchas);
       // dd($reservasCanchas);

        for ($i=0; $i < $cantidad_dias; $i++) { 
            $numero_semana = date('w',mktime(0, 0, 0, $fecha[1]  , $fecha[0]+$i, $fecha[2]));
            $array_fechas[$i]['dia']  = $diassemana[$numero_semana];
            $array_fechas[$i]['fecha'] = date('d-m-Y',mktime(0, 0, 0, $fecha[1]  , ($fecha[0]+$i), $fecha[2]));

            $hora_inicio = 7;
            $hora_fin = 24;
          
            $x =0;
            for($horas=$hora_inicio;$horas<$hora_fin;$horas++)
            {  
              $aux = $horas;
              //echo 'itracion '.$i.' => ';
               $array_fecha_hora[$i][$x]['fecha'] = $array_fechas[$i]['fecha'];
               $array_fecha_hora[$i][$x]['hora_inicio'] = ($horas<10 ? '0'.$horas:$horas) ;
               $array_fecha_hora[$i][$x]['hora_fin'] = (++$aux<10?'0'.$aux:$aux);

               $resultado = "";
            
                if(existeFechaHora($array_fecha_hora[$i][$x]['fecha'],$array_fecha_hora[$i][$x]['hora_inicio'],$reservasCanchas,$resultado) ==true)
                {
                    $array_fecha_hora[$i][$x]['disponible'] = 'FALSE';
                    $array_fecha_hora[$i][$x]['nombre'] = $resultado['nombre'];

                }
                else{
                    $array_fecha_hora[$i][$x]['disponible'] = 'TRUE';


                }
                    
               
               $x++;
              //echo '<br>';

            }  
           

         }
        
        

         
        return view('reservas.resultado',['tipo_cancha' => $tipo_cancha,
        'fechas' =>$array_fechas, 'array_fecha_hora' =>$array_fecha_hora]);

    }










    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reservarCancha($tipo_cancha,$fechaReserva,$hora)
    {   
        DB::enableQueryLog();

        $total_horas = 23;

        $fecha = date('Y-m-d',strtotime($fechaReserva));
        $hora_2 = substr($hora,0,2).':00';

        //echo 'fecha_reserva ='.$fecha.'->where hora_inicio >='.$hora_2;

        $adyacentes = ReservasCanchas::select('hora_inicio')->where('fecha_reserva','=', $fecha)->where('hora_inicio','>',$hora_2)->pluck('hora_inicio')->toArray();
        


 
        //dd(DB::getQueryLog());

        $horas_adyacentes =1;
        //dd($adyacentes);
        $hora_numero =  (int)substr($hora,0,2)+1;
        $i=1;

        for($x=$hora_numero; $x <= $total_horas; $x++)
        {   $cadena = ($x<10?('0'.$x.':00'):($x.':00'));
           // echo $cadena.'<br>';
            if (in_array($cadena, $adyacentes)) 
            {            echo 'existe =>'.$cadena;
   
                break;
            }
            else
                $horas_adyacentes++;


            


        }
/*
        foreach ($adyacentes as $key => $value) {
            echo 'resultado => BD '.(int)$value['hora_inicio'].' >= '.($hora_numero+$i).'<br>';
            
            if((int)$value['hora_inicio'] >= ($hora_numero+$i)) 
                break;
            else
                $horas_adyacentes++;

            $i++;
      
            
        }
*/
 


       // echo 'total =>'.$horas_adyacentes;
        return view('reservas.reserva_cancha',['tipo_cancha' => $tipo_cancha,'fecha' => $fechaReserva, 'hora' => $hora,
    'horas_adyacentes' =>$horas_adyacentes]);

         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $reserva                   = new ReservasCanchas();
        
        $reserva->nombre          = $request->get('nombre');
        $reserva->correo          = $request->get('correo');
        $reserva->telefono          = $request->get('telefono');
        $reserva->dni          = $request->get('dni');
        $reserva->usuario_id          = 5;
        //$reserva->horario_adyacentes          = $request->get('horario_adyacentes');

        $reserva->fecha_reserva          = date('Y-m-d',strtotime($request->get('fecha')));
        $reserva->cancha_id          = $request->get('tipo_cancha');        
        $reserva->hora_inicio          = substr($request->get('hora'),0,2).':00';
        $reserva->hora_fin          = substr($request->get('hora'),3,2).':00';;

        
        $reserva->save();

         return redirect('/')->with('message','La operacion se realizo con Exito')->with('operacion','1');        

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

function existeFechaHora($fecha, $hora ,$data,&$resultado)
{
    $fecha = date('Y-m-d',strtotime($fecha));
    $hora = $hora.':00';

    foreach ($data as $key => $value) {
    //    echo $value['fecha_reserva'].'=='.date('Y-m-d',strtotime($fecha)).' && '.substr($value['hora_inicio'],0,2).'=='.$hora.'<br>';
        if($value['fecha_reserva']==$fecha && $value['hora_inicio']==$hora)
        {   //dd($value);
            $resultado =  $value;
            return true;
        }
    } 
     
     
                     
}