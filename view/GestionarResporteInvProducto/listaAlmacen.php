<?php
include "../../view/theme/AdminLTE/Additional/head.php";
//require_once '../../vendor/autoload.php';
?>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
               Reporte Inventario de Productos
                <!-- <small>Blank example to the fixed layout</small> -->
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido de mi Vista -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Reporte</h3>
                    <div class="box-tools pull-right">
                        <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                </div>
                <!-- Inicia tu codigo aqui -->
                <form role="form" action="../../controller/reporteController.php" method="post" >
                    <!--  Lugar de butons y label y textbox  -->
                    <div class="box-body">
                        <div class="col-lg-5">
                            <label>Lista de Almacenes</label>
                            <select class="form-control" name="listaAlmacen">
                                <?php
                                require "../../controller/reporteController.php";
                                $result=getListaAlmacen();
                                echo $result;
                                ?>
                            </select>
                        </div>
                          <br>
                        <div class="col-lg-2" >
                            <button type="submit" name ="cargar" class="btn btn-block btn-primary" title="Cargar">Cargar</button>
                        </div>
                    </div>

                </form>
                <!--  Lugar de butons y label y textbox  -->

                <div>
                    <a href="https://www.facebook.com/Jezoar-228770924276961/" target="_blank"class="btn btn-block btn-social btn-facebook">
                        <i class="fa fa-facebook"></i>
                        Página de Facebook de Jezoar
                    </a>
                </div>
                <!-- Termina tu codigo aqui -->
            </div>
        </section>
    </div>
    </div>
<?php
include "../../view/theme/AdminLTE/Additional/scripts.php";
?>