<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Asignación de Servicios a Cotización
                <small>Gestión de Servicio</small>
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido de mi Vista -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Asignación de Servicios a la Cotizacion # <?php echo $_GET['codigo']; ?></h3>
                    <div class="box-tools pull-right">
                        <a href="../gestionDeCotizacion/gestionCotizacion.php" class="btn btn-primary" title="Volver Atras">
                        <span class="fa fa-fw fa-mail-reply"></span></a>
                        <a href="../../index.php" class="btn btn-primary" title="Menú Inicio">
                        <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                    <div class="box-body">
                        <form class="box-body" action="../../controller/cotizacionController.php" method="get">
                            <div class="box-body">
                                <div class="col-lg-3">
                                    <label>Servicios</label>
                                    <select class="form-control" name="servicio">
                                        <?php 
                                            require '../../controller/cotizacionController.php';
                                            $datos = getDatos($_GET['codigo']);
                                            $resultado = getListaServiciosOfrecerCotizacion($_GET['codigo']);
                                            for ($nroServicio=0; $nroServicio < pg_num_rows($resultado); $nroServicio++) { 
                                                echo '<option value="'.pg_result($resultado,$nroServicio,0).'">'.pg_result($resultado,$nroServicio,1).'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-3">
                                    <label>Area Trabajo</label>
                                    <input type="text" class="form-control" placeholder="Ej. Oficinas" name="areaTrabajo">
                                </div>
                                <div class="col-lg-3">
                                    <label>Cantidad de Personas</label>
                                    <input type="number" class="form-control" min="1" value="1" name="cantPersonas">
                                </div>
                                <div class="col-lg-3">
                                    <label>Precio Unitario</label>
                                    <input type="number" class="form-control" step="0.01" min="0.00" value="0.00" name="precioUnitario">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="col-lg-3">
                                    <input type="hidden" name="codCotizacion" value="<?php echo $_GET['codigo']; ?>">
                                    <button type="submit" style="border-radius: 15px;" value="Agregar Servicio" name="asignarServicioCotizacion" class="btn btn-block btn-success" title="Agregar Servicio">
                                        Agregar Cotización 
                                        <i class="fa fa-fw fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">Lista de Cotizaciones</h3>
                            </div>
                            <div class="box-body">
                                <div class="col-lg-3">
                                    <p>
                                        <b>Detalles: </b><br>
                                        <b>Cliente: </b> <?php echo $datos[0]?> <br>
                                        <b>Fecha: </b> <?php echo date('d F Y',strtotime($datos[1]));?> <br>
                                        <b>Estado: </b> <?php 
                                                            if ($datos[2]=="Denegado") {
                                                                echo '<td><span class="label label-danger">Denegado</span></td>';
                                                            }else if ($datos[2]=="Aceptado") {
                                                                echo '<td><span class="label label-success">Aceptado</span></td>';
                                                            }else{
                                                                echo '<td><span class="label label-warning">Espera</span></td>';
                                                            }
                                                        ?> <br>
                                        <b>Precio Total: </b> <?php echo $datos[3];?> Bs. <br>
                                        <b>Descripción:  </b><br> <?php echo $datos[4];?><br>
                                    </p>
                                </div>
                                <div class="col-lg-9">
                                    <table class="table table-bordered table-hover" id="tabla1">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> Nombre </th>
                                                <th> Area de Trabajo </th>
                                                <th> Cantidad De Personal </th>
                                                <th> Precio Unitario </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $listaServicios = getListaServiciosCotizacion($_GET['codigo']);
                                                $nroFilas = pg_num_rows($listaServicios);
                                                for ($tupla = 0; $tupla < $nroFilas ; $tupla++) { 
                                                    echo '<tr>';
                                                    echo '<td>'.pg_result($listaServicios,$tupla,0).'</td>';
                                                    echo '<td>'.pg_result($listaServicios,$tupla,1).'</td>';
                                                    echo '<td>'.pg_result($listaServicios,$tupla,2).'</td>';
                                                    echo '<td>'.pg_result($listaServicios,$tupla,3).'</td>';
                                                    echo '<td>'.pg_result($listaServicios,$tupla,4).'</td>';
                                                    echo '<td>
                                                            <a href="../../controller/cotizacionController.php?codigoCotDelete='.$_GET['codigo'].'&idDetService='.pg_result($listaServicios,$tupla,0).'">
                                                                <button type="button" class="btn bg-red btn-xs btn-sm" title="Eliminar Servicio de Cotizacion">
                                                                    <i class="fa fa-fw fa-trash-o"></i>
                                                                </button>
                                                            </a>
                                                          </td>';
                                                    echo '</tr>';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="https://www.facebook.com/Jezoar-228770924276961/" id="linkFacebook" target="_blank"class="btn btn-block btn-social btn-facebook">
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