<!-- Modal -->
<div class="modal fade" id="open-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{route('user.destroy',$item->id)}}" method="post">
        {{ csrf_field() }}
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Desea Eliminar el Usuario "<strong>{{$item->name}}</strong>" ?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>
              </div>
            </div>
          </div>
  
    </form>
  </div>