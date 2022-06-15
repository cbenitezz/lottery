@extends('layouts.admin')
@section('title', 'TutziCMS')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            @if (Session::has('succes'))
                <div class="alert alert-success alert-dismissible fade show mb-4 mt-4" role="alert">
                    {{Session::get('succes')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4 mt-4" role="alert">
                    {{Session::get('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
            @endif    
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                <h4>Configuración General</h4>
                </div>
                <div class="card-body">
                {!! Form::model($config_general, ['route' => ['general.update', $config_general->id],'method' => 'PUT','enctype'=>'multipart/form-data']) !!}
                  <div class="row">
                    
                    <div class="col-lg-4 form-group">
                      {!! Form::label('titulo','Titulo',['class'=>'form-label']) !!}
                      {!! Form::text('title', null, ['class'=>'form-control'. ( $errors->has('title') ? ' is-invalid' : '' )]) !!}
                      @error('title')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                      @enderror
                    </div>
                    <div class="col-lg-4 form-group">
                        {!! Form::label('font','Tipo de Letra',['class'=>'form-label']) !!}
                        {!! Form::select('font', $fonts, $config_general->font, ['id'=>'font', 'class'=>'form-control'])!!}
                        
                    </div>
                    <div class="col-lg-4 form-group">
                        {!! Form::label('size','Tamaño',['class'=>'form-label']) !!}
                        {!! Form::select('size', $size, $config_general->size, ['id'=>'size', 'class'=>'form-control']) !!}
                    </div>
                    <div class="col-lg-4 form-group">
                        {!! Form::label('logo','Logo',['class'=>'form-label']) !!}
                        {!! Form::file('logo', ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-lg-4 form-group">
                        {!! Form::label('background','Background',['class'=>'form-label']) !!}
                        {!! Form::file('background', ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-lg-4 form-group">
                        {!! Form::label('favicon','Favicon',['class'=>'form-label']) !!}
                        {!! Form::file('favicon', ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-lg-12 form-group">
                      {!! Form::label('mapa','Mapa',['class'=>'form-label']) !!}
                      {!! Form::textarea('map', null, ['class'=>'form-control'. ( $errors->has('map') ? ' is-invalid' : '' )]) !!}
                      @error('map')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                    </div>

                    
                  </div>
                  
                </div>
                <div class="card-footer">

                    {!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            
            </div>


            
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4>Imágenes Actuales</h4>
                    </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-lg-12">
                            {!! Form::label('logo','Logo') !!}
                            <center>
                            <img src="{{ asset('imgConfigGeneral/'.$config_general->logo)}}" style="width: 80px">
                            </center>    
                        </div>
                        <div class="col-lg-12">
                            {!! Form::label('fondo','Background') !!}
                            <center>
                            <img src="{{ asset('imgConfigGeneral/'.$config_general->background_principal)}}" style="width: 80px">
                           </center>
                        </div>
                        <div class="col-lg-12">
                            {!! Form::label('favicon','Favicon') !!}
                            <center>
                            <img src="{{ asset('imgConfigGeneral/'.$config_general->favicon)}}" style="width: 80px">
                           </center>
                        </div>

                    </div>
                </div>
            </div>
            
        </div>
    </div>

@endsection