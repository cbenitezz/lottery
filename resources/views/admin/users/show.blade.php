@extends('layouts.dashboard.app')
@section('title', "Vendedor: " . strtoupper($profile->name) . " " . strtoupper($profile->last_name))

@section('content')

<div class="row">
    <div class="col-lg-12">


        <div class="card">
            <div class="card-header">

            <h5 class="card-title mb-0">
                <i class="fa fa-user" aria-hidden="true"></i> VENDEDOR: {{ strtoupper($profile->name) }}  {{ strtoupper($profile->last_name) }}</h5>

            <div class="small text-muted">Listado de Clientes del vendedor </div>
            </div>
            <div class="card-body">
              <div class="row">

                <div class="col-lg-12 table-responsive">
                    <table class="table table-striped" id="vendedor_table" >
                    <thead>
                        <th>id</th>
                        <th>Identificación</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>

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

     var nombreVendedor = "{{ strtoupper($profile->name) }} {{ strtoupper($profile->last_name) }}";
     var titleFooter    = "© 2021-2023 MICHU Estrategias Inmobiliarias S.A.S";
     let datatableAbono =   $('#vendedor_table').DataTable({


            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            searching: true,
            ajax: {

                url: "{{ route('user.show', $profile->id) }}",

            },

            columns: [

                    { data: 'id', name: 'id'},
                    { data: 'identification_card', name: 'identification_card'},
                    { data: 'name', name: 'name'},
                    { data: 'last_name', name: 'last_name'},
                    { data: 'phone', name: 'phone'},

            ],
            columnDefs: [{ "targets": [0,1,2,3],
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
                                             columns: [ 0, 1, 2, 3 ]
                                        }
                                    },
                                    {
                                        extend: 'pdf',
                                        title:  nombreVendedor,
                                        text:'<i class="fa fa-file-pdf-o" aria-hidden="true"></i>',
                                        className: 'btn btn-danger active m-b-10 m-l-5',
                                        exportOptions: {
                                        columns: [ 0, 1, 2, 3, 4 ]

                                        },
                                        customize: function (doc) {
                                            doc.content[1].table.widths = [ '20%', '20%', '20%', '20%', '20%'];
                                            doc.pageMargins = [40, 60, 40, 60]; // Márgenes de página
                                            doc.defaultStyle.fontSize = 9; // Tamaño de fuente predeterminado
                                            doc.styles.tableHeader.fontSize = 10; // Tamaño de fuente del encabezado de la tabla
                                            // Encabezado del documento
                                            var header = {
                                                text: 'Listado de Clientes',
                                                style: 'header'
                                            };
                                            var footer = {
                                                columns: [
                                                { text: titleFooter, alignment: 'center', style: 'footer' },

                                                ]
                                            };
                                            // Agregar el footer al documento
                                            doc.footer = function(currentPage, pageCount) {
                                                return {
                                                table: {
                                                    widths: ['*', '*'],
                                                    body: [
                                                    [footer, {}]
                                                    ]
                                                },
                                                layout: 'noBorders'
                                                };
                                            };
                                            // Contenido del documento
                                            var content = [
                                                { text: 'Subtítulo del documento', style: 'subheader' },
                                                // Aquí puedes agregar más contenido al PDF
                                            ];

                                            // Configuración del estilo de texto
                                            var styles = {
                                                header: {
                                                fontSize: 16,
                                                bold: true,
                                                alignment: 'center',
                                                margin: [0, 20, 50, 50] // Márgenes: arriba, derecha, abajo, izquierda
                                                },
                                                subheader: {
                                                fontSize: 14,
                                                bold: true,
                                                margin: [0, 10, 0, 5] // Márgenes: arriba, derecha, abajo, izquierda
                                                }
                                            };

                                            // Agregar el encabezado y el contenido al documento
                                            doc['header'] = header;
                                            //doc['content'] = content;

                                            // Definir los estilos de texto
                                            doc['styles'] = styles;
                                      // Agregar encabezado personalizado

                                            // Establecer orientación de página personalizada
                                            doc.pageOrientation = 'portrait'; // 'portrait' para orientación vertical -horizontal 'landscape'
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
