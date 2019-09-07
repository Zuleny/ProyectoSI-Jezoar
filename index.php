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
                        <h3 class="box-title">Title</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
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
                                <?php
                                    require_once "model/Data.php";
                                    $data = new Data();
                                    $listaProductos = $data->getProductos();
                                    foreach ($listaProductos as $producto) {
                                        echo '<tr>';
                                            echo '<td>'.$producto->id.'</td>';
                                            echo '<td>'.$producto->nombre.'</td>';
                                            echo '<td>$'.$producto->precio.'</td>';
                                            echo '<td>'.$producto->stock.'</td>';
                                            echo '<td>';
                                                echo "<form action='controller/agregar.php' method='post'>";
                                                    echo "<input type='number' name='txtCantidad'>";//editText numerico
                                                    //type=hidden (no se muestra en el formulario)
                                                    echo "<input type='hidden' name='txtId' value=".$producto->id.">";
                                                    echo "<input type='hidden' name='txtNombre' value=".$producto->nombre.">";
                                                    echo "<input type='hidden' name='txtPrecio' value=".$producto->precio.">";
                                                    echo "<input type='hidden' name='txtStock' value=".$producto->stock.">";
                                                    
                                                    echo "<input type='submit' name='btnAniadir' value='Añadir'>"; //botonAñadir
                                                echo '</form>';
                                            echo '</td>';
                                        echo '</tr>';
                                    }
                                ?>
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