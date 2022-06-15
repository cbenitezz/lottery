<div class="modal fade" id="modalsubmenu-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">


     {!! Form::open(['route'=>'submenu','method'=>'post']) !!}
     {!! Form::hidden('totalSubmenu', $totalItemSubmenu) !!}

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Submenu de: {!! $item->name !!}  </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>

              </div>
              <div class="modal-body">
                <div class="row">

                    @if (!$submenu->isEmpty())
                   <div class="col-lg-12 form-group">
                        <label for="">Opciones actuales</label>
                        {!! Form::select('parent', $submenu ,null,['id'=>'parent', 'class'=>'form-control']) !!}

                   </div>

                    @else
                      {!! Form::hidden('parent', $item->id) !!}
                    @endif

                    <div class="col-lg-12 form-group">
                      <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                      {!! Form::label('name', 'Nombre de la opción') !!}
                        {!! Form::text('name', null, ['class'=>'form-control'. ( $errors->has('name') ? ' is-invalid' : '' ),'placeholder'=>'Nombre']) !!}
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    


                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                {!! Form::submit('Adicionar', ['class'=>'btn btn-primary']) !!}

              </div>
            </div>
          </div>


    {!! Form::close() !!}
  </div>
