@extends('layouts.admin')
@section('title', 'Listar Publicaciones')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            @if (Session::has('succes'))
                <div class="alert alert-success alert-dismissible fade show mb-4 mt-4" role="alert">
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
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Publicaciones</h5>
                    <div class="small text-muted">Editar - Eliminar</div>
                </div>
                <div class="card-body">

                  <table class="table table-sm table-hover table-bordered" id="post_table">
                    <thead>
                       <tr>
                          <th>No.</th>
                          <th>Titulo</th>
                          <th>Categoria</th>
                          <th>Publicado</th>
                          <th>Fecha</th>
                          <th>Acciones</th>

                       </tr>
                    </thead>
                 </table>


                </div>
                <div class="card-footer">

                  <meta name="_token" content="{!! csrf_token() !!}" />

                </div>

            </div>



        </div>

    </div>

@endsection

@push('script')

{!! Html::script('js/jquery.dataTables.min.js', array('type' => 'text/javascript')) !!}
{!! Html::script('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js', array('type' => 'text/javascript')) !!}

{{--!! Html::script('https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js', array('type' => 'text/javascript')) !!}
{!! Html::script('https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap.min.js', array('type' => 'text/javascript')) !!--}}



<script>
  $(function() {
        $('#post_table').DataTable({
            order: [[ 0, 'desc' ]],
            responsive: true,

            columnDefs: [
            {"className": "dt-center", "targets": [0,2,3,4,5]},
            { width: '10%', targets: [3,4] },
            {
                targets: 1,
                render: function ( data, type, row ) {
                return data.substr( 0, 35 )+'…';
                }
            },
            ],
            processing: true,
            serverSide: true,

        ajax: {
            url: "{{ route('post.index') }}",
        },
        columns: [
                 { data: 'id', name: 'No.', orderable: true },
                 { data: 'title', name: 'Titulo',orderable: false },
                 { data: 'categoria', name: 'Categoria' , orderable: true},
                 { data: 'publicar', name: 'Publicado',orderable: false},
                 { data: 'date_post', name: 'Fecha',orderable: true},
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


  $('#post_table').on('click', '.btn-delete[data-remote]', function (e) {
    e.preventDefault();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
        }
    });
    var url = $(this).data('remote');
    //alert(url);
    // confirm then
    if (confirm('Esta Seguro de Eliminar?')) {
        $.ajax({
            url: url,
            type: 'DELETE',
            dataType: 'json',
            data: {method: '_DELETE', submit: true}
        }).always(function (data) {
            $('#post_table').DataTable().draw(false);
            });
    }
});
  </script>

@endpush

@push('style')

{{--!! Html::style('css/jquery.dataTables.min.css') !!}
{!! Html::style('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css') !!--}}


{!! Html::style('https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css') !!}
{!! Html::style('https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css') !!}










@endpush

