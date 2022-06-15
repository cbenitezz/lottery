<div class="modal fade" id="Modal-evento-{{ $event->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">


    
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
             {!! Form::model($event, ['route' => ['evento.update', $event->id],'method' => 'PUT']) !!}
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Evento #{{$event->id}}: "{{$event->name}}"</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 form-group">
                        {!! Form::text('name', null, ['class'=>'form-control'. ( $errors->has('name') ? ' is-invalid' : '' ),'placeholder'=>'Nombre']) !!}
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-12 form-group">
                        {!! Form::textarea('description', null, ['class'=>'editor form-control'. ( $errors->has('description') ? ' is-invalid' : '' ),'placeholder'=>'Nombre', 'id'=>'editor']) !!}
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-12 form-group">
                        {!! Form::text('date', null, ['class'=>'form-control'. ( $errors->has('name') ? ' is-invalid' : '' ),'placeholder'=>'Nombre', 'disabled'=>'disabled']) !!}
                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-2 form-group">

                        {!! Form::label('publicar','Publicar',['class'=>'form-label']) !!}<i class="icon-pencil" aria-hidden="true"></i>
                        {!! Form::checkbox('publicar', null, $event->publicar, ['class'=>'']) !!}

                    </div>


                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                {!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}

                
                {!! Form::open(['method' => 'DELETE','route' => ['evento.delete', $event->id]]) !!}
                {!! Form::submit('Eliminar', ['class'=>'btn btn-danger active']) !!}
                {!! Form::close() !!}
                
              </div>
            </div>
          </div>


    

  </div>
