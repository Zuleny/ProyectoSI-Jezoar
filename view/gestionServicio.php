<!DOCTYPE html>
<html>
<head>
    <?php
        include "theme2/AdminLTE/Additional/head.php";
    ?>
</head>
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php
            include "theme2/AdminLTE/Additional/header.php";
            include "theme2/AdminLTE/Additional/aside.php";
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
            <!-- contenido -->
            <section class="content">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Gestion de Servicios</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-primary" title="Volver Atras">
                            <i class="fa fa-fw fa-arrow-circle-left"></i></button>
                        </div>
                    </div>
                   <!-- Inicia tu codigo aqui -->                    
                    <form role="form">
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box-body">
                            <div class="col-lg-6">
                                <label>Id Servicio</label>
                                <input type="text" class="form-control" placeholder="número">
                            </div>
                            <div class="col-lg-6">
                                <label>Nombre del Servicio</label>
                                <input type="text" class="form-control" placeholder="Limpieza general de oficinas">
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-8">
                                <label>Descripcion</label>
                                <input type="text" class="form-control" placeholder="Descripcion del servicio">
                            </div>
                            <div class="col-lg-4">
                                <br>
                                <button type="button" class="btn btn-block btn-success" title="Agregar Servicio">Agregar Registro <i class="fa fa-fw fa-check"></i></button>
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
                                    <!--<tbody>
                                        <?php
                                            include "Conexion.php";
                                            $conexion=new Conexion("localhost",5432,"jezoar","jezoar","123456");
                                            $result=$conexion->execute("SELECT servicio.id_servicio,nombre,detalle_servicio.detalle from servicio,detalle_servicio where servicio.id_servicio=detalle_servicio.id_servicio;");
                                            if (!$result) {
                                                die("Error en la consulta");
                                            }
                                            $nroFilas=pg_num_rows($result);
                                            if ($nroFilas>0) {
                                                for ($nroTupla=0; $nroTupla < $nroFilas; $nroTupla++){ 
                                                    echo "<tr> <td>". pg_result($result,$nroTupla,0)."</td>";
                                                    echo "<td>". pg_result($result,$nroTupla,1)."</td>";
                                                    echo "<td>". pg_result($result,$nroTupla,2)."</td>";
                                                    echo '<td>  <div class="btn-group">
                                                                    <button type="button" class="btn btn-warning btn-sm" title="Actualizar">
                                                                        <i class="fa fa-fw fa-refresh"></i>
                                                                    </button>
                                                                </div></td> </tr>';
                                                }
                                            }
                                        ?>
                                    </tbody>-->
                                </table>
                            </div>
                        </div>
                    </form>
                    <div>
                        <a href="hola" class="btn btn-block btn-social btn-facebook">
                            <i class="fa fa-facebook"></i>
                            Página de Facebook de Jezoar
                        </a>
                    </div>
                    <!-- Termina tu codigo aqui -->
                </div>
            </section>
        </div>
    </div>
    <?php
        include "theme2/AdminLTE/Additional/scripts.php";
    ?>
</body>