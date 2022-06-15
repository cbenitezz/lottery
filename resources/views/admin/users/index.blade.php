@extends('layouts.admin')
@section('title', 'Listado Usuarios')

@section('content')

<div class="row">
    <div class="col-lg-8">
        @if (Session::has('succes'))
            <div class="alert alert-success alert-dismissible fade show mb-4 mt-4" role="alert">
                <i class="icon-check"></i>
                {{Session::get('succes')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4 mt-4" role="alert">
                {{Session::get('error')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        @endif

        <div class="card">
            <div class="card-header">
            <a href="{{route('create.user')}}" class="btn btn-success active btn-sm float-right">
            <i class="fa fa-align-justify"></i> Crear Usuario</a>
            <h5 class="card-title mb-0">Listado de Usuarios</h5>
            <div class="small text-muted">Asignar roles - Eliminar</div>
            </div>
            <div class="card-body">
              <div class="row">

                <div class="col-lg-12 table-responsive">
                    <table class="table table-striped">
                    <thead>
                        <th>Usuario</th>
                        <th>Correo Electrónico</th>
                        <th class="text-center">Roles</th>
                        <th class="text-center">Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                           <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>
                                    <?php $rolActual = $item->getRoleNames(); ?>
                                    @foreach ($rolActual as $rol)
                                      <span class="badge badge-success float-right">{{ $rol }}</span>
                                    @endforeach


                                </td>
                                <td class="text-center">
                                    <div class="dropdown">

                                        @if ($item->id == 1)

                                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#">
                                        <i class="fa fa-lock" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Roles </a>

                                        <a class="btn btn-danger btn-sm" disabled="disabled"  data-target="#">
                                        <i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Eliminar</a>

                                        @else

                                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-rol-{{$item->id}}"><i class="fa fa-link"></i> &nbsp;Roles </a>

                                        <a class="btn btn-danger btn-sm active" data-toggle="modal" data-target="#open-{{$item->id}}"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Eliminar</a>
                                        @endif



                                    </div>
                                    <div class="modal fade" id="modal-rol-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                   {!! Form::model($item, ['route'=>['update.user',$item], 'method'=>'put' ]) !!}

                                        <div class="modal-dialog  modal-dialog-centered">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                                    {{$item->name}}</h5>

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                              </div>
                                              <div class="modal-body">

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

                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                {!! Form::submit('Asignar', ['class'=>'btn btn-primary']) !!}
                                              </div>
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>

                                    @include('admin.users.modal')

                                </td>

                           </tr>


                        @endforeach
                        

                    </tbody>
                    </table>
                    {{ $users->links() }}
                </div>

              </div>

            </div>


        </div>



    </div>

</div>
@endsection
