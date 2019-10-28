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
                    <h3 class="box-title">Detalle de Nota de Ingreso a Almacen</h3>
                    <div class="box-tools pull-right">
                        <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                        <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                    <form class="box-body" action="../../controller/detalleIngresoController.php" method="post">
                    <div class="form-group col-md-12">                          
                        <div class="col-lg-6">
                            <label>Nombre de Insumo</label>
                            <select class="form-control" name="nombreInsumo">
                                <?php
                                    require "../../controller/detalleIngresoController.php";
                                    $result=getListaInsumos();
                                    echo $result;
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>Cantidad</label>
                            <input type="number" class="form-control" min="1" name="cantidadInsumo" placeholder="45"/>
                        </div>
                        <div class="col-lg-2">
                            <label>Precio Unitario</label>
                            <input type="number" class="form-control" min="0" step=".01" name="precioUnitario" placeholder="25.33"/>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-block btn-success" id="button1" style="border-radius: 15px;" title="Registrar Detalle de Ingreso">Registrar Detalle</button>
                    </div>
                    <div class="col-lg-6"></div> 
                    <div class="col-lg-3">                           
                        <a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeProducto/gestionProducto.php" target="_blank" id="etiqueta1">
                        ¿No encontro el producto en la lista?
                        </a>
                        <br>
                        <a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeHerramienta/gestionHerramienta.php" target="_blank" id="etiqueta1">
                        ¿No encontro la Herramienta en la lista?
                        </a>
                    </div>
                </div>

                            <div class="box box-success">
                                <div class="box-header">
                                    <h3 class="box-title">Detalle de Nota Ingreso a Almacen</h3>
                                </div>
                                <div class="box-body"  id="tabla1">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>Id Detalle</th>
                                                <th>Nombre Insumo</th>
                                                <th>Cantidad</th>
                                                <th>Precio Unitario</th>
                                                <th>Actualizar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $printer=getListaDetalleIngreso();
                                                echo $printer;
                                            ?>
                                        </tbody>
                                        <div class="modal fade" id="modal-default">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true"></span>
                                                    </button>
                                                    <h4 class="modal-title">Modificar</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Nombre Insumo</label>
                                                        <input type="text" class="form-control" placeholder="Cera" name="nombreInsumoModifcar">
                                                        <br>
                                                        <label>Cantidad</label>
                                                        <input type="text" class="form-control" placeholder="45" name="CAntidadModifcar">
                                                        <br>
                                                        <label>Precio Unitario</label>
                                                        <input type="text" class="form-control" placeholder="12.5" name="PrecioUnitarioModifcar">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-danger pull-left" type="button" data-dismiss="modal">Cancelar</button>
                                                    <button class="btn btn-success" type="button">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </table>
                            </div>    
                           </div>
                    </form>

                    
                
                <!-- Termina tu codigo aqui -->
        </section>
        <!-- fin de contenido de mi Vista -->
    </div>
    <footer>
        <div class="box-footer">
                    <a href="https://www.facebook.com/Jezoar-228770924276961/" id="linkFacebook"target="_blank"class="btn btn-block btn-social btn-facebook">
                        <i class="fa fa-facebook"></i>
                        Página de Facebook de Jezoar
                    </a>
                </div>
        </footer>
<?php
    include "../../view/theme/AdminLTE/Additional/scripts.php";
?>