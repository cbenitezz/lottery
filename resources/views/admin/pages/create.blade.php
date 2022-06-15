@extends('layouts.admin')
@section('title', 'TutziCMS')

@section('content')

    <div class="row">
        <div class="col-lg-8">

            <form action="{{route('store.pages')}}" method="post" role="form" >
             {{ csrf_field() }}
              <div class="card">
                <div class="card-header">
                <h4>Registro de Paginas</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12 form-group">
                        <input type="text" name="dominio" class="form-control @error('dominio') is-invalid @enderror" placeholder="Dominio Web" id="dominio">
                        @error('dominio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>
                    <div class="col-lg-12 form-group">
                       <div class="row">
                           @foreach ($template as $item)
                                <div class="col-lg-4">
                                    <div class="card">
                                    <input class="form-check-input" type="radio" name="template_id" id="inlineRadio1" value="{{$item->id}}">    
                                    <img src="{{asset('portadas/'.$item->portada)}}" alt="Portada" width="100%">    
                                    <div class="card-body @error('template_id') is-invalid @enderror">

                                        {{ $item->title }}
                                    </div>
                                    </div>   

                                </div> 
                           @endforeach
                       </div>
                       @error('template_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                    </div>
                  </div>
                    
                </div>
                <div class="card-header">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
             </div>
            </form>

            
        </div>

    </div>

@endsection
