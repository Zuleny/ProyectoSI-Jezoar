<!DOCTYPE html>
<html>

<head>
    <?php
        include "theme2/AdminLTE/Additional/head.php";
    ?>

    <title>jQuery UI Datepicker - Uso básico</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#datepicker").datepicker();
        });
    </script>
</head>

<!-- the fixed layout is not compatible with sidebar-mini -->

<body />

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php
            include "theme2/AdminLTE/Additional/header.php";
            include "theme2/AdminLTE/Additional/aside.php";
        ?>
        <div class="content-wrapper">
            <!-- Titulo de la cabecera -->
            <section class="content-header">
                <h1>
                    Gestion de Propuesta
                    <small>Jezoar</small>
                </h1>
            </section>
            <!-- Fin de la cabecera -->
            <!-- contenido -->
            <section class="content">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Gestionar Propuesta</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-primary" title="Volver Pag. Atras">
                                <i class="fa fa-fw fa-arrow-circle-left"></i></button>
                        </div>
                    </div>
                    <!-- Inicia tu codigo aqui -->

                    <!--Inicia datos de Proopuesta-->
                    <div class="form-group">
                        <label>Codigo de Propuesta</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="120">
                    </div>
                    <div class="form-group">
                        <label>Nombre Cliente</label>
                        <input type="text" id="nombre" name="nombre" class="form-control"
                            placeholder="Margarita Cerezo Calderon">
                    </div>

                    <div class="form-group">
                        <label>Cantidad de meses</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="6">
                    </div>




                    Fecha:
                    <div id="datepicker"></div>






                    <!--RadioGroup-->
                    <!-- Group of default radios - option 1 -->
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="defaultGroupExample1"
                            name="groupOfDefaultRadios">
                        <label class="custom-control-label" for="defaultGroupExample1">Option 1</label>
                    </div>

                    <!-- Group of default radios - option 2 -->
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="defaultGroupExample2"
                            name="groupOfDefaultRadios" checked>
                        <label class="custom-control-label" for="defaultGroupExample2">Option 2</label>
                    </div>

                    <!-- Group of default radios - option 3 -->
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="defaultGroupExample3"
                            name="groupOfDefaultRadios">
                        <label class="custom-control-label" for="defaultGroupExample3">Option 3</label>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <h4><b>Lista de Servicios</b></h4>
                            <!--Tabla Servicios-->
                            <table class="table table-condensed table-striped">
                                <caption>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
                                        Nuevo Servicio
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                <thead>
                                    <tr>
                                        <th class="col-sm-12">Servicio</th>
                                        <th class="col-sm-1">Editar</th>
                                        <th class="col-sm-1">Eliminar</th>

                                        </caption>
                                    <tr>
                                        <td>Servicio</td>
                                        <td><button class="btn btn-warning glyphicon glyphicon-pencil"
                                                data-toggle="modal" data-target="#modalEdicion">
                                            </button></td>
                                        <td><button class="btn btn-danger glyphicon glyphicon-remove"></button></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>

                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                            </table>
                            <!-- Tabla Productos -->
                            <h4><b>Lista de Insumos</b></h4>
                            <table class="table table-hover table-condensed table-bordered">
                                <caption>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
                                        Nuevo Insumo
                                        <span class="glyphicon glyphicon-plus"></span>
                                    </button>
                                </caption>
                                <thead>
                                    <tr>
                                        <th class="col-sm-6">Insumo</th>
                                        <th class="col-sm-6">Tipo de Insumo</th>
                                        <th class="col-sm-1">Editar</th>
                                        <th class="col-sm-1">Eliminar</th>
                                    <tr>
                                        <td>Insumo</td>
                                        <td>Tipo de Insumo</td>
                                        <td><button class="btn btn-warning glyphicon glyphicon-pencil"
                                                data-toggle="modal" data-target="#modalEdicion">
                                            </button></td>
                                        <td><button class="btn btn-danger glyphicon glyphicon-remove"></button> </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                            </table>
                        </div>
                    </div>
</body>

</div>
<!-- Termina tu codigo aqui -->


</div>
</section>
</div>
</div>

</body>
<footer>
    Jezoar todos los derechos reservados
</footer>
<?php
        include "theme2/AdminLTE/Additional/scripts.php";
?>
</html>