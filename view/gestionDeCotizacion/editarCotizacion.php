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
                    <a href="../../index.php" class="btn btn-primary" title="Menú Inicio">
                    <span class="glyphicon glyphicon-home"></span></a>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->                    
            <?php
                require '../../controller/cotizacionController.php';
                $lista=getListaCliente();
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
                        <input type="date" class="form-control" name="fechaE" value="<?php echo pg_result($result,0,0); ?>">
                        </div>
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>Nombre Cliente : <b><?php echo pg_result($result,0,1); ?></b></label>
                        <select class="form-control" name="nombreClienteE" >
                            <?php
                                echo $lista
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <br>
                        <a href="../GestionDeCliente/gestionCliente.php">
                            <button class="btn bg-aqua-active" title="Agregar Nuevo Cliente" type="button">
                                <i class="fa fa-fw fa-child"></i>
                            </button>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <label>Cantidad de Dias</label>
                        <input type="number" class="form-control" placeholder="Ingrese Cantidad" name="diasE" value="<?php echo pg_result($result,0,2); ?>" min="1">
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-lg-4">
                        <label>Precio Total</label>
                        <input type="text" class="form-control" step="0.01" placeholder="Precio Total" value="<?php echo pg_result($result,0,3); ?> Bs." disabled>
                        <input type="hidden" name="precioE" value="<?php echo pg_result($result,0,3); ?>">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="option">Tipo de Servicio: <b><?php echo pg_result($result,0,4); ?></b></label>
                        <select class="form-control" name="servicioE">
                            <option value="Profunda">Limpieza Profunda</option>
                            <option value="Post-Obra">Limpieza Post-Obra</option>
                            <option value="Oficinas">Limpieza de Oficinas</option>
                        </select>
                    </div>
                    <div class="col-lg-4" style="background-color: #D4EFDF;">
                        <label>Material: <b><?php if (pg_result($result,0,5)==='S') {
                                                      echo '<td><i class="fa fa-fw fa-check"></i></td>';
                                                  }else{
                                                      echo '<td><i class="fa fa-fw fa-remove"></i></td>';
                                                  }?></b></label>
                            <br>
                            <div class="col-md-6">
                                <p><input type="radio" name="estadoME" value="S"> Con Material</p>
                            </div>
                            <div class="col-md-6">
                                <p><input type="radio" name="estadoME" value="N"> Sin Material</p>
                            </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-lg-7" style="background-color: #D4EFDF;">
                        <br>
                        <label>Estado: <b><?php 
                                                if (pg_result($result,0,6)=="Denegado") {
                                                    echo '<td><span class="label label-danger">Denegado</span></td>';
                                                }else if (pg_result($result,0,6)=="Aceptado") {
                                                    echo '<td><span class="label label-success">Aceptado</span></td>';
                                                }else{
                                                    echo '<td><span class="label label-warning">Espera</span></td>';
                                                }
                                            ?></b></label>
                        <br>
                            <div class="col-md-4">
                                <p><input type="radio" name="estadoPE" value="Aceptado"> Cotización Aceptado</p>
                            </div>
                            <div class="col-md-3">
                                <p><input type="radio" name="estadoPE" value="Espera"> En Espera</p>
                            </div>
                            <div class="col-md-4">
                                <p><input type="radio" name="estadoPE" value="Denegado"> Cotización Denegado</p>    
                            </div>
                    </div>
                    <div class="col-lg-5">
                        <label>Descripcion de Servicios</label>
                        <textarea class="form-control" name="descripcionServicioE" required rows="2"> <?php echo pg_result($result,0,7); ?> </textarea>
                    </div>

                </div>
                <div class="box-body">
                    <div class="col-lg-4">
                        <a href="gestionCotizacion.php">
                            <button type="button" style="border-radius: 15px;" class="btn btn-block btn-danger" title="Cancelar Cambios">Cancelar Cambios<i class="fa fa-fw fa-check"></i></button>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <input type="hidden" name="codigo" value="<? echo $_GET['codigo']; ?>">
                        <button type="submit" style="border-radius: 15px;" name="modificarCotizacion" class="btn btn-block btn-success" title="Aceptar Cambios">Aceptar Cambios<i class="fa fa-fw fa-check"></i></button>
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