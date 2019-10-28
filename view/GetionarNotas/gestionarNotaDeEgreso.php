<!DOCTYPE html>
<html>
<head>
    <?php
    include "../../view/theme/AdminLTE/Additional/head.php";
    ?>
</head>
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">
    <?php
    include "../../view/theme/AdminLTE/Additional/header.php";
    include "../../view/theme/AdminLTE/Additional/aside.php";
    ?>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Nota de egreso nº
                <!-- <small>Blank example to the fixed layout</small> -->
                
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido -->
        <section class="content">
            <div class="box box-info">
                <div class="box-header">
                    <div class="box-tools pull-right">
                        <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                </div>
                <!-- Inicia tu codigo aqui -->
                <form role="form" action="../../controller/clienteController.php" method="post" >
                    <!--  Lugar de butons y label y textbox  -->

                    <div class="box-body">
                        <div class="col-lg-3">
                            <label>Nombre del personal</label>
                            <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                                <input type="text" name = "nombre_personal" class="form-control" >
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label>Fecha </label>
                            <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
                                <input type="text" name = "fecha_Egreso"class="form-control">
                            </div>
                        </div>

                    </div>

            </div>
            <!--  Lugar de butons y label y textbox  -->
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Añadir insumos a la nota</h3>
                </div>

                <div class="box-body">

                    <div class="col-lg-3">
                        <label>Nombre de insumo</label>
                        <div class="input-group margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-briefcase fa-fw" aria-hidden="true"></i></span>
                            <input type="text" name = "nombreInsumoParaEgreso" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label>Cantidad del insumo</label>
                        <div class="input-group margin-bottom-sm">
                            <span class="input-group-addon"><i class="fa fa-bars fa-fw" aria-hidden="true"></i></span>
                            <input type="text" name = "nombreInsumoParaEgreso" class="form-control">
                        </div>
                    </div>

                </div>
                <div class="box-body">
                    <div class="col-lg-2" >
                        <button type="submit" name ="agregar_nota" class="btn btn-block btn-primary" >Agregar insumo <i class="fa fa-fw fa-plus-circle"></i></button>
                    </div>
                </div>

            </div>
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Detalle de la nota de egreso</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Id insumo</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        require "../../controller/NotasController/notaEgresoController.php";
                        $printer=getTablaNotaEgreso();
                        echo $printer;
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="box-body">
                    <div class="box-body">
                        <div class="col-lg-2" >
                            <button type="submit" name ="agregar_nota" class="btn btn-block btn-primary" >Agregar nota <i class="fa fa-fw fa-plus-circle"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            </form>
            <div>
                <a href="https://www.facebook.com/Jezoar-228770924276961/" target="_blank"class="btn btn-block btn-social btn-facebook">
                    <i class="fa fa-facebook"></i>
                    Página de Facebook de Jezoar
                </a>
            </div>
            <!-- Termina tu codigo aqui -->

        </section>
    </div>
</div>
<?php
include "../../view/theme/AdminLTE/Additional/scripts.php";
?>
</body>