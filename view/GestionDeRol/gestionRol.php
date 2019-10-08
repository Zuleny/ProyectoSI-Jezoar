<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Roles de Usuario
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido de mi Vista -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Gestion de Roles</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-primary" title="Volver Atras">
                            <i class="fa fa-fw fa-arrow-circle-left"></i>
                        </button>
                    </div>
                    <form class="box-body" action="../../controller/rolController.php" method="post">
                        <div class="col-lg-5">
                            <div class="form-group col-md-12">
                                <h4><br>Nota: </b></h4>
                                <p>
                                Los Usuarios al registrarse tendran que tener algun rol 
                                para poder navegar por el sistema, es importante tener a sus usuarios
                                con algun Rol.
                                </p>
                                <label>Descripcion de Rol</label>
                                <input type="text" class="form-control" placeholder="Descripcion de Rol de Usuario" name="descripcionRol">
                                <br>
                                <button type="submit" class="btn btn-block btn-success" title="Agregar Rol">Agregar Rol de Usuario
                                    <i class="fa fa-fw fa-floppy-o"></i>
                                </button>
                                <button type="submit" class="btn btn-block btn-primary" title="Asignar Permisos">Asignar Roles a Usuarios
                                    <i class="fa fa-fw fa-floppy-o"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="box-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Codigo Rol</th>
                                            <th>Descripcion de Rol</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            require "../../controller/rolController.php";
                                            $role=gestionRol();
                                            echo $role;
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
<script>
    
</script>