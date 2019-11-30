<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nuevo Password</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../public/assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../public/assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../public/assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../public/assets/AdminLTE/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../public/assets/AdminLTE/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page vi../..a file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../login.php" class="navbar-brand"><b>J</b>ezoar</a>
        </div>
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="inactive"><a href="#"><i class="fa fa-fw fa-child"></i>Olvidé mi Contraseña</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="content-wrapper">
    <div class="container">
      <section class="content-header">
        <h1>
          Restablecimiento de Usuario
          <small>Sistema Jezoar</small>
        </h1>
      </section>
      <section class="content">
        <div class="box box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Asignacion de Nueva Contraseña para el(la) usuario:  <? echo strtoupper($_GET['nombrePersonal']); ?></h3>
          </div>
          <div class="box-body">
            <form class="form-group" action="../../controller/seguridadPasswordController.php" method="post">
                <input type="hidden" value="<?php echo $_GET['nombrePersonal']; ?>" name="nombrPersonal">
                <div class="col-lg-6">
                    <p>
                        Estimado(a) <?php echo $_GET['nombrePersonal']; ?>, se necesita un correo electronico para el envio de un codigo de verificación de que si es usted usuario de este sistema la reciba,y asi podrá restaurar su cuenta Jezoar.
                        En esta dirección de correo electrónico, se le enviará un codigo de verificación.
                    </p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="text" class="form-control" placeholder="Codigo de Verificación" name="codigoVerif">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-block btn-success" title="Agregar Usuario">
                        Confirmar Codigo de Verificación
                        <i class="fa fa-w fa-check"></i>
                    </button>
                </div>
            </form>
          </div>
        </div>
      </section>
    </div>
  </div>
  <footer class="main-footer">
    <div class="container">
        <a href="https://www.facebook.com/Jezoar-228770924276961/" target="_blank"class="btn btn-block btn-social btn-facebook">
            <i class="fa fa-facebook"></i>
                Página de Facebook de Jezoar
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.3
            </div>
        </a>
      <!-- <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights reserved.-->
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../public/assets/AdminLTE/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../public/assets/AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../public/assets/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../public/assets/AdminLTE/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../public/assets/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../public/assets/AdminLTE/dist/js/demo.js"></script>
</body>
</html>
