<!-- start Modal Update Roles -->
<div class="modal fade" id="modal-rol-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
    <!-- Editar Rol -->


        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                    Editar Rol: {{$item->name}}</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::model($item, ['route'=>['roles.update',$item], 'method'=>'put' ]) !!}

                <div class="row">
                <div class="col-lg-12">
                <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder='Digite nuevo Rol' name='name' value="{{$item->name}}">
                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                @enderror

                </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <hr>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    {!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
                    </div>
                </div>

                {!! Form::close() !!}
            </div>
            <div class="modal-footer">

            </div>
            </div>
        </div>

</div>
