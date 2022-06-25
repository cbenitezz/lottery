@extends('layouts.dashboard.app')
@section('title', 'Crear Roles')

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

        <div class="card">
            <div class="card-header">
                <a href="{{route('roles.index')}}" class="btn btn-success active  float-right">
                    <i class="fa fa-align-justify"></i> Listar Roles</a>
                    <h5 class="card-title mb-0">Permisos Asignados</h5>
                    <div class="small text-muted">Adicione nuevos permisos al rol</div>

            </div>
            <div class="card-body">
              <div class="row">

                <div class="col-lg-12">


                  {!! Form::model($role, ['route' => 'roles.store', 'method' => 'POST']) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Nombre Rol', [ 'class' => 'h6', ]) !!}
                        {!! Form::text('name', null, ['class'=> 'form-control', 'disabled'=>'disabled', 'placeholder'=>'Ingrese Nuevo Rol']) !!}

                        @error('name')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                        @enderror

                    </div>

                    <div class="row">
                      <div class="col-lg-12 mb-3">
                       <span class="badge badge-info form-label">Permisos</span>
                      </div>
                    </div>

                    @foreach ($permisos as $item)
                        <div>
                            <label>
                            {!! Form::checkbox('permissions[]', $item->id, null, ['class'=>'mr-1']) !!}
                            {{$item->description}}
                            </label>
                        </div>


                    @endforeach

                    {!! Form::submit('Guardar Permisos', ['class'=>'btn btn-primary mt-3']) !!}
                  {!! Form::close() !!}
                </div>

              </div>

            </div>


        </div>



    </div>

</div>
@endsection
