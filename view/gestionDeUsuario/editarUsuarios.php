<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Usuarios
            <small>Gestión de Usuarios</small>
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido de mi Vista -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Modificación del Usuario # <?php echo $_GET['codUser']; ?></h3>
                <div class="box-tools pull-right">
                    <a href="../../index.php" class="btn btn-primary" title="Menú Inicio">
                    <span class="glyphicon glyphicon-home"></span></a>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->                    
            <?php
                require "../../controller/usuarioController.php";
                $lista = getListaPersonalEdit();
                $resultado = getDatosUsuarioEditar( $_GET['codUser'] );
            ?>
            <form role="form" action="../../controller/usuarioController.php" method="post">
                <!--  Lugar de butons y label y textbox  -->
                <div class="box-body">
                    <div class="col-lg-4">
                        <label>Nombre de Usuario</label>
                        <input type="text" class="form-control" placeholder="Ej. messi" name="nombreEditar" value="<?php echo pg_result($resultado,0,0); ?>">
                    </div>
                    <div class="col-lg-4">
                        <label>Contraseña (OBLIGATORIO)</label>
                        <input type="password" class="form-control" placeholder="Contraseña Máx. 6 caracteres" name="passwordEditar">
                        <input type="hidden" name="codUsuarioEditar" value="<?php echo $_GET['codUser']; ?>">
                    </div>
                    <div class="col-lg-4">
                        <label><b>Personal: </b> <?php echo strtoupper(pg_result($resultado,0,3)); ?></label>
                        <select class="form-control" name="nombrePEditar" >
                            <?php
                                echo $lista;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-lg-2">
                        <p>
                            <b>Nota:</b><br>
                            Pregunta y Respuesta de seguridad serán modificadas, <b>no olvide</b> que con ello usted podrá restablecer su cuenta.
                        </p>
                    </div>
                    <div class="col-lg-5">
                        <label>Pregunta de Seguridad</label>
                        <input type="text" class="form-control" placeholder="Ej. ¿Quién descubrió América?" name="pregEditar" value="<?php echo pg_result($resultado,0,1); ?>">
                    </div>
                    <div class="col-lg-5">
                        <label>Respuesta de Seguridad</label>
                        <input type="text" class="form-control" placeholder="Nueva Respuesta" name="respEditar">
                    </div>
                    <div class="col-lg-5">
                        <br>
                        <a href="gestionUsuario.php">
                            <button type="button" class="btn btn-block btn-danger" style="border-radius: 15px;" title="Cancelar Cambios">Cancelar Cambios
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </a>
                    </div>
                    <div class="col-lg-5">
                        <br>
                        <button type="submit" class="btn btn-block btn-success" style="border-radius: 15px;" title="Guardar Cambios">Guardar Cambios
                            <i class="fa fa-fw fa-check"></i>
                        </button>
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