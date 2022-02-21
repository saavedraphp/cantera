@extends('layouts.app')

@section('content')
<div class="container">

  @if(Session::get('operacion')=='1')
  <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
  </div>
  @endif

  @if(Session::get('operacion')=='0')
  <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{Session::get('message')}}
  </div>

  @endif


  <ol class="breadcrumb">
    <li class="active">Paso 1</li>
</ol>


  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">

        <div class="card-header">SELECIONE LA CANCHA A RESERVAR</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif


          <!--inicio canchas -->
          <div class="row mb-2">
            <div class="col-md-6">
              <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong>Cancha fulbilo </strong>
                  <h3 class="mb-0">Caracteristicas</h3>
                  <div class="mb-1 text-muted">Capacidad para 14 Jugadores</div>
                  <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{route('cancha',1)}}" title="Reservar" class="stretched-link">Reservar</a>

                </div>
                <div class="col-auto d-none d-lg-block">
                  <img src="{{ asset('img/cancha_14.jpg') }}" width="200" height="250" alt="Capacidad para 14 Jugadores">


                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                  <strong>Cancha fulbol</strong>
                  <h3 class="mb-0">Caracteristicas</h3>
                  <div class="mb-1 text-muted">Capacidad para 22 Jugadores</div>
                  <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                  <a href="{{route('cancha',2)}}" title="Reservar" class="stretched-link">Reservar</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                  <img src="{{ asset('img/cancha_22.jpg') }}" width="200" height="250" alt="Capacidad para 14 Jugadores">

                </div>
              </div>
            </div>
          </div>
          <!--fin canchas-->



        </div>
      </div>
    </div>
  </div>
</div>
@endsection