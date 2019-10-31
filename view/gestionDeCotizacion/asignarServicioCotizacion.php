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
                    <h3 class="box-title">Asignación de Servicios a la Cotizacion # <? echo $_GET['codigo']?></h3>
                    <div class="box-tools pull-right">
                        <a href="gestionCotizacion.php" class="btn btn-primary" title="Volver Atras">
                        <span class="fa fa-fw fa-mail-reply"></span></a>
                        <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Menú Inicio">
                        <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                    <div class="box-body">
                        <form class="box-body" action="../../controller/cotizacionController.php" method="get">
                            <table class="table table-bordered table-hover" id="tabla1">
                                <thead>
                                    <tr>
                                        <th> </th>
                                        <th>#</th>
                                        <th>Nombre Servicio</th>
                                        <th>Descripción</th>
                                        <th>Area Trabajo</th>
                                        <th>Cantidad Personal</th>
                                        <th>Precio Unitario</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require "../../controller/cotizacionController.php";
                                        $result = getListaAsignacionServicioCotizacion($_GET['codigo']);
                                        $nroFilas = pg_num_rows($result);
                                        for ($i=0; $i < $nroFilas ; $i++) { 
                                            echo '<tr>';
                                            echo    '<td> <input type="checkbox" name=idServicio[] value="'.pg_result($result,$i,0).'"> </td>';
                                            echo    '<td>'.pg_result($result,$i,0).'</td>';
                                            echo    '<td>'.pg_result($result,$i,1).'</td>';
                                            echo    '<td>'.pg_result($result,$i,2).'</td>';
                                            echo    '<td> <input type="text" name="areaTrabajo[]" class="form-control" placeholder="Lugar de Trabajo de Trabajo"> </td>';
                                            echo    '<td> <input type="number" min="0" name="cantPersonas[]" class="form-control" placeholder="0"> </td>';
                                            echo    '<td><input type="number" step="0.01" min="0" name="precioUnitario[]" class="form-control" placeholder="0.0"> </td>';
                                            echo '</tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <div class="col-lg-4 pull-right">
                                <input type="hidden" name="codigo" value="<? echo $_GET['codigo'];?>">
                                <br>
                                <button type="submit" class="btn btn-block btn-success" title="Registrar Nota de Ingreso">Registrar En Almacen
                                <i class="fa fa-fw fa-street-view"></i>
                                </button>
                            </div>
                        </form>
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