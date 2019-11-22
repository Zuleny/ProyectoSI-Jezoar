<?php
include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1> Gestion Lista de Servicios</h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido de mi Vista -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Listado de Servicios</h3>
                <div class="box-tools pull-right">
                    <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                        <span class="glyphicon glyphicon-home"></span></a>
                </div>
            </div>
            <form class="box-body" action="../../controller/propuestaController.php" method="post">
                <div class="box-body">
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-block btn-success" id="button1" style="border-radius: 15px;" title="Registrar Servicio">Registrar Servicio</button>
                    </div>
                    <div class="col-lg-5"></div>
                    <div class="col-lg-3">
                        <br> <br>
                        <a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeServicio/gestionServicio.php">¿No encontro el servicio en la lista?</a>
                    </div>
                </div>

                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Servicios</h3>
                    </div>
                    <div class="box-body"  id="tabla1">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Seleccionar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            include "../../model/Conexion.php";
                            $conexion=new Conexion("localhost",5432,"jezoar","jezoar","'123456'");
                            $result=$conexion->execute("SELECT nombre,detalle_servicio.detalle from servicio,detalle_servicio where servicio.id_servicio=detalle_servicio.id_servicio;");
                            if (!$result) {
                                die("Error en la consulta");
                            }
                            $nroFilas=pg_num_rows($result);
                            if ($nroFilas>0) {
                                for ($nroTupla=0; $nroTupla < $nroFilas; $nroTupla++){
                                    echo "<tr> <td>". pg_result($result,$nroTupla,0)."</td>";
                                    echo "<td>". pg_result($result,$nroTupla,1)."</td>";
                                    echo '<td>  <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                            <label class="form-check-label" for="defaultCheck1">
                                                            </label>
                                                            </div></td></tr>';
                                }
                            }
                            ?>
                            </tbody>
                            <div class="modal fade" id="modal-default">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"></span>
                                            </button>
                                            <h4 class="modal-title">Modificar</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Nombre Insumo</label>
                                                <input type="text" class="form-control" placeholder="Cera" name="nombreInsumoModifcar">
                                                <br>
                                                <label>Cantidad</label>
                                                <input type="text" class="form-control" placeholder="45" name="CAntidadModifcar">
                                                <br>
                                                <label>Precio Unitario</label>
                                                <input type="text" class="form-control" placeholder="12.5" name="PrecioUnitarioModifcar">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-danger pull-left" type="button" data-dismiss="modal">Cancelar</button>
                                            <button class="btn btn-success" type="button">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </table>
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
        <!-- Termina tu codigo aqui -->
    </section>
</div>
<?php
include "../../view/theme/AdminLTE/Additional/scripts.php";
?>
