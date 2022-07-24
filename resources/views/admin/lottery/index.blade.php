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

            <a href="{{route('lottery.create')}}" class="btn btn-success active float-right">
            <i class="fa fa-plus"></i> Crear Rifa</a>
            <h5 class="card-title mb-0"><i class="fa fa-user" aria-hidden="true"></i> CONTROL DE RIFAS </h5>
            <div class="small text-muted">Listado de Sorteos</div>
            </div>
            <div class="card-body">
              <div class="row">

                <div class="col-lg-12 table-responsive">
                    <table class="table table-striped">
                    <thead>
                        <th>#</th>
                        <th>Slogan</th>
                        <th>Nombre</th>
                        <th>Sede</th>
                        <th>Inicio</th>
                        <th>Final</th>
                        <th>Asignar</th>
                        <th>Estado</th>
                    </thead>
                    <tbody>
                        @foreach ($lotteries as $lottery)
                           <tr>
                                <td>{{$lottery->id }}</td>
                                <td>{{$lottery->eslogan}}</td>
                                <td>{{$lottery->name}}</td>
                                <td>{{$lottery->sede}}</td>
                                <td>{{$lottery->date_start}}</td>
                                <td>{{$lottery->date_end}}</td>

                                @if($lottery->status)
                                <td>
                                  <a href="{{route('lottery.boleteria',['id'=> $lottery->id])}}" class="btn btn-warning">
                                  <i class="fa fa-check-circle-o" aria-hidden="true"></i> Asignar</a>
                                </td>
                                <td>
                                  <span class="badge badge-warning">&nbsp;&nbsp;<strong><i class="fa fa-check-circle-o" aria-hidden="true"></i>
                                     Activo</strong></span>
                                </td>

                                @else
                                 <td>
                                    <a href="#" class="btn btn-secondary  disabled ">
                                     Terminada</a>
                                  </td>
                                  <td>
                                    <span class="badge badge-secondary"><strong>Inactivo</strong></span>
                                  </td>

                                @endif




                           </tr>


                        @endforeach


                    </tbody>
                    </table>

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
