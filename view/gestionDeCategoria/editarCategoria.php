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
                <h3 class="box-title">Modificación de Categoria de Productos # <?php echo $_GET['nameCategory']; ?></h3>
                <div class="box-tools pull-right">
                    <a href="../../index.php" class="btn btn-primary" title="Menú Inicio">
                    <span class="glyphicon glyphicon-home"></span></a>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->                    
            <form role="form" action="../../controller/categoriaController.php" method="post">
                <!--  Lugar de butons y label y textbox  -->
                <div class="box-body">
                    <div class="col-lg-5">
                        <?php
                            require '../../controller/categoriaController.php';
                            $resultado = getNombreCategoria($_GET['nameCategory']);
                        ?>
                        <label>Nombre del Categoria</label>
                        <input type="text" class="form-control" placeholder="Limpieza general de oficinas" name="nombreCategoria" value="<?php echo $resultado; ?>">
                        <input type="hidden" name="idCategoria" value="<?php echo $_GET['nameCategory']; ?>">
                    </div>
                    <div class="col-lg-3 pull-right">
                        <br>
                        <button type="submit" class="btn btn-block btn-success" style="border-radius: 15px;" title="Agregar Servicio">Guardar Cambios
                            <i class="fa fa-fw fa-check"></i>
                        </button>
                    </div>
                    <div class="col-lg-3 pull-right">
                        <a href="gestionCategoria.php">
                            <br>
                            <button type="button" class="btn btn-block btn-danger" style="border-radius: 15px;" >Cancelar Cambios
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </a>
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