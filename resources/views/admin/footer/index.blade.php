@extends('layouts.admin')
@section('title', 'Actualizar Pie de Página')

@section('content')

    <div class="row">
        <div class="col-lg-8">
            @if (Session::has('succes'))
                <div class="alert alert-success alert-dismissible fade show mb-4 mt-4" role="alert">
                    <i class="fa fa-check-circle-o" aria-hidden="true"></i>
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
                    <h5 class="card-title mb-0"> Pie de Página </h5>
                    <div class="small text-muted">Actualizar Footer</div>
                </div>
                <div class="card-body">
                {!! Form::model($footer, ['route' => ['footer.update', $footer->id],'method' => 'PUT','enctype'=>'multipart/form-data']) !!}
                  <div class="row">

                    <div class="col-lg-4 form-group">
                      {!! Form::label('direccion','Dirección',['class'=>'form-label']) !!}
                      {!! Form::text('address', null, ['class'=>'form-control'. ( $errors->has('address') ? ' is-invalid' : '' )]) !!}
                      @error('address')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                      @enderror
                    </div>
                    <div class="col-lg-4 form-group">
                        {!! Form::label('phone','Teléfono',['class'=>'form-label']) !!}
                        {!! Form::text('phone', null, ['class'=>'form-control'. ( $errors->has('phone') ? ' is-invalid' : '' )]) !!}
                        @error('phone')
                                   <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                        @enderror
                    </div>
                    <div class="col-lg-4 form-group">
                        {!! Form::label('email','Correo Institucional',['class'=>'form-label']) !!}
                        {!! Form::text('email', null, ['class'=>'form-control'. ( $errors->has('email') ? ' is-invalid' : '' )]) !!}
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <!-- Segundo Bloque -->
                      <div class="col-lg-4 form-group">
                        {!! Form::label('email2','Correo Notificaciones Judiciales',['class'=>'form-label']) !!}
                        {!! Form::text('email2', null, ['class'=>'form-control'. ( $errors->has('email2') ? ' is-invalid' : '' )]) !!}
                        @error('email2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="col-lg-4 form-group">
                        {!! Form::label('instagram','Instagram',['class'=>'form-label']) !!}
                        {!! Form::text('instagram', null, ['class'=>'form-control'. ( $errors->has('instagram') ? ' is-invalid' : '' )]) !!}
                        @error('instagram')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="col-lg-4 form-group">
                        {!! Form::label('facebook','Facebook',['class'=>'form-label']) !!}
                        {!! Form::text('facebook', null, ['class'=>'form-control'. ( $errors->has('facebook') ? ' is-invalid' : '' )]) !!}
                        @error('facebook')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <!-- tercer Bloque -->
                      <div class="col-lg-4 form-group">
                        {!! Form::label('schedule','Horario',['class'=>'form-label']) !!}
                        {!! Form::text('schedule', null, ['class'=>'form-control'. ( $errors->has('schedule') ? ' is-invalid' : '' )]) !!}
                        @error('schedule')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="col-lg-4 form-group">
                        {!! Form::label('copyright','Copyright',['class'=>'form-label']) !!}
                        {!! Form::text('copyright', null, ['class'=>'form-control'. ( $errors->has('copyright') ? ' is-invalid' : '' )]) !!}
                        @error('copyright')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="col-lg-4 mb-3 form-group">
                        {!! Form::label('Color de Texto', null, ['class'=>'form-label']) !!}
                        {!! Form::text('color',null, ['class'=>'form-control','data-jscolor'=>'{}']) !!}
                      </div>

                       <div class="col-lg-12 mb-3 form-group">
                        {!! Form::label('Color de Fondo', null, ['class'=>'form-label']) !!}
                        {!! Form::text('background',null, ['class'=>'form-control', 'data-jscolor'=>'{}']) !!}
                       </div>


                  </div>

                </div>
                <div class="card-footer">

                    {!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>

            </div>



        </div>

    </div>

@endsection

@push('script')

{!! Html::script('js/jscolor.min.js', array('type' => 'text/javascript')) !!}

@endpush
