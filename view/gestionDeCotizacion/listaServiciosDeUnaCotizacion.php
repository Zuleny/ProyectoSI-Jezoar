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
                <h3 class="box-title">Lista de Servicios De La Cotización # <? echo $_GET['codigo']?></h3>
                <div class="box-tools pull-right">
                    <a href="gestionCotizacion.php" class="btn btn-primary" title="Volver Atras">
                    <span class="fa fa-fw fa-mail-reply"></span></a>
                    <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Menú Inicio">
                    <span class="glyphicon glyphicon-home"></span></a>
                </div>
            </div>
            <div class="box-body">
                <?php
                    require '../../controller/cotizacionController.php';
                    $datos = getDatos($_GET['codigo']);
                ?>
                <p>
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
                    <b>Precio Total: : </b> <?php echo $datos[3];?> Bs. <br>
                </p>
            </div>
            <!--  Tabla de Cotizaciones  -->
            <div class="box-body" style="overflow:scroll">
                <table class="table table-bordered table-hover" id="tabla1">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Nombre </th>
                            <th> Detalle </th>
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
                                echo '<td>'.pg_result($listaServicios,$tupla,5).'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <!--  FIN Tabla de Cotizaciones  -->
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