<!DOCTYPE html>
<html>
<head>
    <?php
        include "../../view/theme/AdminLTE/Additional/head.php";
    ?>
</head>
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php
            include "../../view/theme/AdminLTE/Additional/header.php";
            include "../../view/theme/AdminLTE/Additional/aside.php";
        ?>
        <div class="content-wrapper">
            <!-- Titulo de la cabecera -->
            <section class="content-header">
                <h1>
                    Almacen
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
            </section>
            <!-- Fin de la cabecera -->
            <!-- contenido -->
            <section class="content">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Almacen</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-primary" title="Volver Atras">
                            <i class="fa fa-fw fa-arrow-circle-left"></i></button>
                        </div>
                    </div>
                   <!-- Inicia tu codigo aqui -->          
                    <form role="form" action="../../controller/almacenController.php" method="get">
                        <!--  Lugar de butons y label y textbox  -->
                        <form class="login-box">
                        <div class="box-body">
                            <div class="col-lg-6">
                                <label>Codigo de Almacen</label>
                                <input type="text" class="form-control" name="codigo" placeholder="número" method="post">
                            </div>
                            <div class="col-lg-6">
                                <label>Nombre del Almacen</label>
                                <input type="text" class="form-control" name="Almacen" placeholder="nombre del almacen">
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-8">
                                <label>Direccion</label>
                                <input type="text" class="form-control" name="Dir" placeholder="Direccion del Almacen">
                            </div>
                            <div class="col-lg-4">
                                <br>
                                <button type="submit" value="Agregar Almacen" class="btn btn-block btn-success" title="Agregar Almacen">Agregar Registro
                                <i class="fa fa-fw fa-check"></i></button>
                            </div>
                        </div>
                    </form>
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">Almacenes de la Empresa Jezoar</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Codigo Almacen</th>
                                            <th>Nombre</th>
                                            <th>Direccion</th>
                                            <th>Actualizar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include "../../model/Conexion.php";
                                            $conexion=new Conexion("localhost",5432,"jezoar","jezoar","123456");
                                            $result=$conexion->execute("SELECT cod_almacen,nombre,direccion from Almacen;");
                                            if (!$result) {
                                                die("Error en la consulta");
                                            }
                                            $nroFilas=pg_num_rows($result);
                                            if ($nroFilas>0) {
                                                for ($nroTupla=0; $nroTupla < $nroFilas; $nroTupla++){ 
                                                    echo "<tr> <td>". pg_result($result,$nroTupla,0)."</td>";
                                                    echo "<td>".'<div contentEditable="false">'. pg_result($result,$nroTupla,1)."</div></td>";
                                                    echo "<td>".'<div contentEditable="false">'. pg_result($result,$nroTupla,2)."</div></td>";
                                                    echo '<td> 
                                                                <div class="btn-group">                                               
                                                                    <button type="button" class="btn btn-warning btn-xs" title="Actualizar">
                                                                        <i class="fa fa-fw fa-refresh"></i>
                                                                    </button>
                                                                    <button type="button" class="btn bg-purple btn-xs" title="Editar">
                                                                        <i class="fa fa-edit"></i>
                                                                    </button>
                                                                </div>
                                                            </td> 
                                                        </tr>';            
                                                }
                                            }
                                            
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                    <div>
                        <a href="https://www.facebook.com/Jezoar-228770924276961/" target="_blank"class="btn btn-block btn-social btn-facebook">
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
        include "../../view/theme/AdminLTE/Additional/scripts.php";
    ?>
</body>