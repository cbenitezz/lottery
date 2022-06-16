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
                    <i class="fa fa-envelope"></i><span class="hide-menu">Sorteos</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="email-compose.html">Registro</a></li>
                        <li><a href="email-compose.html">Ventas</a></li>
                        <li><a href="email-read.html">Sorteos</a></li>
                        <li><a href="email-inbox.html">Abonos</a></li>
                        <li><a href="email-inbox.html">Disponibilidad</a></li>
                    </ul>
                </li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false">
                    <i class="fa fa-bar-chart"></i><span class="hide-menu">Usuarios</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('user.create')}}">Sistema</a></li>
                        <li><a href="{{ route('user.cliente')}}">Clientes</a></li>
                        <li><a href="{{ route('user.vendedor')}}">Vendedores</a></li>
                        <li><a href="{{ route('roles.index')}}">Roles</a></li>

                    </ul>
                </li>
                <li class="nav-label">Contabilidad</li>
                <li> <a class="has-arrow  " href="#" aria-expanded="false">
                    <i class="fa fa-suitcase"></i><span class="hide-menu">Informes <span class="label label-rouded label-warning pull-right">6</span></span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="ui-alert.html">Cartera</a></li>
                        <li><a href="ui-button.html">Comisiones</a></li>

                    </ul>
                </li>




            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->
