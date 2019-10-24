<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Servicios
                <!-- <small>Blank example to the fixed layout</small> -->
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido de mi Vista -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Gestion de Servicios</h3>
                    <div class="box-tools pull-right">
                        <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                        <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                </div>
                <!-- Inicia tu codigo aqui -->                    
                <form role="form" action="../../controller/servicioController.php" method="post">
                    <!--  Lugar de butons y label y textbox  -->
                    <div class="box-body">
                        <div class="col-lg-5">
                            <label>Nombre del Servicio</label>
                            <input type="text" class="form-control" placeholder="Limpieza general de oficinas" name="nombre_servicio">
                        </div>
                        <div class="col-lg-7">
                            <label>Descripcion</label>
                            <input type="text" class="form-control" placeholder="Descripcion del servicio" name="descripcion">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-block btn-success" title="Agregar Servicio">Agregar Servicio
                                <i class="fa fa-fw fa-check"></i>
                            </button>
                        </div>
                    </div>
                    <!--  Lugar de butons y label y textbox  -->
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Servicios de la Empresa Jezoar</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-hover" method="POST">
                                <thead>
                                    <tr>
                                        <th>Id Servicio</th>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require '../../controller/servicioController.php';
                                        $printer=getListaServicios();
                                        echo $printer;
                                    ?>
                                </tbody>
                                <!-- Sub-Form Modal -->
                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title">Modificacion de Servicio</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>#</label>
                                                    <input type="text" class="form-control" placeholder="Nombre del Servicio" name="nombreServicioModifcar">
                                                    <br>
                                                    <label>Nombre</label>
                                                    <input type="text" class="form-control" placeholder="Nombre del Servicio" name="nombreServicioModifcar">
                                                    <br>
                                                    <label>Descripcion</label>
                                                    <input type="text" class="form-control" placeholder="Descripcion del Servicio" name="descripcionServicioModifcar">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-primary">Guardar Modificacion</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                <!-- /.modal-dialog -->
                                </div>
                                <!-- Sub-Form Modal Ended -->
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