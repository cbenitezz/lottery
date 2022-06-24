@extends('layouts.dashboard.app')
@section('title', 'Página no disponible!!')

@section('content')


    <div class="container-fluid">

      <!-- Start Page Content -->
        <div class="row">
           <div class="col-12">
              <div class="card card-outline-primary">
                  <div class="card-header">
                  <h4 class="m-b-0 text-white"> <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Advertencia !!</h4>
                  </div>
                  <div class="card-body">
                  <img src="{{ asset('asset/images/404.jpg') }}" id="404" class="img-fluid">
                  <h6>
                     <a class="btn btn-info btn-rounded waves-effect waves-light m-b-40" href="/home">Regresar</a></h6>

                  </div>
               </div>
            </div>
        </div>

      <!-- Fin Vista  -->
    </div>


@endsection
