@extends('layouts.dashboard.app')
@section('title', "Listado de Boletas")

@section('content')

<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="fa fa-ticket" aria-hidden="true"></i> LISTADO BOLETAS </h5>
                <div class="small text-muted">Control Boletas</div>
            </div>
            <div class="card-body">
                <div class="row">

                  <div class="col-lg-12 table-responsive">
                      <table class="table table-striped" id="control_ticket_table" style="font-size: 0.8rem;color:black">
                      <thead>
                          <th>id</th>
                          <th>Sorteo</th>
                          <th>Vendedor</th>
                          <th>Cliente</th>
                          <th>Número(s)</th>
                          <th>Pago</th>
                          <th>Retirar</th>


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
{!! Html::script('https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js', array('type' => 'text/javascript')) !!}

{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js', array('type' => 'text/javascript')) !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js', array('type' => 'text/javascript')) !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js', array('type' => 'text/javascript')) !!}

{!! Html::script('https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js', array('type' => 'text/javascript')) !!}
{!! Html::script('https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js', array('type' => 'text/javascript')) !!}

{!! Html::script('https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js', array('type' => 'text/javascript')) !!}
{!! Html::script('https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js', array('type' => 'text/javascript')) !!}
{!! Html::script('asset/js/dataTables.editor.minjs', array('type' => 'text/javascript')) !!}


<script>


    $('.modal').removeClass('fade');

    $(document).ready( function() {


     let datatableAbono =   $('#control_ticket_table').DataTable({

            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            searching: true,
            ajax: '/listarticket/?customer={!! $customer !!}&modelo={!!$modelo!!}',
           // ajax: '/listarticket/?customer='+{{$customer}}+'&modelo='+{{$modelo}}+',
            //ajax: {
            //    url: "{{ url('listarticket/?customer="+$customer+"&modelo="+$modelo+"') }}",
            //},

            columns: [

                    { data: 'id', name: 'id'},
                    { data: 'lottery_id', name: 'lottery_id'},
                    { data: 'user_id', name: 'user_id'},

                    { data: 'customer_id', name: 'customer_id'},
                    { data: 'number_ticket', name: 'number_ticket'},
                    { data: 'paid_ticket', name: 'paid_ticket'},
                    { data: 'actions', name: 'actions'},





            ],
            columnDefs: [{ "targets": [4,5,6],
                          "orderable": false,
                          "className": "text-center",

            }],
            lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "TODO"],
            ],

            dom: '<"top"lB>frt<"bottom"ip><"clear">',
            buttons: [

                                    {
                                        extend: 'print',
                                        text: '<i class="fa fa-print" aria-hidden="true"></i>',
                                        className: 'btn btn-info m-b-10 m-l-5',
                                                    customize: function ( win ) {
                                                    $(win.document.body)
                                                        .css( 'font-size', '10pt' )
                                                        .prepend(
                                                            '<img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                                                        );

                                                    $(win.document.body).find( 'table' )
                                                        .addClass( 'compact' )
                                                        .css( 'font-size', 'inherit' );
                                                }
                                         },
                                    {
                                        extend: 'excel',
                                        text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i>',
                                        className: 'btn btn-success active m-b-10 m-l-5',
                                        exportOptions: {
                                             columns: [ 0, 1, 2, 3, 4 ,5]
                                        }
                                    },
                                    {
                                        extend: 'pdf',
                                        text:'<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                                        className: 'btn btn-danger active m-b-10 m-l-5',
                                        exportOptions: {
                                            columns: [ 0, 1, 2, 3, 4 ,5]
                                                }
                                    }
                            ],
            order: [[ 0, 'asc' ]],
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
{!! Html::style('https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css') !!}
{!! Html::style('https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css') !!}
{!! Html::style('https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css') !!}
{!! Html::style('asset/css/editor.dataTables.min.css') !!}


@endpush
