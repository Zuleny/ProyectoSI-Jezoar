<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Nota de Devolución
            <small>Gestion de Almacen</small> 
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido de mi Vista -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Editar Nota de Devolucion # <?php echo $_GET['notaEditar'] ?> (Nota: Asigne los nuevos datos de la Nota de Devolución a modificar)</h3>
                <?php
                    require '../../controller/notaDevolucionController.php';
                    $resultado = getPersonal();
                    $datos = getDatosNotaDevolucionEditar($_GET['notaEditar']);
                ?>
                <div class="box-tools pull-right">
                    <a href="../../index.php" class="btn btn-primary" title="Menú Inicio">
                    <span class="glyphicon glyphicon-home"></span></a>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->                    
            <form role="form" action="../../controller/notaDevolucionController.php" method="post">
                <!--  Lugar de butons y label y textbox  -->
                <div class="box-body">
                    <div class="col-lg-6">
                        <label><b>Nombre Personal: </b> <?php echo strtoupper(pg_result($datos,0,0)); ?></label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="personalEditar">
                            <?php 
                                $nroFilas = pg_num_rows($resultado);
                                for ($fila=0; $fila < $nroFilas; $fila++) { 
                                    echo '<option value="'.pg_result($resultado,$fila,0).'">'.pg_result($resultado,$fila,0).'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label>Fecha de Devolución</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" class="form-control pull-right" name="fechaEditar" value="<?php echo pg_result($datos,0,1); ?>">
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-lg-6">
                        <label> <b>Almacen Correspondiente: </b> <?php echo strtoupper(pg_result($datos,0,2)); ?> </label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="almacenEditar">
                            <?php 
                                $resultado = getAlmacenes();
                                $nroFilas = pg_num_rows($resultado);
                                for ($fila=0; $fila < $nroFilas; $fila++) { 
                                    echo '<option value="'.pg_result($resultado,$fila,0).'">'.pg_result($resultado,$fila,0).'</option>';
                                }
                            ?>
                        </select>
                        <input type="hidden" name="nroNotaEditar" value="<?php echo $_GET['notaEditar']; ?>">
                    </div>
                    <div class="col-lg-6">
                        <div class="col-md-6">
                            <br>
                            <a href="gestionNotasDevolucion.php">
                                <button type="button" style="border-radius: 15px;" class="btn btn-block btn-danger" title="Cancelar Cambios">Cancelar Cambios
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </a>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-block btn-success" style="border-radius: 15px;" title="Guardar Cambios">Guardar Cambios
                                <i class="fa fa-fw fa-check"></i>
                            </button>
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
            <!-- Termina tu codigo aqui -->
        </div>
    </section>
    <!-- fin de contenido de mi Vista -->
</div>
<?php
    include "../../view/theme/AdminLTE/Additional/scripts.php";
?>