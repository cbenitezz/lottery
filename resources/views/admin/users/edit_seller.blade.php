@extends('layouts.dashboard.app')
@section('title', 'Crear Cliente / Vendedor')

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


    </div>

</div><!-- end view -->
<div class="row">

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">

            <a href="/vendedores" class="btn btn-success active  float-right">
                <i class="fa fa-align-justify"></i> Listar</a>
                <h5 class="card-title mb-0">Editar Vendedor</h5>
                <div class="small text-muted"></div>
        </div>
        <div class="card-body">
            <!-- Credit Card -->
            <div id="pay-invoice">
                <div class="card-body">
                    <div class="card-title">

                    </div>


                    {!! Form::open(['route' => 'user.updateseller', 'method' => 'POST']) !!}


                        <!---->
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    {!! Form::label('name', 'Nombre',['required','classs'=>'control-label mb-1']) !!}
                                    {!! Form::text('name', $vendedor->name, ['required','class'=> 'form-control'. ( $errors->has('name') ? ' is-invalid' : '' )
                                    , 'placeholder'=>'...']) !!}
                                    {{ Form::hidden('rol', 'vendedor') }}
                                    {{ Form::hidden('id', $vendedor->id) }}

                                    @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                               <div class="form-group">
                                    {!! Form::label('apellido', 'Apellido') !!}
                                    {!! Form::text('apellido',  $vendedor->last_name, ['required','class'=> 'form-control'. ( $errors->has('apellido') ? ' is-invalid' : '' )
                                    , 'placeholder'=>'...']) !!}

                                    @error('apellido')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                {!! Form::label('email', 'Email') !!}
                                {!! Form::email('email',  $vendedor->email, ['class'=> 'form-control'. ( $errors->has('email') ? ' is-invalid' : '' )
                                , 'placeholder'=>'cliente@estrategiasmichu.com']) !!}

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                {!! Form::label('identification_card', 'Cédula') !!}
                                {!! Form::text('identification_card',  $vendedor->identification_card, ['disabled','required','class'=> 'form-control'. ( $errors->has('identification_card') ? ' is-invalid' : '' )
                                , 'placeholder'=>'...']) !!}

                                    @error('identification_card')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('direccion', 'Dirección') !!}
                                {!! Form::text('direccion',  $vendedor->address, ['required','class'=> 'form-control'. ( $errors->has('direccion') ? ' is-invalid' : '' )
                                , 'placeholder'=>'...']) !!}

                                    @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {!! Form::label('barrio', 'Barrio') !!}
                                    {!! Form::text('barrio',  $vendedor->sector, ['required','class'=> 'form-control'. ( $errors->has('barrio') ? ' is-invalid' : '' )
                                    , 'placeholder'=>'...']) !!}

                                        @error('barrio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('phone', 'Teléfono Movil') !!}
                                {!! Form::text('phone',  $vendedor->phone, ['required','class'=> 'form-control'. ( $errors->has('phone') ? ' is-invalid' : '' )
                                , 'placeholder'=>'...']) !!}

                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            {!! Form::submit('Actualizar Vendedor', ['class'=>'btn btn-lg btn-info btn-block']) !!}

                        </div>


                     {!! Form::close() !!}


                    </div>
            </div>

        </div>
    </div> <!-- .card -->

</div>
</div>
@endsection
