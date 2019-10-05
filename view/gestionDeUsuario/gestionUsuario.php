<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>Gestion de Usuarios</h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido de mi Vista -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Usuario</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-primary" title="Volver Atras">
                        <i class="fa fa-fw fa-arrow-circle-left"></i>
                    </button>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->                    
            <form role="form" action="../../controller/usuarioController.php" method="post">
                <!--  Lugar de butons y label y textbox  -->
                <div class="box-body">
                    <div class="col-lg-6">
                        <label>Nombre de Usuario</label>
                        <input type="text" class="form-control" placeholder="Juanito@ArcoIris" name="nombreUser">
                    </div>
                    <div class="col-lg-6">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" placeholder="Contraseña Max 6 caracteres" name="passwordUser">
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-lg-6">
                        <label>Nombre Personal</label>
                        <select class="form-control" name="nombrePersonal" >
                            <?php
                                include "../../model/Conexion.php";
                                $conexion=new Conexion();
                                $result=$conexion->execute("select nombre from Personal;");
                                $nroFilas=pg_num_rows($result);
                                for ($tupla=0; $tupla < $nroFilas ; $tupla++) { 
                                    echo '<option value="'.pg_result($result,$tupla,0).'">'.pg_result($result,$tupla,0).'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <br>
                        <button type="submit" class="btn btn-block btn-success" title="Agregar Usuario">Agregar Usuario
                            <i class="fa fa-fw fa-check"></i>
                        </button>
                    </div>
                </div>
                <!--  Lugar de butons y label y textbox  -->
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Lista de Usuarios del Sistema</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Codigo Usuario</th>
                                    <th>Nombre</th>
                                    <th>Nombre de Persona</th>
                                    <th>Modificaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $result=$conexion->execute("SELECT cod_usuario,nombre,getNombrePersona(id_personal_usuario) FROM usuario;");
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