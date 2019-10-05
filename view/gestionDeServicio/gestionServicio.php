<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Servicios
                <!-- <small>Blank example to the fixed layout</small> -->
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido de mi Vista -->
        <section class="content">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Gestion de Servicios</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-primary" title="Volver Atras">
                            <i class="fa fa-fw fa-arrow-circle-left"></i>
                        </button>
                    </div>
                </div>
                <!-- Inicia tu codigo aqui -->                    
                <form role="form" action="../../controller/servicioController.php" method="post">
                    <!--  Lugar de butons y label y textbox  -->
                    <div class="box-body">
                        <div class="col-lg-6">
                            <label>Id Servicio</label>
                            <input type="number" class="form-control" placeholder="número" name="id_servicio">
                        </div>
                        <div class="col-lg-6">
                            <label>Nombre del Servicio</label>
                            <input type="text" class="form-control" placeholder="Limpieza general de oficinas" name="nombre_servicio">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-lg-8">
                            <label>Descripcion</label>
                            <input type="text" class="form-control" placeholder="Descripcion del servicio" name="descricion">
                        </div>
                        <div class="col-lg-4">
                            <br>
                            <button type="submit" class="btn btn-block btn-success" title="Agregar Servicio">Agregar Registro
                                <i class="fa fa-fw fa-check"></i>
                            </button>
                        </div>
                    </div>
                    <!--  Lugar de butons y label y textbox  -->
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Servicios de la Empresa Jezoar</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id Servicio</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Actualizar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        include "../../model/Conexion.php";
                                        $conexion=new Conexion("localhost",5432,"jezoar","jezoar","123456");
                                        $result=$conexion->execute("SELECT servicio.id_servicio,nombre,detalle_servicio.detalle from servicio,detalle_servicio where servicio.id_servicio=detalle_servicio.id_servicio;");
                                        if (!$result) {
                                            die("Error en la consulta");
                                        }
                                        $nroFilas=pg_num_rows($result);
                                        if ($nroFilas>0) {
                                            for ($nroTupla=0; $nroTupla < $nroFilas; $nroTupla++){ 
                                                echo "<tr><td>".'<div contentEditable="false">'. pg_result($result,$nroTupla,0)."</div></td>";
                                                echo "<td>".'<div contentEditable="false">'.pg_result($result,$nroTupla,1)."</div> </td>";
                                                echo "<td>".'<div contentEditable="true">'.pg_result($result,$nroTupla,2)."</td>";
                                                echo '<td> <div class="btn-group">
                                                                <button type="button" class="btn btn-warning btn-sm" title="Actualizar">
                                                                    <i class="fa fa-fw fa-refresh"></i>
                                                                </button>
                                                                &nbsp
                                                                <button type="button" class="btn bg-maroon btn-sm" title="Editar">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                            </div>
                                                      </td> </tr>';
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </".>
                    </div>
                </form>
                <div class="box-footer">
                    <a href="hola" class="btn btn-block btn-social btn-facebook">
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
<script>
    
</script>