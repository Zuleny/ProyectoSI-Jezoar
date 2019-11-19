<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Sistema Web</title>
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
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">   
        
        <link rel="stylesheet" href="../../public/assets/view/viewStyle.css">

        <link rel="stylesheet" href="../../public/assets/AdminLTE/bower_components/datatables.net/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../public/assets/AdminLTE/bower_components/datatables.net/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="../../public/assets/AdminLTE/bower_components/datatables.net/css/estilos.css">
        <!-- Buttons DataTables -->
        <link rel="stylesheet" href="../../public/assets/AdminLTE/bower_components/datatables.net/css/buttons.bootstrap.min.css">
        <link rel="stylesheet" href="../../public/assets/AdminLTE/bower_components/datatables.net/css/font-awesome.min.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="../../public/assets/AdminLTE/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        
    </head>
    <!-- the fixed layout is not compatible with sidebar-mini -->
    <body class="hold-transition skin-blue fixed sidebar-mini">
        <div class="wrapper">
            <!--  Inicio de Header  -->
            <?php
                include "header.php";
            ?>
            <!--  Fin de Header  -->
            <!-- Inicio de Aside -->
            <?php
                include "aside.php";
            ?>
            <!--  Fin de Aside  -->