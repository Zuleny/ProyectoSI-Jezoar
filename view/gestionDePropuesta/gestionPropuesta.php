<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>Gestion de Propuesta Jezoar</h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido -->
        <section class="content">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Registrar Propuesta</h3>
                    <div class="box-tools pull-right">
                        <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                        <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                </div>
                <!-- Inicia tu codigo aqui -->
                <!--Inicia datos de Proopuesta-->
                <form role="form" action="../../controller/propuestaController.php" method="post">
                    <div class="box-body">
                        <div class="col-lg-4">
                            <label>Nombre Cliente</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Margarita Cerezo Calderon">
                        </div>
                        <div class="col-lg-2">
                            <label>Cantidad de meses</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="6">
                        </div>
                        <div class="col-lg-2">
                            <label>Fecha</label>
                            <input type="text" name="fecha" class="form-control form-text" placeholder="2019-08-23">
                        </div>
                        <div class="col-lg-3">
                            <label>Estado</label>
                            <p><input type="radio" name="estado" value="A">Aceptadp</p>
                            <p><input type="radio" name="estado" value="D">Denegado</p>
                            <p><input type="radio" name="estado" value="R">Rechazado</p>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-block btn-success" style="border-radius: 15px;" name=InsertarPropuesta" title="Agregar Propuesta">Agregar Registro
                            <i class="fa fa-fw fa-check"></i>
                            </button>
                        </div>
                        <div class="col-lg-6"></div>
                        <div class="col-lg-3">
                            <a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeServicio/gestionServicio.php" target="_blank" id="etiqueta1">
                            ¿No encontro el servicio en la lista?
                            </a>
                        </div>
                    </div>
            
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Servicios</h3>
                        </div>
                        <div class="box-body" id="tabla1">
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
                            </table>
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
            </section>
        </div>
    </div>
    <?php
        include "../../view/theme/AdminLTE/Additional/scripts.php";
?>