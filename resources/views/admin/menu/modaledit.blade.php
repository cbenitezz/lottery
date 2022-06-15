<div class="modal fade" id="modaledit-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">


    {!! Form::model($item, ['route' => ['link', $item->id],'method' => 'PUT']) !!}
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Opción: "{{$item->name}}"</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 form-group">
                        {!! Form::text('name', null, ['class'=>'form-control'. ( $errors->has('name') ? ' is-invalid' : '' ),'placeholder'=>'Nombre']) !!}
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-12 form-group">
                        <i class="icon-link" aria-hidden="true"></i>
                        {!! Html::decode(Form::label('asignar', 'Asignar Opción', ['class' => 'text-muted'])) !!}
                        {!! Form::select('url', $onlyMenu,null, ['id' => 'url', 'class'=>'form-control']) !!}

                    </div>

                    <div class="col-lg-2 form-group">

                        {!! Form::label('publicar','Publicar',['class'=>'form-label']) !!}<i class="icon-pencil" aria-hidden="true"></i>
                        {!! Form::checkbox('publicar', $item->enable, true, ['class'=>'']) !!}

                    </div>


                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                {!! Form::hidden('config_menu', $config_menu->id) !!}
                {!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}

              </div>
            </div>
          </div>


    {!! Form::close() !!}
  </div>
