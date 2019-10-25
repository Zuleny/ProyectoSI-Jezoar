<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>Olvidé mi Contraseña</h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido de mi Vista -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Alguien se Olvidó su contraseña UwU</h3>
                <div class="box-tools pull-right">
                    <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="volver al Login">
                    <span class="fa fa-fw fa-lock"></span></a>
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
                    <div class="col-lg-4">
                        <br>
                        <a href="asignacionRoles.php">
                            <button type="button" class="btn btn-block btn-primary" title="Asignar Roles">Asignar Roles a Usuarios
                                <i class="fa fa-fw fa-check"></i>
                            </button>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <label>Nombre Personal</label>
                            <?php echo sha1("Prof. Ruddy Quispe Mamani") ?>
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