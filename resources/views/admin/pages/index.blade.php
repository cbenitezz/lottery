@extends('layouts.admin')
@section('title', 'TutziCMS')

@section('content')

    <div class="row">
        <div class="col-lg-8">
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
                <h4>Páginas</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12 form-group">
                        <a href="{{route('create.pages')}}" class="btn btn-primary">Registrar Pagina</a>
                    </div>
                    <div class="col-lg-12">
                        <table class="table table-sm">
                        <thead class="thead-dark">
                            <th>Dominio</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            @foreach ($pages as $item)
                               <tr>
                                    <td>{{$item->dominio}}</td>
                                    <td>
                                        @if ($item->state == 'activo')
                                        <span class="badge badge-success">{{$item->state}}</span> 
                                        @else
                                        <span class="badge badge-danger">{{$item->state}}</span>    
                                        @endif
                                        
                                        </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              Acción
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                              <a class="dropdown-item" data-toggle="modal" data-target="#modal-delete-{{$item->id}}">Eliminar</a>
                                              <a class="dropdown-item" data-toggle="modal" data-target="#open-{{$item->id}}">Cambiar Dominio</a>
                                              
                                            </div>
                                        </div> 
                                        <div class="modal fade" id="open-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            
                                            <form action="{{route('update.pages',$item->id)}}" method="post" role="form" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                            <div class="modal-dialog  modal-dialog-centered">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Cambiar Dominio</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                   
                                                    <div class="row">
                                                    <div class="col-lg-12">

                                                        <input type="text" class="form-control @error('dominio') is-invalid @enderror" placeholder='Titulo' name='dominio' value="{{$item->dominio}}">
                                                        @error('dominio')
                                                                     <span class="invalid-feedback" role="alert">
                                                                         <strong>{{ $message }}</strong>
                                                                     </span>
                                                        @enderror  
                                                    
                                                    </div>    
                                                    </div>    
                                                  
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                  </div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                               
                                        @include('admin.pages.modal')

                                    </td>

                               </tr>
                            

                            @endforeach
                           

                        </tbody>
                        </table>
                    </div>

                  </div>
                    
                </div>

            
            </div>


            
        </div>

    </div>

@endsection