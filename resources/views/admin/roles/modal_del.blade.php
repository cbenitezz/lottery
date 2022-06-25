<!-- Modal -->
<div class="modal fade" id="open-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{route('roles.destroy',$item->id)}}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                        Desea Eliminar el Rol "<strong>{{$item->name}}</strong>" ?
                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                            </div>
                        </div>
                </form>
              </div>
              <div class="modal-footer">

              </div>
            </div>
          </div>


  </div>
