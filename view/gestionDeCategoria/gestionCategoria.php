<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Categoria de Productos
            <small>Gestión De Insumos</small>
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido de mi Vista -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Gestion de Categoria de Productos</h3>
                <div class="box-tools pull-right">
                    <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                    <span class="glyphicon glyphicon-home"></span></a>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->                    
            <form role="form" action="../../controller/categoriaController.php" method="post">
                <!--  Lugar de butons y label y textbox  -->
                <div class="box-body">
                <div class="col-lg-5">
                        <label>Nombre del Categoria</label>
                        <input type="text" class="form-control" placeholder="Limpieza general de oficinas" name="nombre_categor">
                    </div>
                    <div class="col-lg-4">
                    </div>
                    <div class="col-lg-3">
                        <br>
                        <button type="submit" class="btn btn-block btn-success" style="border-radius: 15px;" title="Agregar Categoria">Crear Categoria
                            <i class="fa fa-fw fa-check"></i>
                        </button>
                    </div>
                </div>
                <!--  Lugar de butons y label y textbox  -->
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Categoria de Productos de la Empresa Jezoar</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover" id="tabla1">
                            <thead>
                                <tr>
                                    <th>Codigo de Categoria</th>
                                    <th>Nombre de Categoria</th>
                                    <th>Modificadores</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    require '../../controller/categoriaController.php';
                                    $printer=getListaCategoria();
                                    echo $printer;
                                ?>
                            </tbody>
                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"></span></button>
                                                <h4 class="text-center modal-title">Modificar</h4>
                                            </div>
                                            <div class="modal-body">
                                                <label>Nombre</label>
                                                <input type="text" class="form-control" placeholder="Nombre de Categoria" name="nombreCategoria">
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-default pull-left" type="button" data-dismiss="modal">Cancelar</button>
                                                <button class="btn btn-primary" type="button">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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