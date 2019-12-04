<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Verificando Usuario</title>
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
                            <li class="inactive">
                                <a href="#">
                                    <i class="fa fa-fw fa-child"></i>
                                    Olvivdé mi Contraseña
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="content-wrapper">
            <div class="container">
                <section class="content-header">
                    <h1>
                    Verificación de Usuario
                    <small>Sistema Jezoar</small>
                    </h1>
                </section>
                <section class="content">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pregunta Gestionada por el Usuario</h3>
                        </div>
                        <form class="box-body" action="../../controller/seguridadPasswordController.php" method="get">
                            <div class="col-lg-4">
                                <h4>Nota:</h4>
                                <p>
                                    Querido(a) <b><?php echo strtoupper($_GET['nombpersonal']); ?></b>, esta pregunta fué creada por <b>usted</b>, al momento de crear su usuario de uso para este sistema, por favor responda la siguiente pregunta. <br> 
                                    <b>Si responde correctamente esta pregunta, podrá recuperar su usuario de uso.</b>
                                </p>
                            </div>
                            <div class="col-lg-8">
                                <div class="row-border">
                                    <label>Pregunta de Verificación</label>
                                    <br>
                                    <label> <?php echo $_GET['question']; ?> </label>
                                </div>
                                <input type="hidden" class="form-control" placeholder="Juanito Perez" name="nombre" value="<?php echo $_GET['nombpersonal']; ?>">
                                <div class="row-border">
                                    <label>Respuesta: </label>
                                    <br>
                                    <input type="text" class="form-control" placeholder="Las respuesta es..." name="respuestaPersonalOvidado">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <br>
                                <button type="submit" class="btn btn-block btn-success" title="Confirmar Respuesta">Confirmar Respuesta
                                    <i class="fa fa-check"></i>
                                </button>
                            </div>
                        </form>
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
