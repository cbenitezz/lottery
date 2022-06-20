@extends('layouts.dashboard.app')
@section('title', 'Crear Cliente')

@section('content')

<div class="row">
    <div class="col-lg-8">
        @if (Session::has('succes'))
            <div class="alert alert-success alert-dismissible  fade show mb-4 mt-4" role="alert">
                <i class="icon-check"></i>
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

        <div class="card">
            <div class="card-header">
                <a href="{{route('user.clientes')}}" class="btn btn-success active  float-right">
                <i class="fa fa-align-justify"></i> Listar Clientes</a>
                <h5 class="card-title mb-0">Crear Cliente</h5>
                <div class="small text-muted"></div>

            </div>
            <div class="card-body">
              <div class="row">

                <div class="col-lg-12">

                  {!! Form::open(['route' => 'user.cliente', 'method' => 'POST']) !!}

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
                        {!! Form::label('apellido', 'Apellido') !!}
                        {!! Form::text('apellido', null, ['class'=> 'form-control'. ( $errors->has('apellido') ? ' is-invalid' : '' )
                        , 'placeholder'=>'Ingrese Apellido']) !!}

                        @error('apellido')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                        @enderror

                    </div>

                    <div class="form-group">
                      {!! Form::label('email', 'Email') !!}
                      {!! Form::email('email', null, ['class'=> 'form-control'. ( $errors->has('email') ? ' is-invalid' : '' )
                      , 'placeholder'=>'Ingrese email']) !!}

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                    {!! Form::label('identification_card', 'Cédula') !!}
                      {!! Form::text('identification_card', null, ['class'=> 'form-control'. ( $errors->has('identification_card') ? ' is-invalid' : '' )
                      , 'placeholder'=>'Ingrese Cédula']) !!}

                        @error('identification_card')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                    {!! Form::label('city', 'Ciudad') !!}
                      {!! Form::text('city', null, ['class'=> 'form-control'. ( $errors->has('city') ? ' is-invalid' : '' )
                      , 'placeholder'=>'Ciudad']) !!}

                        @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                    {!! Form::label('direccion', 'Dirección') !!}
                      {!! Form::text('direccion', null, ['class'=> 'form-control'. ( $errors->has('direccion') ? ' is-invalid' : '' )
                      , 'placeholder'=>'Ingrese Dirección']) !!}

                        @error('direccion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                    {!! Form::label('barrio', 'Barrio') !!}
                      {!! Form::text('barrio', null, ['class'=> 'form-control'. ( $errors->has('barrio') ? ' is-invalid' : '' )
                      , 'placeholder'=>'Ingrese Barrio']) !!}

                        @error('barrio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="form-group">
                    {!! Form::label('phone', 'Teléfono Movil') !!}
                      {!! Form::text('phone', null, ['class'=> 'form-control'. ( $errors->has('phone') ? ' is-invalid' : '' )
                      , 'placeholder'=>'Ingrese Phone']) !!}

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <div class="alert alert-warning" role="alert">
                            El usuario registrado tendrá como clave "password" y deberá ser cambiado al inicio de sesión
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
