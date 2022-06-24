<!-- Modal -->
<div class="modal fade" id="open-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">

        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">ATENCIÓN!!</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{route('user.destroy',$item->id)}}" method="post">
                    {{ csrf_field() }}
                    Desea Eliminar el Usuario ?<br>"<strong>{{$item->name}}</strong>" <br>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar!</button>
                </form>
              </div>
              <div class="modal-footer">

              </div>
            </div>
          </div>


  </div>
