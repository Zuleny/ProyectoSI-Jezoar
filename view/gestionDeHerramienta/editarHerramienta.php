<?php
include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Herramienta
            <small>Gestión de Insumo</small>
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Modificación de Herramienta Código# <?php echo $_GET['codigo']; ?> (Nota: Asigne los nuevos datos de la herramienta a modificar)</h3>
                <div class="box-tools pull-right">
                    <a href="../../index.php" class="btn btn-primary" title="Menú Inicio">
                        <span class="glyphicon glyphicon-home"></span></a>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->
            <?php
            require '../../controller/herramientaController.php';
            $result = getDatosEditarHerramienta($_GET['codigo']);
            ?>
            <form role="form" action="../../controller/herramientaController.php" method="post">
                <!--  Lugar de butons y label y textbox  -->
                <div class="box-body">
                    <div class="col-lg-4">
                        <label>Nombre Herramienta</label>
                        <input type="text" class="form-control" name="nombreEditar" required placeholder="Nombre de la herramienta" value="<?php echo pg_result($result,0,0) ?>">
                        <input type="hidden" name="codigo" value="<?php echo $_GET['codigo']; ?>">
                    </div>

                </div>

                <div class="box-body">
                    <div class="col-lg-7">
                        <label>Descripcion</label>
                        <input type="text" class="form-control" name="descripcionEditar" required placeholder="Descripcion de la herramienta" value="<?php echo pg_result($result,0,1) ?>">
                    </div>
                </div>

                <div class="box-body">
                    <div class="col-lg-8 form-group" style="background-color: #D4EFDF;">
                        <?php
                        if(pg_result($result,0,2)=="N"){
                            $printer = '<span class="label label-danger">No Disponible</span>';
                        }else if(pg_result($result,0,2)=="D"){
                            $printer = '<span class="label label-success">Disponible</span>';
                        }else{
                            $printer = '<span class="label label-warning">Mantenimiento</span>';
                        }
                        ?>
                        <label> <b>Estado: </b> <?php echo $printer; ?> </label>
                        <br>

                        <?php
                                if (pg_result($result,0,2)=="N") {
                                    echo    '<div class="col-md-4">
                                                <p><input type="radio" name="estadoEditar" value="D"> Disponible</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><input type="radio" name="estadoEditar" value="N" checked> No Disponible</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><input type="radio" name="estadoEditar" value="M"> Mantenimiento</p>    
                                            </div>';
                                }else if (pg_result($result,0,2)=="D") {
                                    echo    '<div class="col-md-4">
                                                <p><input type="radio" name="estadoEditar" value="D" checked> Disponible</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><input type="radio" name="estadoEditar" value="N"> No Disponible</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><input type="radio" name="estadoEditar" value="M"> Mantenimiento</p>    
                                            </div>';
                                }else{
                                    echo    '<div class="col-md-4">
                                                <p><input type="radio" name="estadoEditar" value="D"> Disponible</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><input type="radio" name="estadoEditar" value="N"> No Disponible</p>
                                            </div>
                                            <div class="col-md-4">
                                                <p><input type="radio" name="estadoEditar" value="M" checked> Mantenimiento</p>    
                                            </div>';
                                }
                            ?>
                    </div>
                    <div class="col-lg-4">
                        <div class="col-md-6">
                            <br>
                            <a href="gestionHerramienta.php">
                                <button type="button" style="border-radius: 15px;" class="btn btn-block btn-danger" title="Cancelar Cambios">Cancelar<i class="fa fa-fw fa-times"></i></button>
                            </a>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-block btn-success" style="border-radius: 15px;" title="Agregar Cambios">Modificar <i class="fa fa-fw fa-check"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="box-footer">
                <a href="https://www.facebook.com/Jezoar-228770924276961/" target="_blank"class="btn btn-block btn-social btn-facebook">
                    <i class="fa fa-facebook"></i>
                    Página de Facebook de Jezoar
                </a>
            </div>
        </div>
    </section>
</div>
<?php
include "../../view/theme/AdminLTE/Additional/scripts.php";
?>
