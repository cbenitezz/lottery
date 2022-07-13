<!-- start Modal Update Roles -->
<div class="modal fade" id="modal-abono" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header"><!-- start modal header -->

                        <h5 class="modal-title" id="staticModalLabel">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                           Número #</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div><!-- end modal header -->
                    <div class="modal-body"><!-- start modal body -->

                        {!! Form::open(['route' => 'user.store', 'method' => 'POST']) !!}

                            <div class="form-group">
                                {!! Form::label('abono', 'Abono') !!}
                                {!! Form::text('abono', null, ['class'=> 'form-control', 'placeholder'=>'$']) !!}

                                {!! Form::hidden('id') !!}

                                @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror

                            </div>
                        {!! Form::submit('Registrar Usuario', ['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}

                        </div>
                    </div><!-- end modal Body -->
                    <div class="modal-footer">

                    </div>

            </div>
    </div>
</div>
<!-- End Modal Update Roles -->
