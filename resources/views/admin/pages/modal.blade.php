<!-- Modal -->
<div class="modal fade" id="modal-delete-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <form action="{{route('destroy.pages',$item->id)}}" method="post">
      {{ csrf_field() }}
      <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Eliminar Página</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Desea Eliminar la Pagina "<strong>{{$item->dominio}}</strong>" ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
          </div>
        </div>

  </form>
</div>