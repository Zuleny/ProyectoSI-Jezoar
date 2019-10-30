<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema Jezoar</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="public/assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="public/assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/assets/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="public/assets/AdminLTE/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="public/assets/AdminLTE/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="public/assets/AdminLTE/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="public/assets/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="public/assets/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="public/assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="http://localhost/ProyectoSI-Jezoar/" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>A</b>LT</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b>LTE</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="public/assets/AdminLTE/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php session_start(); echo $_SESSION['user']?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="public/assets/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                  <p>
                    <?php echo $_SESSION['user']?>
                    <small>Member since Nov. 2012</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <!-- COMIENZO DEL ASIDE  --->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            <img src="public/assets/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
    <!-- FIN DEL ASIDE  -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <b>Sistema de Informacion Jezoar</b>
          <small>Menu Principal</small>
        </h1>
      </section>
      <!-- Main content -->
      <section class="content">
        <!-- Cajas principales de index -->
        <div class="row">
          <!-- Gestion de Servicios -->
          <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green-gradient">
              <div class="inner">
                <h4>Gestion de Servicios</h4>
                <p> <br>
                </p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <br>
            </div>
          </div>
          <!-- Gestion de Almacen -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red-gradient">
              <div class="inner">
                <h4>Gestion de Almacen</h4>
                <p><br></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <br>
            </div>
          </div>
          <!-- Gestion de Usuario-->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua-gradient">
              <div class="inner">
                <h4>Gestion de Usuario</h4>
                <p><br></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <!-- No responde este fragmento ni en chrome ni firefox
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
              </li> -->
              <br>
            </div>
          </div>
          <!-- Gestion de insumo -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow-gradient">
              <div class="inner">
                <h4>Gestion de Insumo</h4>
                <p><br></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <br>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- FIN Cajas principales de index -->
        <!-- Primera Fila -->
        <div class="col-lg-3">
          <!-- Servicio1 -->
          <div class="form-group">
            <a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeCotizacion/gestionCotizacion.php">
              <div class="info-box">
                <span class="info-box-icon bg-green-gradient"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text" style="color: black;"><b>Gestion de</b></span>
                  <span class="info-box-text" style="color: black;"><b>Cotizacion</b></span>
                </div>
                <!-- /.info-box-content -->
              </div>
            </a>
          </div>
          <!-- Servicio2 -->
          <div class="form-group">
            <a href="http://localhost/ProyectoSI-Jezoar/view/gestionDePropuesta/gestionPropuesta.php">
              <div class="info-box">
                <span class="info-box-icon bg-green-gradient"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"style="color: black;"><b>Gestion de</b></span>
                  <span class="info-box-text"style="color: black;"><b>Propuesta</b></span>
                </div>
              </div>
            </a>
          </div>
          <!-- Servicio3 -->
          <div class="form-group">
            <a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeServicio/gestionServicio.php">
              <div class="info-box">
                <span class="info-box-icon bg-green-gradient"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"style="color: black;"><b>Gestion de</b></span>
                  <span class="info-box-text"style="color: black;"><b>Servicio</b></span>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- FIN Primera Fila -->

        <!-- Segunda Fila -->
        <div class="col-lg-3">
          <!-- Servicio1 -->
          <div class="form-group">
            <a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeAlmacen/gestionAlmacen.php">
              <div class="info-box">
                <span class="info-box-icon bg-red-gradient"><i class="fa fa-files-o"></i></i></span>
                <div class="info-box-content">
                  <span class="info-box-text" style="color: black;"><b>Gestion de</b></span>
                  <span class="info-box-text" style="color: black;"><b>Almacen</b></span>
                </div>
              <!-- /.info-box-content -->
              </div>
            </a>
          </div>
          <!-- Servicio2 -->
          <div class="form-group">
            <a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeProveedor/gestionProveedor.php">
              <div class="info-box">
                <span class="info-box-icon bg-red-gradient"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"style="color: black;"><b>Gestion de</b></span>
                  <span class="info-box-text"style="color: black;"><b>Proveedor</b></span>
                </div>
              </div>
            </a>
          </div>
          <!-- Servicio3 -->
          <div class="form-group">
            <a href="view/MenuNotaDeInventario/listNotasInventario.php">
              <div class="info-box">
                <span class="info-box-icon bg-red-gradient"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"style="color: black;"><b>Gestion de</b></span>
                  <span class="info-box-text"style="color: black;"><b>Notas</b></span>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- FIN Segunda Fila -->

        <!-- Tercera Fila -->
        <div class="col-lg-3">
          <!-- Servicio1 -->
          <div class="form-group">
            <a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeUsuario/gestionUsuario.php">
              <div class="info-box">
                <span class="info-box-icon bg-aqua-gradient"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"style="color: black;">
                    <b>Gestion de</b>
                  </span>
                  <span class="info-box-text"style="color: black;">
                    <b>Usuario</b>
                  </span>
                </div>
              </div>
            </a>
          </div>
          <!-- Servicio2 -->
          <div class="form-group">
            <a href="http://localhost/ProyectoSI-Jezoar/view/GestionDeRol/gestionRol.php">
              <div class="info-box">
                <span class="info-box-icon bg-aqua-gradient"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"style="color: black;"><b>Gestion de</b></span>
                  <span class="info-box-text"style="color: black;"><b>Rol</b></span>
                </div>
              </div>
            </a>
          </div>
          <!-- Servicio3 -->
          <div class="form-group">
            <a href="http://localhost/ProyectoSI-Jezoar/view/GestionDePermiso/gestionPermiso.php">
              <div class="info-box">
                <span class="info-box-icon bg-aqua-gradient"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"style="color: black;"><b>Gestion de</b></span>
                  <span class="info-box-text"style="color: black;"><b>Permiso</b></span>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- FIN Tercera Fila -->

        <!-- Cuarta Fila-->
        <div class="col-lg-3">
          <!-- Servicio1 -->
          <div class="form-group">
            <a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeProducto/gestionProducto.php">
              <div class="info-box">
                <span class="info-box-icon bg-yellow-gradient"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"style="color: black;"><b>Gestion de</b></span>
                  <span class="info-box-text"style="color: black;"><b>Producto</b></span>
                </div>
              </div>
            </a>
          </div>
          <!-- Servicio2 -->
          <div class="form-group">
            <a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeHerramienta/gestionHerramienta.php">  
              <div class="info-box">
                <span class="info-box-icon bg-yellow-gradient"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"style="color: black;"><b>Gestion de</b></span>
                  <span class="info-box-text"style="color: black;"><b>Herramienta</b></span>
                </div>
              </div>
            </a>
          </div>
          <!-- Servicio3 -->
          <div class="form-group">
            <a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeCategoria/gestionCategoria.php">
              <div class="info-box">
                <span class="info-box-icon bg-yellow-gradient"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text"style="color: black;"><b>Gestion de</b></span>
                  <span class="info-box-text"style="color: black;"><b>Categoria de</b></span>
                  <span class="info-box-text"style="color: black;"><b>Productos</b></span>
                </div>
              </div>
            </a>
          </div>
        </div>
        <!-- FIN Cuarta Fila-->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="box-footer">
          <a href="https://www.facebook.com/Jezoar-228770924276961/" target="_blank"class="btn btn-block btn-social btn-facebook">
              <i class="fa fa-facebook"></i>
              Página de Facebook de Jezoar
              <b class="pull-right hidden-xs">Version 1.0.3</b>
          </a>
      </div>
    </footer>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
          <h3 class="control-sidebar-heading">Recent Activity</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                  <p>Will be 23 on April 24th</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-user bg-yellow"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                  <p>New phone +1(800)555-1234</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                  <p>nora@example.com</p>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                <div class="menu-info">
                  <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                  <p>Execution time 5 seconds</p>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

          <h3 class="control-sidebar-heading">Tasks Progress</h3>
          <ul class="control-sidebar-menu">
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Custom Template Design
                  <span class="label label-danger pull-right">70%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Update Resume
                  <span class="label label-success pull-right">95%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Laravel Integration
                  <span class="label label-warning pull-right">50%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                </div>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)">
                <h4 class="control-sidebar-subheading">
                  Back End Framework
                  <span class="label label-primary pull-right">68%</span>
                </h4>

                <div class="progress progress-xxs">
                  <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                </div>
              </a>
            </li>
          </ul>
          <!-- /.control-sidebar-menu -->

        </div>
        <!-- /.tab-pane -->
        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- /.tab-pane -->
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
          <form method="post">
            <h3 class="control-sidebar-heading">General Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Report panel usage
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Some information about this general settings option
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Allow mail redirect
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Other sets of options are available
              </p>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Expose author name in posts
                <input type="checkbox" class="pull-right" checked>
              </label>

              <p>
                Allow the user to show his name in blog posts
              </p>
            </div>
            <!-- /.form-group -->

            <h3 class="control-sidebar-heading">Chat Settings</h3>

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Show me as online
                <input type="checkbox" class="pull-right" checked>
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Turn off notifications
                <input type="checkbox" class="pull-right">
              </label>
            </div>
            <!-- /.form-group -->

            <div class="form-group">
              <label class="control-sidebar-subheading">
                Delete chat history
                <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
              </label>
            </div>
            <!-- /.form-group -->
          </form>
        </div>
        <!-- /.tab-pane -->
      </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
<!-- jQuery 3 -->
<script src="public/assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="public/assets/AdminLTE/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="public/assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="public/assets/AdminLTE/bower_components/raphael/raphael.min.js"></script>
<script src="public/assets/AdminLTE/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="public/assets/AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="public/assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="public/assets/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="public/assets/AdminLTE/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="public/assets/AdminLTE/bower_components/moment/min/moment.min.js"></script>
<script src="public/assets/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="public/assets/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="public/assets/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="public/assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="public/assets/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="public/assets/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="public/assets/AdminLTE/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="public/assets/AdminLTE/dist/js/demo.js"></script>
</body>
</html>
