<!DOCTYPE html>
<html>
<head>
    <?php
        include "view/theme/AdminLTE/Additional/head.php";
    ?>
</head>
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php
            include "view/theme/AdminLTE/Additional/header.php";
            include "view/theme/AdminLTE/Additional/aside.php";
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
                    <div class="box-body">
                        <h1>Tabla de Productos</h1>
                        <table border="1">
                            <thead>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Précio</th>
                                <th>Stock</th>
                                <th>Añadir a Venta</th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <?php
                            // session_start();
                            if (isset($_SESSION['carrito'])) {
                                $carrito = $_SESSION['carrito'];
                                echo "<h1>Listado de Compras</h1>";
                                echo "Cantidad de Carritos: ".count($carrito);
                            }
                        ?>
                    </div>
                    <div class="box-footer">
                        Footer
                    </div>
                    <!-- Termina tu codigo aqui -->
                </div>
            </section>
        </div>
    </div>
    <?php
        include "view/theme/AdminLTE/Additional/scripts.php";
    ?>
</body>