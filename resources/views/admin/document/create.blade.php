@extends('layouts.admin')
@section('title', 'Crear Documentos')

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
                    <h5 class="card-title mb-0">Documentos</h5>
                    <div class="small text-muted">Crear Documento</div>
                </div>
                <div class="card-body">

                  {!! Form::open(['route'=>'document.store','method'=>'post', 'enctype'=>'multipart/form-data']) !!}

                  <div class="row">

                    <div class="col-lg-8 form-group">
                      <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                      {!! Form::label('titulo','Titulo',['class'=>'form-label']) !!}
                      {!! Form::text('titulo', null, ['class'=>'form-control'. ( $errors->has('titulo') ? ' is-invalid' : '' )]) !!}
                      @error('titulo')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                      @enderror
                    </div>

                    <div class="col-lg-4 form-group">
                        <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                        {!! Form::label('categoria','Seleccione Categoria',['class'=>'form-label']) !!}
                        {!! Form::select('categoria', $categoryDocuments, null, ['id'=>'categories', 'class'=>'form-control']) !!}
                    </div>

                    <div class="col-lg-4 form-group">
                        <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                        {!! Form::label('date','Fecha de Publicación',['class'=>'form-label']) !!}
                        {!! Form::date('fecha', null, ['class'=>'form-control'. ( $errors->has('fecha') ? ' is-invalid' : '' )]) !!}
                        @error('fecha')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>






                      <!-- Segundo Bloque -->

                       <div class="col-lg-12 form-group">
                        {!! Form::label('descripcion','Descripción',['class'=>'form-label']) !!}
                        {!! Form::textarea('descripcion', null, ['class'=>'form-control'. ( $errors->has('descripcion') ? ' is-invalid' : '' ),'id'=>'editor']) !!}
                        @error('descripcion')
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
                        {!! Form::label('publicar','Publicar Directamente?',['class'=>'form-label']) !!}
                        {!! Form::checkbox('publicar', null, false, ['class'=>'']) !!}
                      </div>
                    {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
                    {!! Form::close() !!}
                </div>

            </div>



        </div>
        <div class="col-lg-4">

            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Total de Documentos <span class="badge bg-primary rounded-pill">{{ $totalDocuments }}</span>

                </div>
                <div class="card-body">
                  <ol class="list-group list-group-numbered">
                    @foreach ($lastDocuments as $item)
                     <li class="list-group-item">{{ Str::limit($item->title,50,' (...)')}}
                      <i class="fa fa-eye" aria-hidden="true"></i>
                      <span class="badge badge-dark rounded-pill">{{$item->download}}</span>
                    </li>



                    @endforeach
                  </ol>

                </div>
            </div>

        </div>

    </div>

@endsection

@push('script')

{!! Html::script('tinymce/tinymce.min.js', array('type' => 'text/javascript')) !!}

<script>
window.onload = function () {
tinymce.init({
    selector: '#editor',
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

@push('style')

@endpush
