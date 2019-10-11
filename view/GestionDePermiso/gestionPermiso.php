<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Permisos de Usuario
            <!-- <small>Blank example to the fixed layout</small> -->
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido de mi Vista -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Gestion de Permisos</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-primary" title="Volver Atras">
                        <i class="fa fa-fw fa-arrow-circle-left"></i>
                    </button>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->                    
            <form role="form" action="../../controller/permisoController.php" method="get">
                <!--  Lugar de butons y label y textbox  -->
                <div class="box-body">
                    <div class="col-lg-8">
                        <label>Descripcion del Permiso</label>
                        <input type="text" class="form-control" placeholder="Gestion de Clientes" name="descripcion_permiso">
                    </div>
                    <div class="col-lg-4">
                        <br>
                        <button type="submit" class="btn btn-block btn-success" title="Agregar Servicio">Agregar Permiso
                            <i class="fa fa-fw fa-gear"></i>
                        </button>
                    </div>
                </div>
                <!--  Lugar de butons y label y textbox  -->
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Lista de Permisos del Uusario del Sistema</h3>
                    </div>
                    <div class="box-body" style="scrollbar">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descripcion del Permiso</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    require '../../controller/permisoController.php';
                                    $printer=getListaDePermisos();
                                    echo $printer;
                                ?>
                            </tbody>
                        </table>
                    </".>
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