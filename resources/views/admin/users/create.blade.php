@extends('layouts.dashboard.app')
@section('title', $title)

@section('content')

<div class="row">
    <div class="col-lg-8">

        @if (Session::has('succes'))
            <div class="alert alert-success alert-dismissible  fade show mb-4 mt-4" role="alert">
                <i class="icon-check"></i><a href="#" class="alert-link">{{Session::get('succes')}}</a>

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

        <div class="card">
            <div class="card-header">
                <a href="{{route('user.index')}}" class="btn btn-success active float-right">
                <i class="fa fa-align-justify"></i> Listar Usuarios</a>
                <h5 class="card-title mb-0">Crear Usuarios</h5>
                <div class="small text-muted">Registro</div>

            </div>
            <div class="card-body">
              <div class="row">

                <div class="col-lg-12">

                  {!! Form::open(['route' => 'user.store', 'method' => 'POST']) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Nombre') !!}
                        {!! Form::text('name', null, ['class'=> 'form-control'. ( $errors->has('name') ? ' is-invalid' : '' )
                        , 'placeholder'=>'Ingrese nombre']) !!}

                        @error('name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                        @enderror

                    </div>

                    <div class="form-group">

                      {!! Form::email('email', null, ['class'=> 'form-control'. ( $errors->has('email') ? ' is-invalid' : '' )
                      , 'placeholder'=>'Ingrese email']) !!}

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <div class="alert alert-warning" role="alert">
                            <a href="#" class="alert-link">El usuario registrado tendrá como clave "password" y deberá ser cambiado al inicio de sesión</a>

                          </div>
                    </div>

                    {!! Form::submit('Registrar Usuario', ['class'=>'btn btn-primary']) !!}
                  {!! Form::close() !!}
                </div>

              </div>

            </div>


        </div>



    </div>

</div>
@endsection
