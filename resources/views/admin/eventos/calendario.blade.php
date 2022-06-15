
@extends('layouts.admin')
@section('title', 'Calendario de Eventos')

@section('content')

<div class="row">
  <div class="col-lg-8">
    @if (Session::has('succes'))
        <div class="alert alert-success alert-dismissible fade show mb-4 mt-4" role="alert">
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
</div>
<div class="col-lg-8">
  <div class="card">
      <div class="card-header">
        <a href="{{route('formulario')}}" class="btn btn-warning btn-sm float-right">
          <i class="fa fa-calendar-check-o"></i> Crear Evento</a>
          <h5 class="card-title mb-0">Eventos</h5>
          <div class="small text-muted">Calendario de Eventos</div>
      </div>
      <div class="card-body">

        @include('admin.eventos.showCalendar')
      
      </div>
      <div class="card-footer">
          <div class="col-lg-4 form-group">


          </div>
      </div>
</div>
</div>


</div>

@endsection

@push('style')
<style>

    .header-col{
      background: #E3E9E5;
      color:#536170;
      text-align: center;
      font-size: 14px;
    }
    .header-calendar{
      background: #ffc107;color:white;
    }
    .box-day{
      border:1px solid #E3E9E5;
      height:150px;
    }
    .box-dayoff{
      border:1px solid #E3E9E5;
      height:150px;
      background-color: #ccd1ce;
    }
    </style>
@endpush

@push('script')

{!! Html::script('tinymce/tinymce.min.js', array('type' => 'text/javascript')) !!}

<script>
window.onload = function () {
tinymce.init({
    selector: '.editor',
    height: 200,
    plugins: 'lists, link, image, media table paste imagetools wordcount preview print',

    menubar: false,
    language: 'es',
    branding: false,
    file_picker_callback: filemanager.tinyMceCallback,

});

};

</script>

@endpush
