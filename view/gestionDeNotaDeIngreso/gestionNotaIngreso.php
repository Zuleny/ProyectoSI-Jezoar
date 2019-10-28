
    <?php
        include "../../view/theme/AdminLTE/Additional/head.php";
    ?>

<!-- the fixed layout is not compatible with sidebar-mini -->
        
        <div class="content-wrapper">
            <!-- Titulo de la cabecera -->
            <section class="content-header">
                <h1>
                    Nota Ingreso
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
            </section>
            <!-- Fin de la cabecera -->
            <!-- contenido -->
            <section class="content">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Gestion de Nota de Ingreso</h3>
                        <div class="box-tools pull-right">
                            <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                        </div>
                    </div>
                   <!-- Inicia tu codigo aqui -->                    
                    <form role="form" method="post" action="../../controller/notaIngresoController.php">
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box-body">
                            
                            <div class="col-lg-5">
                                <label>Nombre</label>
                                <input type="text" class="form-control" placeholder="Escriba nombres y apellidos de quien recibe" name="nombreRecibe">
                            </div>

                            <div class="col-lg-3">
                             <div class="form-group" data-select2-id="13">
                               <label>Nombre de Proveedor</label>
                               <select class="form-control select2 select2-hidden-accessible" name="listaProveedor">
                               <?php
                                      require "../../controller/notaIngresoController.php";
                                      $printer=getlistaProveedor();
                                      echo $printer;      
                                            
                                ?>
                                    
                               </select>
                             </div>
                            </div> 

                            <div class="col-lg-4">
                             <div class="form-group" data-select2-id="13">
                               <label>Almacen</label>
                               <select class="form-control select2 select2-hidden-accessible" name="listaAlmacen">
                               <?php
                                      
                                      $printer=getlistaAlmacen();
                                      echo $printer;      
                                            
                                ?> 
                               </select>
                             </div>
                             </div>
                            <div class="col-lg-4" >
                                <button type="submit" class="btn btn-block btn-success" id="button1" name="btnInsertarProducto" title="Agregar Servicio">Agregar Registro <i class="fa fa-fw fa-check"></i></button>
                            </div>
                            <div class="box-body"  id="tabla1">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nro Ingreso</th>
                                            <th>Fecha</th>
                                            <th>Nombre Recibe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $printer=getListaNotasIngreso();
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
                                                    <label>Nombre Recibe</label>
                                                    <input type="text" class="form-control" placeholder="Juan Perez" name="NombreAModifcar">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger pull-left" type="button" data-dismiss="modal">Cancelar</button>
                                                <button class="btn btn-success" type="button">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </table>
                            </div>    
                        
                        <!--  Lugar de butons y label y textbox  -->
                        
                    </form>
                    
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
    <?php
        include "../../view/theme/AdminLTE/Additional/scripts.php";
    ?>