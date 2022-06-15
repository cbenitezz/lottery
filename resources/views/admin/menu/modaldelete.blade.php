<div class="modal fade" id="modaldelete-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

    {!! Form::open(['method' => 'DELETE','route' => ['principal.destroy', $item->id]]) !!}

        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Enlace de Menú</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Desea Eliminar el enlace "<strong>{{$item->name}}</strong>"
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

                {!! Form::submit('Aceptar', ['class'=>'btn btn-primary']) !!}

              </div>
            </div>
          </div>


    {!! Form::close() !!}
  </div>
