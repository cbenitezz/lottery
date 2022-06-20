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

</div><!-- end view -->
<div class="row">

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <a href="{{route('user.clientes')}}" class="btn btn-success active  float-right">
                <i class="fa fa-align-justify"></i> Listar Clientes</a>
                <h5 class="card-title mb-0">Crear Cliente / Vendedor</h5>
                <div class="small text-muted"></div>
        </div>
        <div class="card-body">
            <!-- Credit Card -->
            <div id="pay-invoice">
                <div class="card-body">
                    <div class="card-title">

                    </div>

                    <form action="#" method="post" novalidate="novalidate">

                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Payment amount</label>
                            <input id="cc-payment" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="100.00">
                        </div>
                        <div class="form-group has-success">
                            <label for="cc-name" class="control-label mb-1">Name on card</label>
                            <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name">
                            <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="cc-number" class="control-label mb-1">Card number</label>
                            <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number">
                            <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">Expiration</label>
                                    <input id="cc-exp" name="cc-exp" type="tel" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY">
                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Security code</label>
                                <div class="input-group">
                                    <input id="x_card_code" name="x_card_code" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                    <div class="input-group-addon">
                                        <span class="fa fa-question-circle fa-lg" data-toggle="popover" data-container="body" data-html="true" data-title="Security Code" data-content="<div class='text-center one-card'>The 3 digit code on back of the card..<div class='visa-mc-cvc-preview'></div></div>" data-trigger="hover"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">Expiration</label>
                                    <input id="cc-exp" name="cc-exp" type="tel" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY">
                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Security code</label>
                                <div class="input-group">
                                    <input id="x_card_code" name="x_card_code" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                    <div class="input-group-addon">
                                        <span class="fa fa-question-circle fa-lg" data-toggle="popover" data-container="body" data-html="true" data-title="Security Code" data-content="<div class='text-center one-card'>The 3 digit code on back of the card..<div class='visa-mc-cvc-preview'></div></div>" data-trigger="hover"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">Expiration</label>
                                    <input id="cc-exp" name="cc-exp" type="tel" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY">
                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Security code</label>
                                <div class="input-group">
                                    <input id="x_card_code" name="x_card_code" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                    <div class="input-group-addon">
                                        <span class="fa fa-question-circle fa-lg" data-toggle="popover" data-container="body" data-html="true" data-title="Security Code" data-content="<div class='text-center one-card'>The 3 digit code on back of the card..<div class='visa-mc-cvc-preview'></div></div>" data-trigger="hover"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="cc-exp" class="control-label mb-1">Expiration</label>
                                    <input id="cc-exp" name="cc-exp" type="tel" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY">
                                    <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                                </div>
                            </div>
                            <div class="col-6">
                                <label for="x_card_code" class="control-label mb-1">Security code</label>
                                <div class="input-group">
                                    <input id="x_card_code" name="x_card_code" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                                    <div class="input-group-addon">
                                        <span class="fa fa-question-circle fa-lg" data-toggle="popover" data-container="body" data-html="true" data-title="Security Code" data-content="<div class='text-center one-card'>The 3 digit code on back of the card..<div class='visa-mc-cvc-preview'></div></div>" data-trigger="hover"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                <i class="fa fa-user" aria-hidden="true"></i>&nbsp;
                                <span id="payment-button-amount">Registrar</span>
                                <span id="payment-button-sending" style="display:none;">Sending…</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div> <!-- .card -->

</div>
</div>
@endsection
