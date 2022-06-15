@extends('layouts.admin')
@section('title', 'TutziCMS')

@section('content')

<div class="row">


<div class="container">
    <div style="height:50px"></div>
    <h1>< tutofox /> <small>Oh my code!</small></h1>
    <p class="lead">
    <h3>Evento</h3>
    <p>Detalles de evento</p>
    <a class="btn btn-default"  href="{{ asset('/evento/index') }}">Atras</a>
    <hr>



    <div class="col-md-6">
      <form action="{{ asset('/evento/create/') }}" method="post">
        <div class="fomr-group">
          <h4>Titulo</h4>
          {{ $event->name }}
        </div>
        <div class="fomr-group">
          <h4>Descripcion del Evento</h4>
          {{ $event->description }}
        </div>
        <div class="fomr-group">
          <h4>Fecha</h4>
          {{ $event->date }}
        </div>
        <br>
        <input type="submit" class="btn btn-info" value="Guardar">
      </form>
    </div>


    <!-- inicio de semana -->


  </div> <!-- /container -->

</div>

@endsection

@push('style')
<style>
    body{
      font-family: 'Exo', sans-serif;
    }
    .header-col{
      background: #E3E9E5;
      color:#536170;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
    }
    .header-calendar{
      background: #EE192D;color:white;
    }
    .box-day{
      border:1px solid #E3E9E5;
      height:150px;
    }
    .box-dayoff{
      border:1px solid #E3E9E5;
      height:150px;
      background-color: #ccd1ce;
    }
    </style>
@endpush
