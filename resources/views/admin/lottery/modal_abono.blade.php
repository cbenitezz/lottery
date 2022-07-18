<!-- start Modal Update Roles -->
<div class="modal fade" id="modal-abono" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header"><!-- start modal header -->
                        <h5 class="modal-title" id="staticModalLabel">
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                            RECEPCIÓN DE ABONO
                        </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>

                    </div><!-- end modal header -->
                    <div class="modal-body"><!-- start modal body -->

                        {!! Form::open(['route' => 'user.store', 'method' => 'POST']) !!}

                            <div class="form-group">
                                {!! Form::label('numero', 'Numero de Boleta') !!}
                                {!! Form::text('numero', null, ['class'=> 'form-control', 'placeholder'=>'', 'disabled'=>'disabled']) !!}
                                {!! Form::hidden('id') !!}

                                @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                {!! Form::label('abono', 'Valor Abonar') !!}
                                {!! Form::number('abono', null, [ 'id'=>'abono','min' => '1000', 'max' => '90000','class'=> 'form-control', 'placeholder'=>'$', 'required'=>'require']) !!}


                                @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>
                        {!! Form::submit('Registrar Abono', ['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}

                        </div>
                    </div><!-- end modal Body -->
                    <div class="modal-footer">

                    </div>

            </div>
    </div>
</div>
<!-- End Modal Update Roles -->
