<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Servicio
                <small>Gestión de Servicios</small>
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido de mi Vista -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Gestion de Servicios</h3>
                    <div class="box-tools pull-right">
                        <a href="../../index.php" class="btn btn-primary" title="Menú Inicio">
                        <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                </div>
                <!-- Inicia tu codigo aqui -->                    
                <form role="form" action="../../controller/servicioController.php" method="post">
                    <!--  Lugar de butons y label y textbox  -->
                    <div class="box-body">
                        <div class="col-lg-6">
                            <label>Nombre del Servicio</label>
                            <input type="text" class="form-control" placeholder="Limpieza general de oficinas" name="nombre_servicio">
                        </div>
                        <div class="col-lg-4 pull-right">
                            <br>
                            <button type="submit" class="btn btn-block btn-success" style="border-radius: 15px;" name=InsertarAlmacen" title="Agregar Servicio">Agregar Servicio
                                <i class="fa fa-fw fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                    <!--  Lugar de butons y label y textbox  -->
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Servicios de la Empresa Jezoar</h3>
                        </div>
                        <div class="box-body" id="tabla1">
                            <table class="table table-bordered table-hover" method="POST" id="tabla1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre de Servicio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require '../../controller/servicioController.php';
                                        $printer=getListaServicios();
                                        echo $printer;
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
    <script src="../../public/assets/updateServicio.js"></script>
<?php
    include "../../view/theme/AdminLTE/Additional/scripts.php";
?>