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
                    $uri    = 'user.create';
                    $button = "btn-success";
                 @endphp
             @elseif($title =="Cliente")
                 @php
                    $uri = 'user.cliente';
                    $button = "btn-info";
                 @endphp
             @elseif($title =="Vendedor")
                 @php
                    $uri = 'user.vendedor';
                    $button = "btn-warning";
                 @endphp
             @endif


            <a href="{{route($uri,[ 'title'=>$title ])}}" class="btn {{ $button }}  float-right">
            <i class="fa fa-plus"></i> Adicionar</a>
            <h5 class="card-title mb-0"><i class="fa fa-user" aria-hidden="true"></i> CONTROL DE USUARIOS </h5>
            <div class="small text-muted">Asignar roles - Eliminar</div>
            </div>
            <div class="card-body">
              <div class="row">

                <div class="col-lg-12 table-responsive">
                    <table class="table table-striped">
                    <thead>
                        <th>{{ $title }}</th>
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

                                      <span class="badge badge-success" style="color: black"><i class="fa fa-user"></i> {{ $rol }}</span>
                                    @endforeach


                                </td>
                                <td class="text-center">
                                    <div class="dropdown">

                                        @if ($item->id == 1)

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn-secondary btn-sm" disabled="disabled"  data-toggle="modal" data-target="#">
                                            <i class="fa fa-lock"></i> &nbsp;Roles
                                        </button>

                                        <button type="button"class="btn-secondary btn-sm" disabled="disabled"  data-target="#">
                                            <i class="fa fa-lock" aria-hidden="true"></i>&nbsp;Eliminar
                                        </button>

                                        @else

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit-{{$item->id}}">
                                            <i class="fa fa-user"></i> &nbsp;editar
                                        </button>

                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-rol-{{$item->id}}">
                                            <i class="fa fa-link"></i> &nbsp;Roles
                                        </button>

                                        <button type="button" class="btn btn-danger active btn-sm" data-toggle="modal" data-target="#open-{{$item->id}}">
                                            <i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Eliminar
                                        </button>
                                        @endif



                                    </div>


                                    @include('admin.users.modal_rol')
                                    @include('admin.users.modal_edit')
                                    @include('admin.users.modal_del')

                                </td>

                           </tr>


                        @endforeach


                    </tbody>
                    </table>
                    <br>
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

