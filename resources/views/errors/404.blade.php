@extends('layouts.app')

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
                     <div class="">
                        <div class="error-body text-center">
                             <img src="{{ asset('img/404.png') }}" id="404" class="img-fluid">
                             <h6><a class="btn btn-info btn-rounded waves-effect waves-light m-b-40" href="/">Regresar</a></h6>

                        </div>
                    </div>
                  </div>
               </div>
            </div>
        </div>

      <!-- Fin Vista  -->
    </div>


@endsection
