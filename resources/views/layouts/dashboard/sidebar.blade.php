 <!-- Left Sidebar  -->
 <div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">Home</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard <span class="label label-rouded label-primary pull-right">2</span></span></a>
                    <ul aria-expanded="false" class="collapse">

                        <li><a href="index.html">Análisis </a></li>
                        <li><a href="index1.html">Reportes </a></li>
                    </ul>
                </li>
                <li class="nav-label">Rifa</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false">
                    <i class="fa fa-random"></i><span class="hide-menu">Sorteos</span></a>
                    <ul aria-expanded="false" class="collapse">
                        @can('lottery.index')
                        <li><a href="{{ route('lottery.index')}}">Listado</a></li>
                        @endcan

                        <!--<li><a href="{{-- route('lottery.boleteria')--}}">Asignar</a></li>-->
                       <!-- <li><a href="{{-- route('lottery.index') --}}">Ventas</a></li>
                        <li><a href="{{-- route('lottery.index')--}}">Sorteos</a></li>
                        <li><a href="{{-- route('lottery.index') --}}">Abonos</a></li>-->
                        <li><a href="{{ route('payment.index')}}">Abonos</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false">
                    <i class="fa fa-user-plus"></i><span class="hide-menu">Usuarios</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('user.index')}}">Sistema</a></li>
                        <li><a href="{{ route('customer.index')}}">Clientes</a></li>
                        <li><a href="{{ route('user.vendedores')}}">Vendedores</a></li>
                        <li><a href="{{ route('roles.index')}}">Roles</a></li>

                    </ul>
                </li>
                <li class="nav-label">Contabilidad</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false">
                    <i class="fa fa-suitcase"></i><span class="hide-menu">Informes <span class="label label-rouded label-warning pull-right">6</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('lottery.index')}}">Cartera</a></li>
                        <li><a href="{{ route('lottery.index')}}">Comisiones</a></li>

                    </ul>
                </li>




            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->
