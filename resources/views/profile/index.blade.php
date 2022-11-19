@extends('layouts.dashboard.app')
@section('title', 'Perfil')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            @if (Session::has('succes'))
                <div class="alert alert-info alert-dismissible fade show mb-4 mt-4" role="alert">
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
                <h5 class="card-title mb-0">Perfil</h5>
                <div class="small text-muted">Información Básica</div>
                </div>
                <div class="card-body">
                {!! Form::model($profile, ['route' => ['profile.update', $profile->id],'method' => 'PUT','enctype'=>'multipart/form-data']) !!}

                 <div class="row">
                    <div class="col-md-6">
                    <br>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-user"></i></span>
                            </div>
                            {!! Form::text('name', null, ['class'=>'form-control'.
                             ( $errors->has('name') ? ' is-invalid' : '' )]) !!}
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-user"></i></span>
                            </div>
                            {!! Form::text('last_name', null, ['placeholder'=>'Apellido','class'=>'form-control'.
                            ( $errors->has('last_name') ? ' is-invalid' : '' )]) !!}
                            @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                        </div>
                        {!! Form::email('email', $profile->users->email, ['disabled','class'=>'form-control']) !!}
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-user"></i></span>
                            </div>
                            {!! Form::select('genero', $genero, null,['class'=>'form-control']) !!}
                        </div>

                        <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-lock"></i></span>
                        </div>
                        {!! Form::password('password',['placeholder'=>'Password','class'=>'form-control'. ( $errors->has('password') ? ' is-invalid' : '' )]) !!}
                        @error('password')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                        @enderror
                        </div>

                        <div class="input-group mb-4">
                        <div class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-lock"></i></span>
                        </div>
                        {!! Form::password('password_confirmation',['placeholder'=>'Repeat password','class'=>'form-control']) !!}

                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Avatar</h5>
                                <div class="small text-muted">Imagen 500*500 Px</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @if ($profile->avatar== NULL)
                                    <div class="mx-auto">
                                    <img class="img-avatar" src="{{ asset('asset/images/avatarDefault.png')}}" style="width: 100%">
                                    </div>
                                    @else
                                    <div class="mx-auto">
                                    <img src="{{ asset('asset/images/'.$profile->avatar)}}" style="width: 100%">
                                    </div>
                                    @endif
                                        <div class="custom-file">
                                        <input type="file" name="avatar" class="custom-file-input" id="InputFileAvatar">
                                        <label class="custom-file-label" for="InputFileAvatar" data-browse="Buscar"></label>
                                      </div>


                                </div>
                            </div>
                        </div>
                    </div>

                    {!! Form::submit('Actualizar Perfil', ['class'=>'btn btn-block btn-success']) !!}

                  </div>
                  {!! Form::close() !!}
                </div>

            </div>



        </div>

    </div>

@endsection

@push('script')

<script>
    $('#InputFileAvatar').on('change',function(){
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(fileName);
    })
</script>

@endpush
@push('style')
<style>

</style>
@endpush
