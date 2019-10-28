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
                    <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                    <span class="glyphicon glyphicon-home"></span></a>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->                    
            <form role="form" action="../../controller/usuarioController.php" method="post">
                <!--  Lugar de butons y label y textbox  -->
                <div class="box-body">
                    <div class="col-lg-4">
                        <label>Nombre de Usuario</label>
                        <input type="text" class="form-control" placeholder="laura@rodriguez" name="nombreUser">
                    </div>
                    <div class="col-lg-5">
                        <label>Contraseña</label>
                        <input type="password" class="form-control" placeholder="Contraseña Max 6 caracteres" name="passwordUser">
                    </div>
                    <div class="col-lg-3">
                        <label>Nombre Personal</label>
                        <select class="form-control" name="nombrePersonal" >
                            <?php
                                require "../../controller/usuarioController.php";
                                $lista=getListaPersonal();
                                echo $lista;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-lg-2">
                        <p>
                            <b>Nota:</b>
                            Pregunta y Respuesta de seguridad se le solicitará cuando olvide su contraseña, con ello usted podrá recuperarla.
                        </p>
                    </div>
                    <div class="col-lg-5">
                        <label>Pregunta de Seguridad</label>
                        <input type="text" class="form-control" placeholder="Ej. ¿Quién descubrió América?" name="pregUsuario">
                    </div>
                    <div class="col-lg-5">
                        <label>Respuesta de Seguridad</label>
                        <input type="text" class="form-control" placeholder="Ej. Cristobal Colón" name="respUsuario">
                    </div>
                    <div class="col-lg-5">
                        <br>
                        <button type="submit" class="btn btn-block btn-success" title="Agregar Usuario">Agregar Usuario
                            <i class="fa fa-fw fa-check"></i>
                        </button>
                    </div>
                    <div class="col-lg-5">
                        <br>
                        <a href="asignacionRoles.php">
                            <button type="button" class="btn btn-block btn-primary" title="Asignar Roles">Asignar Roles a Usuarios
                                <i class="fa fa-fw fa-check"></i>
                            </button>
                        </a>
                    </div>
                </div>
                <!--  Lugar de butons y label y textbox  -->
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Lista de Usuarios del Sistema</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover" id="tabla1">
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
                                    $lista=getListaDeUsuarios();
                                    echo $lista;
                                ?>
                            </tbody>
                        </table>
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
        </div>
    </section>
    <!-- fin de contenido de mi Vista -->
</div>
<?php
    include "../../view/theme/AdminLTE/Additional/scripts.php";
?>