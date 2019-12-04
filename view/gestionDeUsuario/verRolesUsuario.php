<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>Roles de los Usuarios</h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido de mi Vista -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Roles de Usuario</h3>
                <div class="box-tools pull-right">
                    <a onclick="history.back();" class="btn btn-primary" title="Volver Atras">
                    <span class="fa fa-fw fa-arrow-circle-left"></span></a>
                    <a href="../../index.php" class="btn btn-primary" title="Menú Inicio">
                    <span class="glyphicon glyphicon-home"></span></a>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->                    
            <div class="col-xs-12">
                <div class="box-group">
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover" style="background-color: #F1948A">
                            <tbody>
                                <tr>
                                    <th>Codigo Usuario</th>
                                    <th>Usuario</th>
                                    <th>Codigo Rol</th>
                                    <th>Rol</th>
                                    <th>Nombre Personal</th>
                                    <th>Acciones</th>
                                </tr>
                                <?php 
                                    require '../../controller/AsignarRolesController.php';
                                    $resultado = getListaRolesUsuario();
                                    $nroFilas = pg_num_rows($resultado);
                                    for ($nroFila=0; $nroFila < $nroFilas; $nroFila++) { 
                                        echo '<tr>
                                                <td>'.pg_result($resultado,$nroFila,0).'</td>
                                                <td>'.pg_result($resultado,$nroFila,1).'</td>
                                                <td>'.pg_result($resultado,$nroFila,2).'</td>
                                                <td>'.pg_result($resultado,$nroFila,3).'</td>
                                                <td>'.pg_result($resultado,$nroFila,4).'</td>
                                                <td> 
                                                    <div class="btn-group">                                                      
                                                        <a href="../../controller/usuarioController.php?codUsuarioEliminar='.pg_result($resultado,$nroFila,0).'&codRolEliminar='.pg_result($resultado,$nroFila,2).'">
                                                            <button type="button" class="btn btn-danger btn-xs" title="Eliminar">
                                                                <i class="fa fa-fw fa-trash-o"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <div class="box-footer">
                <a href="https://www.facebook.com/Jezoar-228770924276961/" target="_blank"class="btn btn-block btn-social btn-facebook">
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