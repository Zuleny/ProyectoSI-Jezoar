<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Categoria de Productos
            <!-- <small>Blank example to the fixed layout</small> -->
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido de mi Vista -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Gestion de Categoria de Productos</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-primary" title="Volver Atras">
                        <i class="fa fa-fw fa-arrow-circle-left"></i>
                    </button>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->                    
            <form role="form" action="../../controller/categoriaController.php" method="post">
                <!--  Lugar de butons y label y textbox  -->
                <div class="box-body">
                    <div class="col-lg-8">
                        <label>Nombre del Categoria</label>
                        <input type="text" class="form-control" placeholder="Limpieza general de oficinas" name="nombre_categor">
                    </div>
                    <div class="col-lg-4">
                        <br>
                        <button type="submit" class="btn btn-block btn-success" title="Agregar Servicio">Crear Categoria
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
                        <table class="table table-bordered table-hover">
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