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
                  <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Gestion de Propuestas</a></li>
                  <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Gestion de Cotizacion</a></li>
                  <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Gestion de Informes</a></li>
                  <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Administracion de Contratos</a></li>
                  <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Gestion de Servicios</a></li>
                  <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Gestion de Clientes</a></li>
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
                  <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Gestion de Proveedores</a></li>
                  <li><a href="collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Gestion de Almacen</a></li>
                  <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i>Notas de Ingreso</a></li>
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
                  <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Gestion de Usuarios</a></li>
                  <li><a href="collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Gestion de Rol</a></li>
                  <li><a href="../layout/boxed.html"><i class="fa fa-circle-o"></i>Notas de Permiso</a></li>
                  <li><a href="collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Adinistración de Bitacora</a></li>
                  <li><a href="collapsed-sidebar.html"><i class="fa fa-circle-o"></i>Gestion de Personal</a></li>
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
                  <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> Gestion de Productos</a></li>
                  <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Gestion de Herramientas</a></li>
                  <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Categoria de Productos</a></li>
                  <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Reporte de Productos</a></li>
                  <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Reportes de Herramientas</a></li>
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