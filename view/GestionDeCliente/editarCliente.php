//echo json_encode($result)."\n";
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
                Cliente
                <!-- <small>Blank example to the fixed layout</small> -->
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido -->
        <section class="content">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Editar informacion del cliente:  <?php echo $_GET['nombre']?> </h3>
                    <div class="box-tools pull-right">
                        <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                </div>
                <!-- Inicia tu codigo aqui -->
                <form role="form" action="../../controller/clienteController.php" method="post" >
                    <!--  Lugar de butons y label y textbox  -->

                    <div class="box-body">
                        <div class="col-lg-4">
                            <label>Nombre del cliente</label>
                            <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                                <input type="text" name = "nombre_cliente" class="form-control" >
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label>Telefono </label>
                            <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                                <input type="text" name = "telefono_cliente"class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label>Telefono(2)</label>
                            <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                                <input type="text" name = "telefono2_cliente" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="col-lg-4">
                            <label>Correo electronico</label>
                            <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i></span>
                                <input type="text" name ="correo_cliente"class="form-control" >
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>Nit / C.I.</label>
                            <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-id-card-o fa-fw" aria-hidden="true"></i></span>
                                <input type="text" class="form-control"name ="nit_cliente" placeholder="CI, solo si es persona">
                            </div>
                        </div>

                    </div>
                    <div class="box-body">
                        <div class="col-lg-5">
                            <label>Direccion</label>
                            <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i></span>
                                <input type="text" name="direccion_cliente" class="form-control" >
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <br><br>
                            <button type="submit" name ="editar_cliente" class="btn btn-block btn-success" style="border-radius: 15px;" title="Agregar Servicio">Registrar cambios <i class="fa fa-fw fa-save"></i></button>
                        </div>
                        <div class="col-md-6">
                            <a href="gestionCliente.php">
                                <button type="button" style="border-radius: 15px;" class="btn btn-block btn-danger" title="Cancelar Cambios">Cancelar Cambios
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </a>
                        </div>
                    </div>
            </div>
            </form>
            <!--  Lugar de butons y label y textbox  -->
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
