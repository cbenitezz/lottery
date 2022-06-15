@extends('layouts.admin')
@section('title', 'Editar Item Transparencia')

@section('content')

    <div class="row">
        <div class="col-lg-12">
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

                <a href="{{route('index.transparencia')}}" class="btn btn-success active btn-sm float-right">
                <i class="fa fa-align-justify"></i> Listar Items Transparencia</a>
                <h5 class="card-title mb-0">Item Transparencia <span class="badge bg-primary">No.{{$post->id}}</span></h5>
                <div class="small text-muted">Editar Item</div>
                </div>
                <div class="card-body">

                  {!! Form::model($post,['route' => ['update.transparencia', $post->id], 'method' => 'PUT', 'id'=>'formEditPost','enctype'=>'multipart/form-data']) !!}


                  <div class="row">
                    <div class="col-lg-12">
                     {!! Form::hidden('imagen0','default', ['class'=>'','id'=>'profile-photo']) !!}



                    </div>
                    <div class="col-lg-8 form-group">
                      {!! Form::label('title','Titulo',['class'=>'form-label']) !!}
                      {!! Form::hidden('title', null, ['class'=>'form-control']) !!}
                      <h4>{{$post->title}}</h4>
                    </div>

                    <div class="col-lg-4 form-group">
                      {!! Form::label('fecha','Fecha y Hora de Publicación',['class'=>'form-label']) !!}
                      {!! Form::text('date_post', null, ['class'=>'form-control','id'=>'fecha_publicacion','readonly']) !!}
                    </div>




                      <!-- Segundo Bloque -->

                       <div class="col-lg-12 form-group">
                        {!! Form::textarea('content', null, ['class'=>'form-control'. ( $errors->has('content') ? ' is-invalid' : '' ),'id'=>'editor']) !!}
                        @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror



                      </div>



                  </div>

                </div>
                <div class="card-footer">
                <div class="col-lg-4 form-group">
                        {!! Form::label('documento','Subir Documento',['class'=>'form-label']) !!}
                        {!! Form::file('file', ['class'=>'form-control'. ( $errors->has('file') ? ' is-invalid' : '' )]) !!}
                        @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="col-lg-4 form-group">
                        <i class="icon-question"></i>
                        {!! Form::label('publicar','Publicar Directamente ?',['class'=>'form-label']) !!}
                        {!! Form::checkbox('publicar', null, false, ['class'=>'']) !!}
                    </div>

                    {!! Form::submit('Actualizar', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>

            </div>



        </div>
        <div class="col-lg-4">

            <div class="card">
                <div class="card-header">

                    <button class="btn btn-success active btn-sm" onclick="filemanager.selectFile('profile-photo')">
                        <i class="icon-picture"></i> Cambiar Imagen
                       </button>
                </div>
                <div class="card-body">

                  @if ($post->imagen0 == 'default.png' or $post->imagen0 == 'HospitalSantaIsabel.png')
                    <?php $post->imagen0 = '/filemanager/uploads/HospitalSantaIsabel.png'; ?>

                  @endif

                      <img src="{{ asset($post->imagen0) }}" id="profile-photo-preview" class="img-fluid">


                </div>
              </div>



        </div>

    </div>

@endsection

@push('script')

{!! Html::script('tinymce/tinymce.min.js', array('type' => 'text/javascript')) !!}
{!! Html::script('js/foundation-datepicker.js', array('type' => 'text/javascript')) !!}
{!! Html::script('js/foundation-datepicker.es.js', array('type' => 'text/javascript')) !!}

<script>

  $(function(){
    $('#fecha_publicacion').fdatepicker({

      format: 'yyyy-mm-dd hh:ii:ss',
      disableDblClickSelection: true,
      leftArrow:'<<',
      rightArrow:'>>',
      closeIcon:'X',
      closeButton: true,
      language: 'es',
      pickTime: true


    });
  });
  </script>

<script>
window.onload = function () {
tinymce.init({
    selector: '#editor',
    height: 500,
    plugins: 'lists, link, image, media table paste imagetools wordcount preview print',
    menubar: 'insert table view file',
    toolbar1: 'h1 h2 bold italic | styleselect | alignleft aligncenter alignright alignjustify | bullist numlist backcolor ',
    toolbar2: '| link image media preview print',
    menubar: true,
    language: 'es',
    branding: false,
    file_picker_callback: filemanager.tinyMceCallback,




});

};

</script>

@endpush

@push('style')



{!! Html::style('css/foundation-datepicker.min.css') !!}

@endpush
