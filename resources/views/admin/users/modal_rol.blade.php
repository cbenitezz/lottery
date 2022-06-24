<!-- start Modal Update Roles -->
<div class="modal fade" id="modal-rol-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticModalLabel">
                                                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                                                        {{$item->name}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {!! Form::model($item, ['route'=>['user.update',$item], 'method'=>'put' ]) !!}
                                                    {!! Form::hidden('title', $title) !!}
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                        <h5>Listado de Roles</h5>

                                                        <div>
                                                            @foreach ($roles as $rol)
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                {{ Form::checkbox('roles[]', $rol->id, null, ['class'=>'']) }}
                                                                </div>
                                                                </div>
                                                                <input type="text" class="form-control" disabled='disabled' value="{{ $rol->name }}" aria-label="Text input with checkbox">
                                                            </div>
                                                            @endforeach
                                                        </div>

                                                        </div>
                                                        </div>

                                                        {!! Form::submit('Asignar', ['class'=>'btn btn-primary']) !!}
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    {!! Form::close() !!}
                                            </div>
                                            <div class="modal-footer">

                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- End Modal Update Roles -->