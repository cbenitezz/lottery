@extends('layouts.dashboard.app')
@section('title', "Buscar Clientes por Vendedor")

@section('content')

<div class="row">
    <div class="col-lg-12">

        @if(session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif



        <div class="card">
            <div class="card-header">

            <h5 class="card-title mb-0"> VENDEDOR </h5>
            <br>
            <form method="POST" action="{{ route('buscarcedulavendedor')}}">
                @csrf

                <div class="input-group input-group-default">
                    <span class="input-group-btn"><button class="btn btn-primary" type="submit"><i class="ti-search"></i></button></span>
                    <input type="text" placeholder="Digite Cédula" name="identification_card" class="form-control">
                </div>
            </form>

            <div class="small text-muted">Para listar los clientes por vendedor, digite el número de cédula del vendedor</div>
            </div>
            <div class="card-body">
              <div class="row">

                <div class="col-lg-12 table-responsive">


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

        const nombreElement = document.getElementById('nombre');
        nombreElement.textContent = 'Juan Pérez';

     let datatableAbono =   $('#cliente_table').DataTable({


            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            searching: true,
            ajax: {
                url: "{{ route('customer.show', ['customer'=>54]) }}",
            },

            columns: [

                    { data: 'number_ticket', name: 'number_ticket'},
                    { data: 'paid_ticket', name: 'paid_ticket'},
                    { data: 'updated_at', name: 'updated_at'},
                    { data: 'customer_name', name: 'customer_name'},







            ],
            columnDefs: [{ "targets": [0,1,2],
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
            $('#lottery').val(data.lottery_identificador);
            //console.log(data.lottery_identificador);

        });

        $('#form_abonar').submit(e=>{
            //id from tableticket
            //
            let id = $('#id').val();
            let numero  = $('#numero').val();
            let abono   = $('#abono').val();
            let lottery = $('#lottery').val();
            console.log('id:'+id +'numero:'+ numero +'abono:' + abono+' lottery:' +lottery);
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                }
            });
            $.ajax({
                    type: "POST",
                    url: '/payment',
                    data:{
                        id:id,
                        numero:numero,
                        abono:abono
                    },
                    success: function (result){
                        console.log(result.data);
                        if(result.data == true){
                         window.location.href = '/admin/boleteria/'+lottery;
                        //console.log(result.contar);
                        }


                    },
                    error: function (result) {
                        console.log('Error:', result);
                    }
                });
            e.preventDefault();
        })



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
