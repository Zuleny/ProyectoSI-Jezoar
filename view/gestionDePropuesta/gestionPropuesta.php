<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>Gestion de Propuesta<small>Jezoar</small></h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido -->
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Registrar Propuesta</h3>
                <div class="box-tools pull-right">
                        <button type="button" class="btn btn-primary" title="Volver Pag. Atras">
                            <i class="fa fa-fw fa-arrow-circle-left"></i>
                        </button>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->
            <!--Inicia datos de Proopuesta-->
            <div class="form-group">
                <label>Codigo de Propuesta</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="120">
            </div>
            <div class="form-group">
                <label>Nombre Cliente</label>
                <input type="text" id="nombre" name="nombre" class="form-control"
                    placeholder="Margarita Cerezo Calderon">
            </div>
            <div class="form-group">
                <label>Cantidad de meses</label>
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="6">
            </div>
            <form name="formulario" method="post" action="http://pagina.com/send.php">
                <!-- Campo de entrada de mes -->
                <b>Fecha:</b>
                <input type="month" name="mes" value="2019-09" min="2017-01" max="2019-12" step="2">
            </form>
            <hr/>
            <p>
                <hr style="border:30px;">
            </p>
            <!--RadioGroup-->
            <!-- Group of default radios - option 1 -->
            <div class="custom-control custom-radio">
                <p>
                    <h4><b>Estado:</b></h4>
                </p>
                <input type="radio" class="custom-control-input" id="defaultGroupExample1" name="groupOfDefaultRadios">
                    <label class="custom-control-label" for="defaultGroupExample1">Aceptado</label>
            </div>
            <!-- Group of default radios - option 2 -->
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="defaultGroupExample2" name="groupOfDefaultRadios" checked>
                    <label class="custom-control-label" for="defaultGroupExample2">Denegado</label>
            </div>
            <!-- Group of default radios - option 3 -->
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="defaultGroupExample3" name="groupOfDefaultRadios">
                <label class="custom-control-label" for="defaultGroupExample3">Rechazado</label>
            </div>
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">Nuevo Servicio +</button>
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Lista de Servicios</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Seleccionar</th>
                                <th>Actualizar</th>
                                <th>Eliminar</th>
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
                                        </div></td>';
                                        

                                        echo '<td>  <div class="btn-group">
                                                        <button type="button" class="btn btn-warning btn-sm" title="Actualizar">
                                                            <i class="fa fa-fw fa-refresh"></i>
                                                        </button>
                                                    </div></td>';
                                        echo '<td>  <div class="btn-group">
                                        <button type="button" class="btn btn-warning btn-sm" title="Actualizar">
                                        <i class="fa fa-trash"></i>
                                                </div></td> </tr>';
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Termina tu codigo aqui -->
    </section>
</div>
<?php
    include "../../view/theme/AdminLTE/Additional/scripts.php";
?>