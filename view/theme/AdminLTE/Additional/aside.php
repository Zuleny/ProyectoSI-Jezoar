<aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            <img src="../../documentation/jezoar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
            <p><?php echo $_SESSION['user']?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENÚ DE NAVEGACIÓN</li>
<<<<<<< HEAD
            <!-- Servicios -->
            <li class="treeview">
              <a href="#">
                  <i class="fa fa-dashboard"></i> <span>Servicios de Limpieza</span>
                  <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDePropuesta/gestionPropuesta.php"><i class="fa fa-circle-o"></i> Gestionar Propuestas</a></li>
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeCotizacion/gestionCotizacion.php"><i class="fa fa-circle-o"></i> Gestionar Cotizacion</a></li>
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeInforme/gestionInforme.php"><i class="fa fa-circle-o"></i> Gestionar Informes</a></li>
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeContrato/gestionContrato.php"><i class="fa fa-circle-o"></i> Administrar Contratos</a></li>
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeServicio/gestionServicio.php"><i class="fa fa-circle-o"></i> Gestionar Servicios</a></li>
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/GestionDeCliente/gestionCliente.php"><i class="fa fa-circle-o"></i> Gestionar Clientes</a></li>
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
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeProveedor/gestionProveedor.php"><i class="fa fa-circle-o"></i> Gestionar Proveedores</a></li>
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeAlmacen/gestionAlmacen.php"><i class="fa fa-circle-o"></i>Gestionar Almacen</a></li>
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeNotaDeIngreso/gestionNotaIngreso.php"><i class="fa fa-circle-o"></i>Gestionar Notas de Ingreso</a></li>
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/GetionarNotas/gestionarNotaDeEgreso.php"><i class="fa fa-circle-o"></i>Gestionar Notas de Egreso</a></li>
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/GestionDeNotasDevolucion/gestionNotasDevolucion.php"><i class="fa fa-circle-o"></i>Gestionar Notas de Devolucion</a></li>
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
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeUsuario/gestionUsuario.php"><i class="fa fa-circle-o"></i>Gestionar  Usuarios</a></li>
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/GestionDeRol/gestionRol.php"><i class="fa fa-circle-o"></i>Gestionar  Rol</a></li>
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/GestionDePermiso/gestionPermiso.php"><i class="fa fa-circle-o"></i>Gestionar Permiso</a></li>
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeBitacora/administrarBitacora.php"><i class="fa fa-circle-o"></i>Administrar Bitacora</a></li>
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDePersonal/gestionDePersonal.php"><i class="fa fa-circle-o"></i>Gestionar Personal</a></li>
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
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeProducto/gestionProducto.php"><i class="fa fa-circle-o"></i>Gestionar Productos</a></li>
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeHerramienta/gestionHerramienta.php"><i class="fa fa-circle-o"></i>Gestionar Herramientas</a></li>
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeCategoria/gestionCategoria.php"><i class="fa fa-circle-o"></i>Categoria de Productos</a></li>
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/GestionarResporteInvProducto/listaAlmacen.php"><i class="fa fa-circle-o"></i>Reporte de Productos</a></li>
                  <li><a href="http://localhost/ProyectoSI-Jezoar/view/GestionarReporteInventarioHermamienta/ListaAlmacenes.php"><i class="fa fa-circle-o"></i>Reportes de Herramientas</a></li>
              </ul>
            </li>
=======
            <?php 
            
              echo $_SESSION['listPermisos'];

            ?>
>>>>>>> origin
            <!-- Equipo de Trabajo -->
            <li>
              <a href="../../view/DevelopersView/Developers.php">
                  <i class="fa fa-laptop"></i>
                  <span>Developers</span>
              </a>
            </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>