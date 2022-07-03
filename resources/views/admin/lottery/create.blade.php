@extends('layouts.dashboard.app')
@section('title', $title)

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

            <a href="{{route('lottery.index')}}" class="btn btn-success active  float-right">
                <i class="fa fa-align-justify"></i> Listar </a>
                <h5 class="card-title mb-0">FORMULARIO DE CREACIÓN DE RIFA</h5>
                <div class="small text-muted"></div>
        </div>
        <div class="card-body">
            <!-- Credit Card -->
            <div id="pay-invoice">
                <div class="card-body">
                    <div class="card-title">

                    </div>


                    {!! Form::open(['route' => 'lottery.store', 'method' => 'POST']) !!}


                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    {!! Form::label('eslogan', 'Slogan',['classs'=>'control-label mb-1']) !!}
                                    {!! Form::text('eslogan', null, ['class'=> 'form-control'. ( $errors->has('eslogan') ? ' is-invalid' : '' )
                                    , 'placeholder'=>'...']) !!}


                                    @error('eslogan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                               <div class="form-group">
                                    {!! Form::label('nit', 'NIT') !!}
                                    {!! Form::number('nit', null, ['class'=> 'form-control'. ( $errors->has('nit') ? ' is-invalid' : '' )
                                    , 'placeholder'=>'...']) !!}

                                    @error('nit')
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
                                {!! Form::label('name', 'Nombre') !!}
                                {!! Form::text('name', null, ['class'=> 'form-control'. ( $errors->has('name') ? ' is-invalid' : '' )
                                , 'placeholder'=>'...']) !!}

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                {!! Form::label('representative', 'Representante') !!}
                                {!! Form::text('representative', null, ['class'=> 'form-control'. ( $errors->has('representative') ? ' is-invalid' : '' )
                                , 'placeholder'=>'...']) !!}

                                    @error('representative')
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
                                    {!! Form::label('address', 'Dirección') !!}
                                    {!! Form::text('address', null, ['class'=> 'form-control'. ( $errors->has('address') ? ' is-invalid' : '' )
                                    , 'placeholder'=>'...']) !!}

                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    {!! Form::label('city', 'Ciudad') !!}
                                    {!! Form::text('city', null, ['class'=> 'form-control'. ( $errors->has('city') ? ' is-invalid' : '' )
                                    , 'placeholder'=>'...']) !!}

                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('date_start', 'Fecha de Inicio') !!}
                                {!! Form::date('date_start', null, ['class'=> 'form-control'. ( $errors->has('date_start') ? ' is-invalid' : '' )
                                , 'placeholder'=>'...']) !!}

                                    @error('date_start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('date_end', 'Fecha Final') !!}
                                {!! Form::date('date_end', null, ['class'=> 'form-control'. ( $errors->has('date_end') ? ' is-invalid' : '' )
                                , 'placeholder'=>'...']) !!}

                                    @error('date_end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                            <div class="form-group">
                                {!! Form::label('ticket_value', 'Valor de la Boleta') !!}
                                {!! Form::text('ticket_value', null, ['class'=> 'form-control'. ( $errors->has('ticket_value') ? ' is-invalid' : '' )
                                , 'placeholder'=>'...']) !!}

                                    @error('ticket_value')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    {!! Form::label('commission_sale', 'Comisión por Venta') !!}
                                    {!! Form::text('commission_sale', null, ['class'=> 'form-control'. ( $errors->has('commission_sale') ? ' is-invalid' : '' )
                                    , 'placeholder'=>'...']) !!}

                                        @error('commission_sale')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            <div class="col-3">
                            <div class="form-group">
                                {!! Form::label('lottery', 'Loteria') !!}
                                {!! Form::text('lottery', null, ['class'=> 'form-control'. ( $errors->has('lottery') ? ' is-invalid' : '' )
                                , 'placeholder'=>'...']) !!}

                                    @error('lottery')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    {!! Form::label('boletas', 'Número de Boletas') !!}
                                    {!! Form::select('boletas', ['500' => '500', '1000' => '1.000','10000'=>'10.000'],null, ['class'=> 'form-control'. ( $errors->has('boletas') ? ' is-invalid' : '' )
                                    , 'placeholder'=>'Seleccione la Cantidad']) !!}

                                        @error('boletas')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                        </div>
                        <div>
                            {!! Form::submit('Registrar '.$title, ['class'=>'btn btn-lg btn-info btn-block']) !!}

                        </div>


                     {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div> <!-- .card -->

</div>
</div><!-- End -->


@endsection
@push('script')


@endpush
