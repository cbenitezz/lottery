@extends('layouts.admin')
@section('title', 'TutziCMS')

@section('content')

    <div class="row">
        <div class="col-lg-6">

            <form action="{{route('update.template',$template->id)}}" method="post" role="form" enctype="multipart/form-data">
             {{ csrf_field() }}
              <div class="card">
                <div class="card-header">
                <h4>Actualizar Plantillas</h4>
                </div>
                <div class="card-body">
                  <div class="row">

                    {!! Form::open(['route'=>'menu.store','method'=>'post']) !!}
                    <div class="row">
                        <div class="col-lg-12 form-group">
                            {!! Form::text('title_item', null, ['class'=>'form-control'. ( $errors->has('title_item') ? ' is-invalid' : '' ),'placeholder'=>'Titulo']) !!}
                            @error('title_item')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-5 form-group">
                            {!! Form::text('link', null, ['class'=>'form-control'. ( $errors->has('link') ? ' is-invalid' : '' ),'placeholder'=>'Enlace']) !!}
                            @error('link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-5 form-group">
                            {!! Form::text('icon', null, ['class'=>'form-control'. ( $errors->has('icon') ? ' is-invalid' : '' ),'placeholder'=>'Icono']) !!}
                            @error('icon')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-2 form-group">

                            {!! Form::hidden('config_menu', $config_menu->id) !!}
                            {!! Form::submit('Actualizar', ['class'=>'btn btn-primary btn-block']) !!}
                        </div>
                    </div>
                  {!! Form::close() !!}


                  </div>
                  
                </div>
                <div class="card-header">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <a class="btn btn-primary" href="/admin/templates" role="button">Regresar</a>
                </div>
             </div>
            </form>

            
        </div>

    </div>

@endsection
