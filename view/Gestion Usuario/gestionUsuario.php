<!DOCTYPE html>
<html>
<head>
    <?php
        require_once('../theme/AdminLTE/Additional/head.php');
    ?>
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php
            include "../theme/AdminLTE/Additional/header.php";
            include "../theme/AdminLTE/Additional/aside.php";
        ?>
        <div class="content-wrapper">
            <!-- Titulo de la cabecera -->
            <section class="content-header">
                <h1>
                    Fixed Layout
                    <small>Blank example to the fixed layout</small>
                </h1>
            </section>
            <!-- Fin de la cabecera -->
            <!-- contenido -->
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Titulo</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-primary" title="Volver Pag. Atras">
                            <i class="fa fa-fw fa-arrow-circle-left"></i></button>
                        </div>
                    </div>
                    <!-- Inicia tu codigo aqui -->

                    <!-- Fin Inicio de Codigo -->
                    <div class="box-footer">
                        Footer
                    </div>
                    <!-- Termina tu codigo aqui -->
                </div>
            </section>
        </div>
    </div>
    <?php
        include "../theme/AdminLTE/Additional/scripts.php";
    ?>
</body>