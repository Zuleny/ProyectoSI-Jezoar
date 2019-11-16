<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Permisos de Usuarios
                <small>Gestión de Usuario</small>
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido de mi Vista -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Editar Permiso # <?php echo $_GET['codPermiso']; 
                                                             require '../../controller/permisoController.php'; 
                                                             $result=getDatosPermisosEditar($_GET['codPermiso']); 
                                                           ?></h3>
                    <div class="box-tools pull-right">
                        <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                        <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                </div>
                <!-- Inicia tu codigo aqui -->                
                <form role="form" action="../../controller/permisoController.php" method="get">
                    <div class="box-body">
                        <input type="hidden" class="form-control" placeholder="#" name="codPermisoEditar" value="<?php echo $_GET['codPermiso'];?>">
                        <div class="col-lg-6">
                            <label>Nueva Descripción</label>
                            <input type="text" class="form-control" placeholder="nombre del servicio" name="descripcionPermisoEditar" value="<?php echo pg_result($result,0,0); ?>">
                        </div>  
                        <div class="col-lg-6 pull-right">
                            <br>
                            <div class="col-md-6">
                                <a href="gestionPermiso.php">
                                    <button type="button"  class="btn btn-block btn-danger" style="border-radius: 15px;" title="Cancelar Cambios">Cancelar Cambios 
                                        <i class="fa fa-fw fa-times"></i>
                                    </button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-block btn-success" style="border-radius: 15px;" title="Guardar Cambios">Guardar Cambios
                                    <i class="fa fa-fw fa-check"></i>
                                </button>
                            </div>
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