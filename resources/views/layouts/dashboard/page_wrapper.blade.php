<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard - {{ ucwords(Auth::user()->roles->pluck('name')[0]) }}</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">

        @yield('content')



        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->

    @include('layouts.dashboard.footer')

</div>
<!-- End Page wrapper  -->

</div>
<!-- End Wrapper -->
