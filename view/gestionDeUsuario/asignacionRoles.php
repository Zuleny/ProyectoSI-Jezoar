<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Gestion de Roles a Usuarios
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido de mi Vista -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Asignacion de Roles</h3>
                    <div class="box-tools pull-right">
                        <a href="gestionUsuario.php" class="btn btn-primary" title="Volver Atras">
                        <span class="fa fa-fw fa-mail-reply"></span></a>
                        <a onclick="history.back();" class="btn btn-primary" title="Menú Inicio">
                        <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                    <form class="box-body" action="../../controller/AsignarRolesController.php" method="post">
                        <div class="col-lg-5">
                            <div class="form-group col-md-12">
                                <h4><b>Nota: </b></h4>
                                <label>Nombre del Usuario</label>
                                <select class="form-control" name="nombrePersonal" >
                                    <?php
                                        require "../../controller/AsignarRolesController.php";
                                        $result=getListaUsuario();
                                        $nroFilas=pg_num_rows($result);
                                        for ($tupla=0; $tupla <$nroFilas ; $tupla++) { 
                                            echo'<option value="'.pg_result($result,$tupla,1).'">'.pg_result($result,$tupla,1).'</option>';
                                        }
                                    ?>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-block btn-success" title="Agregar Rol">Asignar Roles
                                    <i class="fa fa-fw fa-street-view"></i>
                                </button>
                                <br>
                                <a href="verRolesUsuario.php">
                                    <button type="button" class="btn btn-block btn-info" title="Mostrar Lista">Mostrar Roles de cada Usuario
                                        <i class="fa fa-fw fa-spinner"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="box-body">
                                <table class="table table-bordered table-hover" id="tabla1">
                                    <thead>
                                        <tr>
                                            <th>Código Rol</th>
                                            <th>Descripcion de Rol</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $result=getListaRols();
                                            $nroFilas=pg_num_rows($result);
                                            for ($tupla=0; $tupla <$nroFilas ; $tupla++) { 
                                                echo'<tr> 
                                                        <td>'.pg_result($result,$tupla,0).' 
                                                            <input type="checkbox" name="rolesUsuario[]" value="'.pg_result($result,$tupla,0).'"> 
                                                        </td>';
                                                echo   '<td>'.pg_result($result,$tupla,1).'</td>
                                                    </tr>';
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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