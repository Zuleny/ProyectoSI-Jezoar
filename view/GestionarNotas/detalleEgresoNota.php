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

    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Nota nº
                <?php
                require "../../controller/NotasController/CDetalleNotaSalida.php";
                $result=nuevaNota();
                echo $result;
                ?>
                <!-- <small>Blank example to the fixed layout</small> -->

            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido -->
        <section class="content">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Detalles de la nota </h3>
                    <div class="box-tools pull-right">
                        <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                </div>
                <!-- Inicia tu codigo aqui -->
                <form role="form" action="../../controller/NotasController/CDetalleNotaSalida.php" method="post" >
                    <!--  Lugar de butons y label y textbox  -->

                    <div class="box-body">
                        <div class="col-lg-4">
                            <label>Productos</label>
                            <select class="form-control" name="nombreCliente">
                                <?php

                                $result=getListaPersonalParaNotas();
                                echo $result;

                                ?>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label>Productos</label>
                            <select class="form-control" name="nombreHerramienta">
                                <?php
                                $result=getListaPersonalParaNotas();
                                echo $result;
                                ?>
                            </select>
                        </div>
                    </div>


                    <div class="box-body">
                        <div class="col-lg-3" >
                            <button type="submit" name ="añadir_nota" class="btn btn-block btn-primary" >Añadir insumo a la nota <i class="fa fa-fw fa-file-text"></i></button>
                        </div>
                    </div>
                    <!--  Lugar de tablas  -->
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Detalles de la nota</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>Cod Insumo</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>

                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                require "../../controller/NotasController/CNotaSalida.php";
                                $printer=getTablaNotaEgreso();
                                echo $printer;
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                </form>
                <div>
                    <a href="https://www.facebook.com/Jezoar-228770924276961/" target="_blank" class="btn btn-block btn-social btn-facebook">
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