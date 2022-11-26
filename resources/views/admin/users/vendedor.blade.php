@extends('layouts.dashboard.app')
@section('title', 'Crear Vendedor')

@section('content')

<div class="row">
    <div class="col-lg-12">
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

                <a href="{{route('user.vendedores')}}" class="btn btn-success active btn-sm float-right">
                <i class="fa fa-align-justify"></i> Listar Vendedores</a>
                <h5 class="card-title mb-0">Crear Vendedores</h5>
                <div class="small text-muted">Registro</div>

            </div><!-- card-header -->
            <div class="card-body">
              <div class="row">

                <div class="col-lg-12">

                    {!! Form::open(['route' => 'user.seller', 'method' => 'POST']) !!}


                    <!---->
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('name', 'Nombre',['required','classs'=>'control-label mb-1']) !!}
                                {!! Form::text('name', null, ['required','class'=> 'form-control'. ( $errors->has('name') ? ' is-invalid' : '' )
                                , 'placeholder'=>'...']) !!}
                                {{ Form::hidden('rol', 'vendedor') }}

                                @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div><!--col-6 -->
                        <div class="col-6">
                           <div class="form-group">
                                {!! Form::label('apellido', 'Apellido') !!}
                                {!! Form::text('apellido', null, ['required','class'=> 'form-control'. ( $errors->has('apellido') ? ' is-invalid' : '' )
                                , 'placeholder'=>'...']) !!}

                                @error('apellido')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div><!-- col-6 -->
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::email('email', null, ['class'=> 'form-control'. ( $errors->has('email') ? ' is-invalid' : '' )
                            , 'placeholder'=>'vendedor@estrategiasmichu.com']) !!}

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-6">
                            <div class="form-group">
                            {!! Form::label('identification_card', 'Cédula') !!}
                            {!! Form::text('identification_card', null, ['required','class'=> 'form-control'. ( $errors->has('identification_card') ? ' is-invalid' : '' )
                            , 'placeholder'=>'...']) !!}

                                @error('identification_card')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div><!-- col-6 -->
                    </div>
                    <div class="row">
                        <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('direccion', 'Dirección') !!}
                            {!! Form::text('direccion', null, ['required','class'=> 'form-control'. ( $errors->has('direccion') ? ' is-invalid' : '' )
                            , 'placeholder'=>'...']) !!}

                                @error('direccion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div><!-- col-6-->
                        <div class="col-6">
                                    <div class="form-group">
                                        {!! Form::label('sede', 'Sede') !!}
                                        {!! Form::select('sede', ['Calarca' => 'Calarcá', 'Montenegro' => 'Montenegro','Tebaida'=>'Tebaida'],
                                            null, ['class'=> 'form-control'. ( $errors->has('sede') ? ' is-invalid' : '' )
                                            , 'placeholder'=>'Seleccione la Sede']) !!}

                                                @error('sede')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                    </div>
                            </div><!--col-6 -->
                        </div><!-- row -->

                    <div class="row">
                        <div class="col-6">
                          <div class="form-group">
                            {!! Form::label('phone', 'Teléfono Movil') !!}
                            {!! Form::text('phone', null, ['required','class'=> 'form-control'. ( $errors->has('phone') ? ' is-invalid' : '' )
                            , 'placeholder'=>'...']) !!}

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div><!-- col-6 -->
                    </div><!-- row -->
                    <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                             {!! Form::submit('Registrar Vendedor', ['class'=>'btn btn-lg btn-info btn-block']) !!}
                            </div>
                        </div>
                    </div>

                   {!! Form::close() !!}

                </div><!-- col-lg-12 -->

              </div><!--row -->

            </div><!-- Card-body -->


        </div><!-- card -->



    </div><!-- class= col-lg-12 -->

</div><!-- row -->
@endsection
