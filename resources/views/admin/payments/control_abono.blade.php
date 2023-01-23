@extends('layouts.dashboard.app')
@section('title', 'Control de Abonos')

@section('content')

<div class="row">
    <div class="col-lg-12">
        @if (Session::has('succes'))
            <div class="alert alert-success alert-dismissible fade show mb-4 mt-4" role="alert">

                <a href="#" class="alert-link">
                     <i class="icon-check"></i>
                     {{Session::get('succes')}}
                    </a>

                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        @endif
        @if (Session::has('message'))
            <div class="alert alert-danger alert-dismissible fade show mb-4 mt-4" role="alert">
                {{Session::get('message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        @endif

        <div class="card">
            <div class="card-header">

            <a href="{{route('payment.index')}}" class="btn btn-warning  float-right">
            <i class="fa fa-usd"></i> Abonos</a>
            <h5 class="card-title mb-0">CONTROL DE  ABONOS</h5>
            <div class="small text-muted"><i class="fa fa-usd" aria-hidden="true"></i> Editar abonos</div>
            </div>
            <div class="card-body">
              <div class="row">

                <div class="col-lg-12">

                    <br>
                    {!! Form::open(['route' => 'payment.updateAbono', 'method' => 'POST']) !!}
                    <!---->
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                {!! Form::label('sorteo', 'Sorteo',['required','classs'=>'control-label mb-1']) !!}
                                {!! Form::text('sorteo', $ticket->lotteries->name, ['disabled','required','class'=> 'form-control'. ( $errors->has('sorteo') ? ' is-invalid' : '' )
                                , 'placeholder'=>'...']) !!}

                                {{ Form::hidden('id', $ticket->id) }}
                            </div>
                        </div>
                        <div class="col-6">
                           <div class="form-group">
                                {!! Form::label('numero', 'Número') !!}
                                {!! Form::text('numero',  $ticket->number_ticket, ['disabled','required','class'=> 'form-control'. ( $errors->has('numero') ? ' is-invalid' : '' )
                                , 'placeholder'=>'...']) !!}

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                            {!! Form::label('abono', 'Abono') !!}
                            {!! Form::text('abono',  $ticket->paid_ticket, ['class'=> 'form-control'. ( $errors->has('abono') ? ' is-invalid' : '' )
                            , 'placeholder'=>'Digite el abono!']) !!}

                                @error('abono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                            {!! Form::label('cliente', 'Cliente') !!}
                            {!! Form::text('cliente',  $ticket->customers->name , ['disabled','required','class'=> 'form-control'. ( $errors->has('cliente') ? ' is-invalid' : '' )
                            , 'placeholder'=>'...']) !!}

                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('vendedor', 'Vendedor') !!}
                                {!! Form::text('vendedor',  $ticket->user->name, ['disabled','required','class'=> 'form-control'. ( $errors->has('vendedor') ? ' is-invalid' : '' )
                                , 'placeholder'=>'...']) !!}

                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            {!! Form::submit('Actualizar el abono del número: '.$ticket->number_ticket, ['class'=>'btn btn-lg btn-info btn-block']) !!}

                        </div>
                    </div>
                   {!! Form::close() !!}
                </div>

            </div><!-- End Card-body -->

        </div><!-- End Card -->


    </div><!-- col-lg-12 -->



</div><!-- end row -->


@endsection
@push('script')

@endpush

