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
                    <h3 class="box-title">Editar Servicio</h3>
                    <div class="box-tools pull-right">
                        <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                        <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                </div>
                <!-- Inicia tu codigo aqui -->                
                <form role="form" action="../../controller/servicioController.php" method="get">
                    <!--  Lugar de butons y label y textbox  -->
                    <div class="box-body">
                        <input type="hidden" class="form-control" placeholder="#" name="cod" value="<?php echo $_GET['codServicio'];?>">
                        <div class="col-lg-6">
                            <label>Nombre</label>
                            <input type="text" class="form-control" placeholder="nombre del servicio" name="name" value="<?php echo $_GET['nombre']; ?>">
                        </div>  
                        <div class="col-lg-6">
                            <label>Descripcion</label>
                            <input type="text" class="form-control" placeholder="Descripcion del servicio" name="description" value="<?php echo $_GET['descripcion'];?>">
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-lg-4">
                            <br>
                            <button type="submit" class="btn btn-block btn-success" title="Agregar Servicio">Agregar Servicio
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