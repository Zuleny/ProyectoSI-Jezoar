<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Cotización
            <small>Gestión de Servicio</small>
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Modificación de Cotización # <? echo $_GET['codigo']; ?> (Nota: Asigne los nuevos datos de la cotización a modificar)</h3>
                <div class="box-tools pull-right">
                    <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Menú Inicio">
                    <span class="glyphicon glyphicon-home"></span></a>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->                    
            <?php
                require '../../controller/cotizacionController.php';
                $result = getDatosEditarCotizacion($_GET['codigo']);
            ?>
            <form role="form" action="../../controller/cotizacionController.php" method="post">
                <!--  Lugar de butons y label y textbox  -->
                <div class="box-body">
                    <div class="col-lg-4">
                        <label>Fecha</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        <input type="date" class="form-control" name="fechaEditar" value="<?php echo pg_result($result,0,0); ?>">
                    </div>
                    </div>
                    <div class="col-lg-4">
                        <label> <b>Nombre Cliente:</b> <?php echo pg_result($result,0,1); ?> </label>
                        <select class="form-control" name="nombreClienteEditar" >
                            <?php
                                $lista = getListaClienteEditar();
                                echo $lista;
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label>Cantidad de Dias</label>
                        <input type="number" class="form-control" placeholder="Ingrese Cantidad" name="diasEditar" value="<?php echo pg_result($result,0,2) ?>">
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-lg-4">
                        <label>Precio Total</label>
                        <input type="text" class="form-control" step="0.01" placeholder="Precio Total" disabled value="<?php echo pg_result($result,0,3);?> Bs.">
                        <input type="hidden" name="codigo" value="<?php echo $_GET['codigo']; ?>">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="option"> <b>Tipo de Servicio: </b> <?php echo "Limpieza ".pg_result($result,0,4) ?> </label>
                        <select class="form-control" name="tipoServicioEditar">
                            <option value="Profunda">Limpieza Profunda</option>
                            <option value="Post-Obra">Limpieza Post-Obra</option>
                            <option value="Oficinas">Limpieza de Oficinas</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label> <b>Material: </b> <?php echo (pg_result($result,0,5)=='S')? "Con Material" : "Sin Material" ?> </label>
                            <br>
                            <div class="col-md-6">
                                <p><input type="radio" name="estadoMEditar" value="S"> Con Material</p>
                            </div>
                            <div class="col-md-6">
                                <p><input type="radio" name="estadoMEditar" value="N"> Sin Material</p>
                            </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-lg-8 form-group">
                        <?php
                            if(pg_result($result,0,6)=="Denegado"){
                                $printer = '<span class="label label-danger">Denegado</span>';
                            }else if(pg_result($result,0,6)=="Aceptado"){
                                $printer = '<span class="label label-success">Aceptado</span>';
                            }else{
                                $printer = '<span class="label label-warning">Espera</span>';
                            }
                        ?>
                        <label> <b>Estado: </b> <?php echo $printer; ?> </label>
                        <br>
                            <div class="col-md-4">
                                <p><input type="radio" name="estadoPEditar" value="Aceptado"> Cotización Aceptado </p>
                            </div>
                            <div class="col-md-3">
                                <p><input type="radio" name="estadoPEditar" value="Espera"> En Espera </p>
                            </div>
                            <div class="col-md-4">
                                <p><input type="radio" name="estadoPEditar" value="Denegado"> Cotización Denegado </p>    
                            </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="col-md-6">
                            <br>
                            <a href="gestionCotizacion.php">
                                <button type="button" style="border-radius: 15px;" class="btn btn-block btn-danger" title="Cancelar Cambios">Cancelar<i class="fa fa-fw fa-times"></i></button>
                            </a>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-block btn-success" style="border-radius: 15px;" title="Agregar Cotizacion">Modificar <i class="fa fa-fw fa-check"></i></button>
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