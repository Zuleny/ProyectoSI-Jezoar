<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Gestion de Insumos a Almacen
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido de mi Vista -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Asignacion de Insumo a Almacen</h3>
                    <div class="box-tools pull-right">
                        <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                        <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                    <form class="box-body" action="../../controller/asignacionProductoAlmacenController.php" method="post">
                        
                            <div class="box-body">
                                <table class="table table-bordered table-hover" id="tabla1">
                                   <thead>
                                      <tr>
                                        
                                            <th>Cod</th>
                                            <th>Nombre Insumo</th>
                                            <th>Prod=P/Herra=H</th>
                                            <th>Stock Insumo</th>
                                        
                                      </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            require "../../controller/asignacionProductoAlmacenController.php";
                                            $result=getListaInsumo();
                                            echo $result;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        
                        <div class="col-lg-4">
                            <div class="form-group col-md-12">
                                
                                <label>Nombre de Almacen</label>
                                <select class="form-control" name="nombreAlmacen" >
                                    <?php
                                        $result=getListaAlmacenes();
                                        echo $result;
                                    ?>
                                </select>
                                <br>
                                <button type="submit" class="btn btn-block btn-success" title="Registrar Nota de Ingreso">Registrar En Almacen
                                    <i class="fa fa-fw fa-street-view"></i>
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <div class="box-footer">
                    <a href="https://www.facebook.com/Jezoar-228770924276961/" id="linkFacebook" target="_blank"class="btn btn-block btn-social btn-facebook">
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