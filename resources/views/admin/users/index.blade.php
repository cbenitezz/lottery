@extends('layouts.dashboard.app')
@section('title', $title)

@section('content')

<div class="row">
    <div class="col-lg-12">
        @if (Session::has('succes'))
            <div class="alert alert-success alert-dismissible fade show mb-4 mt-4" role="alert">

                <a href="#" class="alert-link">
                     <i class="icon-check"></i>
                     {{Session::get('succes')}}
                    </a>

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
             @if($title == "Usuarios del Sistema")
                 @php
                    $uri = 'user.create';
                 @endphp
             @elseif($title =="Listado de Clientes")
                 @php
                    $uri = 'user.cliente';
                 @endphp
             @elseif($title =="Listado de Vendedores")
                 @php
                    $uri = 'user.vendedor';
                 @endphp
             @endif


            <a href="{{route($uri)}}" class="btn btn-success active float-right">
            <i class="fa fa-plus"></i> Adicionar</a>
            <h5 class="card-title mb-0">{{ $title }}</h5>
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
                                <td class="text-center">
                                    <?php $rolActual = $item->getRoleNames(); ?>
                                    @foreach ($rolActual as $rol)
                                      <button type="button" class="btn btn-success btn-sm "><i class="ti-user"></i> {{ $rol }}</button>
                                    @endforeach


                                </td>
                                <td class="text-center">
                                    <div class="dropdown">

                                        @if ($item->id == 1)

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#">
                                            <i class="fa fa-lock"></i> &nbsp;Roles
                                        </button>

                                        <a class="btn btn-danger btn-sm" disabled="disabled"  data-target="#">
                                        <i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Eliminar</a>

                                        @else

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-rol-{{$item->id}}">
                                            <i class="fa fa-link"></i> &nbsp;editar
                                        </button>

                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-rol-{{$item->id}}">
                                            <i class="fa fa-link"></i> &nbsp;Roles
                                        </button>

                                        <button type="button" class="btn btn-danger active btn-sm" data-toggle="modal" data-target="#open-{{$item->id}}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Eliminar
                                        </button>
                                        @endif



                                    </div>
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
@push('script')
<script>
    $('.modal').removeClass('fade');
</script>
@endpush

