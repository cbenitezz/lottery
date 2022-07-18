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


            <h5 class="card-title mb-0"><i class="fa fa-user" aria-hidden="true"></i> CONTROL DE ASIGNACIÓN </h5>
            <div class="small text-muted">Asignar / desasignar</div>
            </div>
            <div class="card-body">
              <div class="row">

                <div class="col-lg-12 table-responsive">
                    <table class="table table-striped" id="boleteria_table">
                    <thead>
                        <tr>

                            <th>Vendedor</th>
                            <th># Sorteo</th>
                            <th># Boleta</th>
                            <th>Abono</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>

                    </thead>

                    </table>

                </div>

              </div>

            </div>
            <div class="card-footer">
                @include('admin.lottery.modal_abono')
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


     let datatableAbono =   $('#boleteria_table').DataTable({

            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth:false,
            searching: true,
            ajax: {
                url: "{{ route('lottery.boleteria') }}",
            },

            columns: [

                    { data: 'user_id', name: 'user_id',sortable: true},
                    { data: 'lottery_id', name: 'lottery_id',sortable: true },
                    { data: 'number_ticket', name: 'number_ticket',sortable: true},
                    { data: 'paid_ticket', name: 'paid_ticket',sortable: true, searchable: true},
                    { data: 'status', name: 'status',sortable: true, searchable: true},
                    { data: 'action', name:'action'},



            ],
            columnDefs: [{ "targets": [2,5],
                          "orderable": false,
                          "className": "text-center",
            }],
            lengthMenu: [
            [10, 25, 50, 200],
            [10, 25, 50, 200],
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
                                             columns: [ 0, 1, 2, 3, 4 ]
                                        }
                                    },
                                    {
                                        extend: 'pdf',
                                        text:'<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                                        className: 'btn btn-danger active m-b-10 m-l-5',
                                        exportOptions: {
                                    columns: [ 0, 1, 2, 3, 4 ]
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
        $('#boleteria_table tbody').on('click','.abonar', function(){
            let data = datatableAbono.row($(this).parents()).data();
            $('#numero').val(data.number_ticket);
            $('#id').val(data.id);
            //console.log(data.number_ticket));

        })


        //Función separador de miles
        $("#abono4").on({
        "focus": function(event) {
            $(event.target).select();
        },
        "keyup": function(event) {
            $(event.target).val(function(index, value) {
            return value.replace(/\D/g, "")
                .replace(/([0-9])([0-9]{0})$/, '$1')
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
            });
        }
        });
        //fin función

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

