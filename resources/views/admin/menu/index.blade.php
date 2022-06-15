@extends('layouts.admin')
@section('title', 'Configuración Menú')

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
                    <i class="icon-info"></i>
                    {{Session::get('error')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
            @endif
            </div>
            <div class="col-lg-4">
                {!! Form::model($config_menu, ['route' =>['menu.update', $config_menu->id ], 'method'=>'put']) !!}


                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Configuración Menú</h5>
                        <div class="small text-muted">Información Básica</div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                           <div class="col-lg-12 mb-3 form-group">
                            {!! Form::label('Titulo', null, ['class'=>'form-label']) !!}
                            {!! Form::text('title',old('title'),  ['class'=>'form-control','placeholder'=>'Titulo del Menú']) !!}
                           </div>
                           <div class="col-lg-12 mb-3 form-group">
                            {!! Form::label('Color de Texto', null, ['class'=>'form-label']) !!}
                            {!! Form::text('color',old('color'), ['class'=>'form-control','data-jscolor'=>'{}']) !!}
                           </div>
                           <div class="col-lg-12 mb-3 form-group">
                            {!! Form::label('Color de Fondo', null, ['class'=>'form-label']) !!}
                            {!! Form::text('background',old('background'), ['class'=>'form-control', 'data-jscolor'=>'{}']) !!}
                           </div>

                      </div>

                    </div>
                    <div class="card-footer">
                        {!! Form::submit('Guardar', ['class'=>'btn btn-primary']) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
            <div class="col-lg-8">

                <div class="card">
                    <div class="card-header">
                    <a href="#" data-toggle="modal" data-target="#modalcrearmenu-1" class="btn btn-success active btn-sm float-right">
                        <i class="fa fa-align-justify"></i> Crear Item Menú</a>
                        <h5 class="card-title mb-0">Creación Menú</h5>
                        <div class="small text-muted">Enlaces a URL</div>
                    </div>
                    <div class="card-body">

                            <table class="table table-striped">
                                <thead>
                                    <th>No.</th>
                                    <th>Nombre</th>
                                    <th>Slug</th>
                                    <th>URL</th>
                                    <th>Nivel</th>
                                    <th>Publicar</th>
                                    <th>Submenu</th>
                                    <th>Acciones</th>
                                </thead>
                                @foreach ($menu_front as $item)

                                @if ($item->parent>=0)
                                    <tbody>
                                        <td>{!! $item->id    !!}</td>
                                        <td>{!! $item->name  !!}</td>
                                        <td>{{  $item->slug   }}</td>
                                        <td>{{  $item->entry_id   }}</td>
                                        <td class="text-center">{{  $item->parent }}</td>
                                        <td class="text-center">
                                            @if ($item->enabled==1)
                                            <i class="fa fa-check-square" aria-hidden="true" style="color:green"></i>
                                            @else
                                            <i class="fa fa-window-close" aria-hidden="true" style="color:brown"></i>
                                            @endif

                                        </td>
                                        <td>
                                                @php
                                                    $contar     = 0;
                                                    $submenu    = [];
                                                    $collection = collect([]);
                                                    $nivel      = collect([
                                                        ['id' => 1, 'name' => 'Nivel 1'],
                                                        ['id' => 2, 'name' => 'Nivel 2'],
                                                    ])
                                                @endphp

                                             @foreach ($menu_front as $value)
                                                @if($value->parent==$item->id)
                                                    @php
                                                    $contar++;
                                                    $collection->push(['id'=>$value->id, 'name'=>$value->name]);
                                                    @endphp
                                                 @endif
                                            @endforeach
                                            @php

                                                $submenu = $collection->pluck('name','id');
                                                $totalItemSubmenu = $submenu->count();
                                                $niveles = $nivel->pluck('name','id');
                                            //echo $item->order;
                                            @endphp

                                            <button type="button" data-toggle="modal" data-target="#modalsubmenu-{{ $item->id }}" class="btn btn-primary">
                                                <i class="icon-plus" aria-hidden="true"></i>
                                                <span class="badge badge-light">@php echo $contar @endphp</span>
                                              </button>

                                            @include('admin.menu.modalsubmenu')

                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-cog" aria-hidden="true"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" data-toggle="modal" data-target="#modaldelete-{{$item->id}}">Eliminar</a>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#modaledit-{{$item->id}}">Editar</a>

                                                </div>
                                                <!-- Modal -->
                                                @include('admin.menu.modaldelete')
                                                @include('admin.menu.modaledit')
                                            </div>


                                        </td>

                                    </tbody>

                                @endif

                                @endforeach

                            </table>





                    </div>
                    @include('admin.menu.modalcrearmenu')
                </div>

            </div>





    </div>

@endsection

@push('script')

{!! Html::script('js/jscolor.min.js', array('type' => 'text/javascript')) !!}

@endpush
