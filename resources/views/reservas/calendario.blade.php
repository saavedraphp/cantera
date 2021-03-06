@extends('layouts.app')

@section('content')

 
 
    
   <!-- <link rel="stylesheet" href="http://reservas.futbolplaza.com.pe//public/lib/jquery-ui-1.10.3/themes/base/jquery.ui.all.css">
-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.12.4.js"></script>
  <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

 

<div class="container">

    <ol class="breadcrumb">
        <li><a href="{{url('/')}}">Paso 1</a></li>
        <li class="active">Paso 2</li>
    </ol>

    <div class="row" >
        <div class="col-md-12" style="text-align: center;">
            <h2>Paso 2</h2>
            <h4>SELECIONE EL HORARIO</h4>
            <h4>Cancha 1</h4>
        </div>
    </div>
    <!--
    <div class="row">
        <div data-cancha="2" id="datepicker"></div>
    </div>
-->

        <div class="row">
            <div class="col-md-12"class="container-title text-center">

                <div data-cancha="2" id="datepicker"></div>
            </div>
        </div>

</div>


 

<!-- Include all compiled plugins (below), or include individual files as needed -->
 
<!--<script src="http://reservas.futbolplaza.com.pe//public/lib/jquery-ui-1.10.3/ui/minified/jquery.ui.datepicker.min.js"></script>

-->
 

  
<script>
    $(document).ready(function() {
       
        $("#datepicker").datepicker({
            minDate: new Date(),
            onSelect: function(date) {
                var fecha = date.split('/');
                window.location.href = '{{ env("MY_URL") }}/cancha/fecha' + '/' + $("#datepicker").data('cancha') +
                '/' + fecha[1] +
                '-' + fecha[0] +
                '-' + fecha[2];
            }   
        });

        $(".datepicker").datepicker();
    });

$.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Mi??rcoles', 'Jueves', 'Viernes', 'S??bado'],
 dayNamesShort: ['Dom','Lun','Mar','Mi??','Juv','Vie','S??b'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S??'],
 weekHeader: 'Sm',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);
</script> 
@endsection                    