@extends('layouts.dashboard.app')
@section('title', 'Listado de Roles')

@section('content')

<div class="row">
    <div class="col-lg-12">
        @if (Session::has('succes'))
            <div class="alert alert-info alert-dismissible fade show mb-4 mt-4" role="alert">
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
            <a href="{{route('roles.create')}}" class="btn btn-success active  float-right">
            <i class="fa fa-align-justify"></i>Crear Rol</a>

            <h5 class="card-title mb-0">Listado Roles</h5>
            <div class="small text-muted">Editar - Asignar Permisos</div>
            </div>
            <div class="card-body">
              <div class="row">

                <div class="col-lg-12  table-responsive">
                    <table class="table table-striped">
                    <thead>
                        <th class="text-center">Rol</th>
                        <th class="text-center">Servicio</th>
                        <th colspan="3" class="text-center">Acciones</th>
                    </thead>
                    <tbody>
                        @foreach ($roles as $item)
                           <tr>
                                <td><h6 style="font-size: 12px;padding-left:40%">{{Str::upper($item->name)}}</h6></td>
                                <td class="text-center">{{$item->guard_name}}</td>
                                <td class="text-center">
                                    @if ($item->id == 1 or $item->id == 2 or $item->id == 3 or $item->id == 4)

                                        <a class="btn btn-info btn-sm" style="color:white"   data-toggle="modal" data-target="#">
                                        <i class="fa fa-lock" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Editar </a>
                                    @else

                                        <a class="btn btn-info btn-sm" style="color:white" data-toggle="modal" data-target="#modal-rol-{{$item->id}}"><i class="fa fa-link"></i> &nbsp;Editar </a>

                                    @endif
                                    @include('admin.roles.modal_edit')
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">

                                        @if ($item->id == 1 )

                                        <a class="btn btn-secondary btn-sm" disabled="disabled"  data-target="#">
                                        <i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Permisos</a>

                                        @else

                                        <a class="btn btn-secondary active btn-sm" href="{{route('roles.show', $item->id)}}"><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;Permisos</a>
                                        @endif

                                    </div>


                                </td>
                                <td class="text-center">
                                    <div class="dropdown">

                                        @if ($item->id == 1 or $item->id == 2 or $item->id == 3 or $item->id == 4)

                                        <a class="btn btn-danger btn-sm" disabled="disabled"  data-target="#">
                                        <i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Eliminar</a>

                                        @else

                                        <a class="btn btn-danger btn-sm active" data-toggle="modal" data-target="#open-{{$item->id}}"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Eliminar</a>
                                        @endif

                                    </div>


                                    @include('admin.roles.modal_del')

                                </td>



                           </tr>


                        @endforeach


                    </tbody>
                    </table>
                    {{ $roles->links() }}
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
