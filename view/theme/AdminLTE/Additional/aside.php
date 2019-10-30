<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            <img src="../../public/assets/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <p><?php echo $_SESSION['user']?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENÚ DE NAVEGACIÓN</li>
            <!-- Servicios -->
            <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>Servicios de Limpieza</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDePropuesta/gestionPropuesta.php"><i class="fa fa-circle-o"></i> Gestion de Propuestas</a></li>
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeCotizacion/gestionCotizacion.php"><i class="fa fa-circle-o"></i> Gestion de Cotizacion</a></li>
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeInforme/gestionInforme.php"><i class="fa fa-circle-o"></i> Gestion de Informes</a></li>
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeContrato/gestionContrato.php"><i class="fa fa-circle-o"></i> Administracion de Contratos</a></li>
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeServicio/gestionServicio.php"><i class="fa fa-circle-o"></i> Gestion de Servicios</a></li>
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/GestionDeCliente/gestionCliente.php"><i class="fa fa-circle-o"></i> Gestion de Clientes</a></li>
            </ul>
            </li>
            <!-- Almacen Options -->
            <li class="treeview">
            <a href="#">
                <i class="fa fa-fw fa-thumb-tack"></i>
                <span>Almacen</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeProveedor/gestionProveedor.php"><i class="fa fa-circle-o"></i> Gestion de Proveedores</a></li>
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeAlmacen/gestionAlmacen.php"><i class="fa fa-circle-o"></i>Gestion de Almacen</a></li>
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeNotaDeIngreso/gestionNotaIngreso.php"><i class="fa fa-circle-o"></i>Notas de Ingreso</a></li>
                <li><a href="collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Notas de Egreso</a></li>
                <li><a href="collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Notas de Devolucion</a></li>
            </ul>
            </li>
            <!-- Clientes  -->
            <li class="treeview">
            <a href="#">
                <i class="fa fa-fw fa-users"></i>
                <span>Usuario</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeUsuario/gestionUsuario.php"><i class="fa fa-circle-o"></i> Gestion de Usuarios</a></li>
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/GestionDeRol/gestionRol.php"><i class="fa fa-circle-o"></i>Gestion de Rol</a></li>
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/GestionDePermiso/gestionPermiso.php"><i class="fa fa-circle-o"></i>Notas de Permiso</a></li>
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeBitacora/administrarBitacora.php"><i class="fa fa-circle-o"></i>Administración de Bitacora</a></li>
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDePersonal/gestionDePersonal.php"><i class="fa fa-circle-o"></i>Gestion de Personal</a></li>
            </ul>
            </li>
            <!-- Insumos -->
            <li class="treeview">
            <a href="#">
                <i class="fa fa-fw fa-shopping-cart"></i>
                <span>Insumos</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeProducto/gestionProducto.php"><i class="fa fa-circle-o"></i> Gestion de Productos</a></li>
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeHerramienta/gestionHerramienta.php"><i class="fa fa-circle-o"></i> Gestion de Herramientas</a></li>
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeCategoria/gestionCategoria.php"><i class="fa fa-circle-o"></i> Categoria de Productos</a></li>
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/GestionarResporteInvProducto/reporteInvProducto.php"><i class="fa fa-circle-o"></i> Reporte de Productos</a></li>
                <li><a href="http://localhost/ProyectoSI-Jezoar/view/GestionarReporteInventarioHermamienta/ReporteIventarioHerramienta.php"><i class="fa fa-circle-o"></i> Reportes de Herramientas</a></li>
            </ul>
            </li>
            <!-- Equipo de Trabajo -->
            <li>
            <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Developers</span>
            </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>