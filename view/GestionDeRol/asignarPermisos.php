<?php
include "../../view/theme/AdminLTE/Additional/head.php";
?>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Gestion de Permisos a Roles
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido de mi Vista -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Asignacion de Permisos a Rol <b><?php echo $_GET['nombRol'];?></b></h3>
                    <div class="box-tools pull-right">
                        <a href="gestionRol.php" class="btn btn-primary" title="Volver Atras">
                            <span class="fa fa-fw fa-mail-reply"></span></a>
                        <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Menú Inicio">
                            <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                    <form class="box-body" action="../../controller/rolController.php" method="post">
                        <br>
                        <div class="col-lg-5">
                            <p>
                                <b>Nota: </b> <br>
                                Usuario: <b><?php echo $_SESSION['user']?></b>, los permisos que se realizarán
                                en el rol <b><?php echo $_GET['nombRol'];?></b> son para las actividades que realiza los usuarios que estan acoplados en el rol de <b><?php echo $_GET['nombRol'];?></b>, por favor tome en cuenta el riesgo de uso de esta actividad. <br> <br>
                            </p>
                                <b>Lista de Permisos de <? echo strtoupper($_GET['nombRol']);?><br></b>
                                <?php
                                    require '../../controller/rolController.php';
                                    $resultado = getListaPermisosDeRol($_GET['codigoRolPermiso']);
                                ?>
                            <table class="table table-bordered table-hover" style="background-color: #F1948A">
                                <thead>
                                    <tr>
                                        <th class="text-center">Permisos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (pg_num_rows($resultado)<=0) {
                                            echo '<tr><td>Lista Vacia</td></tr>';
                                        }else{
                                            for ($permiso=0; $permiso < pg_num_rows($resultado); $permiso++) { 
                                                echo '<tr class="text-center">'.
                                                            '<td>'.pg_result($resultado,$permiso,0).'</td>
                                                            <td>'.'<a href="../../controller/rolController.php?idPermisoE='.pg_result($resultado,$permiso,1).'&idRolE='.$_GET['codigoRolPermiso'].'">
                                                            <button type="button" class="btn bg-red btn-xs btn-sm" title="Eliminar Servicio de Cotizacion">
                                                                <i class="fa fa-fw fa-trash-o"></i>
                                                            </button>
                                                        </a>'.'</td>'
                                                    .'</tr>';
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-block btn-success" style="border-radius: 15px;" title="Agregar Servicio">
                                Asignar Permisos a <?php echo $_GET['nombRol'];?>
                                <i class="fa fa-fw fa-check"></i>
                            </button>
                            <br>
                        </div>
                        <div class="col-lg-7">
                            <?php
                                $result = getListaPermisosAAsignarRol($_GET['codigoRolPermiso']);
                                $nroFilas = pg_num_rows($result);
                            ?>
                            <table class="table table-bordered table-hover" id="tabla1">
                                <tr>
                                    <?php
                                        if ($nroFilas>0) {
                                            echo '<td>#</td>
                                                  <td>Nombre de Permiso</td>';
                                        }else{
                                            echo '<td><b>Nota</b></td>';
                                        }
                                    ?>
                                </tr>
                                <tbody>
                                    <?php
                                        if ($nroFilas>0) {
                                            for ($nroFila=0; $nroFila<$nroFilas; $nroFila++){
                                                echo '<tr>';
                                                echo    '<td>
                                                            <input type="checkbox" name="idPermisos[]" value="'.pg_result($result,$nroFila,0).'">   '.pg_result($result,$nroFila,0).
                                                        '</td>';
                                                echo    '<td>'.
                                                        pg_result($result,$nroFila,1)
                                                        .'</td>';
                                                echo '</tr>';
                                            }
                                        }else{
                                            echo '<tr><td> No hay Mas Permisos a Asignar, el rol <b>'.$_GET['nombRol'].'</b> es  un Super Usuario</td></tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" name="coRolPermiso" value="<?php echo $_GET['codigoRolPermiso']; ?>">
                    </form>
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