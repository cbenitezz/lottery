<!-- start Modal Update Roles -->
<div class="modal fade" id="modal-edit-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header"><!-- start modal header -->

                        <h5 class="modal-title" id="staticModalLabel">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            Editar :{{$item->profile->name}} | {{$item->profile->identification_card}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div><!-- end modal header -->
                    <div class="modal-body"><!-- start modal body -->

                        {!! Form::model($item->profile, ['route'=>['customer.update',$item->profile->id], 'method'=>'put' ]) !!}
                        <div class="row">
                            <div  class="col-lg-6"><!-- Col1 -->
                                {!! Form::hidden('title', $item->getRoleNames()) !!}
                                {!! Form::hidden('id', $item->profile->id) !!}

                                <div class="form-group">

                                        {!! Form::label('name', 'Nombre', ['style'=>"float:left; margin-left:10px"]) !!}
                                        {!! Form::text('name', null, ['class'=> 'form-control'. ( $errors->has('name') ? ' is-invalid' : '' )
                                        , 'placeholder'=>'...','required'=>'required', 'maxlength'=>80]) !!}

                                        @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                </div>
                                <div class="form-group">

                                        {!! Form::label('sede', 'Sede', ['style'=>"float:left; margin-left:10px"]) !!}
                                        {!! Form::select('sede', ['Calarca' => 'Calarcá', 'Montenegro' => 'Montenegro','Tebaida'=>'Tebaida'],
                                         'Tebaida', ['class'=> 'form-control'. ( $errors->has('sede') ? ' is-invalid' : '' )]) !!}

                                        @error('sede')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                </div>
                                <div class="form-group">
                                        {!! Form::label('sector', 'Barrio', ['style'=>"float:left; margin-left:10px"]) !!}
                                        {!! Form::text('sector', null, ['class'=> 'form-control'. ( $errors->has('sector') ? ' is-invalid' : '' )
                                        , 'placeholder'=>'...','required'=>'required', 'maxlength'=>50]) !!}

                                        @error('sector')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                </div>
                            </div>
                            <div  class="col-lg-6"><!-- Col2 -->


                                <div class="form-group">

                                        {!! Form::label('last_name', 'Apellido', ['style'=>"float:left; margin-left:10px"]) !!}
                                        {!! Form::text('last_name', null, ['class'=> 'form-control'. ( $errors->has('last_name') ? ' is-invalid' : '' )
                                        , 'placeholder'=>'...','required'=>'required', 'maxlength'=>80]) !!}



                                        @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror

                                </div>
                                <div class="form-group">

                                        {!! Form::label('address', 'Dirección', ['style'=>"float:left; margin-left:10px"]) !!}
                                        {!! Form::text('address', null, ['class'=> 'form-control'. ( $errors->has('address') ? ' is-invalid' : '' )
                                        , 'placeholder'=>'...','required'=>'required', 'maxlength'=>80]) !!}

                                        @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror

                                </div>
                                <div class="form-group">

                                        {!! Form::label('phone', 'Teléfono Movil', ['style'=>"float:left; margin-left:10px"]) !!}
                                        {!! Form::number('phone', null, ['class'=> 'form-control'. ( $errors->has('phone') ? ' is-invalid' : '' )
                                        , 'placeholder'=>'...','required'=>'required', 'maxlength'=>15]) !!}

                                        @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror

                                </div>
                                <div class="form-group">

                                    {!! Form::label('pass', 'Contraseña', ['style'=>"float:left; margin-left:10px"]) !!}
                                    {!! Form::password('password',['placeholder'=>'Password','class'=>'form-control'. ( $errors->has('password') ? ' is-invalid' : '' )
                                    ,'required'=>'required', 'maxlength'=>10]) !!}
                                    @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror

                            </div>

                            </div>
                            <div  class="col-lg-6">
                                <div class="form-group">
                                 {!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>

                        {!! Form::close() !!}
                        </div>
                    </div><!-- end modal Body -->
                    <div class="modal-footer">

                    </div>

            </div>
    </div>
</div>
<!-- End Modal Update Roles -->
