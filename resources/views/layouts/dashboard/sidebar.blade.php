 <!-- Left Sidebar  -->
 <div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-label">Inicio</li>
                <li> <a class=" " href="/home" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Panel de Control </span></a>
                </li>
                <li><a href="{{ route('payment.index')}}"><i class="fa fa-usd" aria-hidden="true"></i> Recibir Abonos</a></li>
                <li class="nav-label">Tareas Comunes</li>
                <li> <a class="has-arrow" href="#" aria-expanded="false">
                    <i class="fa fa-random"></i><span class="hide-menu">Sorteos</span></a>

                    <ul aria-expanded="false" class="collapse">
                        @can('lottery.index')
                        <li><a href="{{ route('lottery.index')}}">Crear Sorteo</a></li>

                        @endcan

                        <!--<li><a href="{{-- route('lottery.boleteria')--}}">Asignar</a></li>-->
                       <!-- <li><a href="{{-- route('lottery.index') --}}">Ventas</a></li>
                        <li><a href="{{-- route('lottery.index')--}}">Sorteos</a></li>
                        <li><a href="{{-- route('lottery.index') --}}">Abonos</a></li>-->

                    </ul>
                </li>
                <li> <a class="has-arrow" href="#" aria-expanded="false">
                    <i class="fa fa-user-plus"></i><span class="hide-menu">Usuarios y Permisos</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('user.index')}}">Sistema</a></li>
                        <li><a href="{{ route('roles.index')}}">Roles</a></li>

                    </ul>
                </li>
                <li class="nav-label">Gestión</li>
                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-user-circle-o"></i>
                    <span class="hide-menu">Clientes</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('customer.index')}}">Listado</a></li>
                        <li><a href="{{ route('boleteria')}}">Boletas</a></li>

                    </ul>
                </li>
                <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-user-circle-o"></i>
                    <span class="hide-menu">Vendedores</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('user.vendedores')}}">Listado</a></li>
                        <li><a href="{{ route('buscarVendedor')}}">Buscar Clientes</a></li>

                    </ul>
                </li>
                <!--
                <li class="nav-label">Contabilidad</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false">
                    <i class="fa fa-suitcase"></i><span class="hide-menu">Informes <span class="label label-rouded label-warning pull-right">6</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{-- route('lottery.index')--}}">Cartera</a></li>
                        <li><a href="{{-- route('lottery.index')--}}">Comisiones</a></li>

                    </ul>
                </li>
                 -->



            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->
