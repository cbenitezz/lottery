@extends('layouts.dashboard.app')
@section('title', 'Boleteria')

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
                    <table class="table table-striped" id="boleteria_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Vendedor</th>
                            <th># Sorteo</th>
                            <th># Boleta</th>
                            <th>Abono</th>
                            <th class="text-center">Acciones</th>
                        </tr>

                    </thead>

                    </table>

                </div>

              </div>

            </div>


        </div>



    </div>

</div>
@endsection

@push('script')

{{--!! Html::script('asset/js/jquery.dataTables.min.js', array('type' => 'text/javascript')) !!--}}
{!! Html::script('https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js', array('type' => 'text/javascript')) !!}
{!! Html::script('https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js', array('type' => 'text/javascript')) !!}
{!! Html::script('https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js', array('type' => 'text/javascript')) !!}
{!! Html::script('https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js', array('type' => 'text/javascript')) !!}





<script>
    $(document).ready( function() {




        $('#boleteria_table').DataTable({

            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth:false,
            ajax: {
                url: "{{ route('lottery.boleteria') }}",
            },
            columns: [
                    { data: 'id', name: 'id', orderable: true },
                    { data: 'user_id', name: 'user_id',orderable: false },
                    { data: 'lottery_id', name: 'lottery_id' , orderable: true},
                    { data: 'number_ticket', name: 'number_ticket',orderable: true},
                    { data: 'paid_ticket', name: 'paid_ticket',orderable: true},
                    { data: 'action', name:'action',orderable: false}



            ],
            language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
                }
            },

        });
    });

</script>
@endpush

@push('style')


{!! Html::style('https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css') !!}
{!! Html::style('https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css') !!}
{!! Html::style('https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css') !!}





@endpush

