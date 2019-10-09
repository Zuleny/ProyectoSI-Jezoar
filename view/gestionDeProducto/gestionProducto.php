
    <?php
        include "../../view/theme/AdminLTE/Additional/head.php";
    ?>

<!-- the fixed layout is not compatible with sidebar-mini -->
        
        <div class="content-wrapper">
            <!-- Titulo de la cabecera -->
            <section class="content-header">
                <h1>
                    Productos
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
            </section>
            <!-- Fin de la cabecera -->
            <!-- contenido -->
            <section class="content">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Gestion de Productos</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-primary" title="Volver Atras">
                            <i class="fa fa-fw fa-arrow-circle-left"></i></button>
                        </div>
                    </div>
                   <!-- Inicia tu codigo aqui -->                    
                    <form role="form" method="post" action="../../controller/productoController.php">
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box-body">
                            
                            <div class="col-lg-5">
                                <label>Nombre de Producto</label>
                                <input type="text" class="form-control" placeholder="Esponja" name="txtNombreProd">
                            </div>
                            <div class="col-lg-5">
                                <label>Marca</label>
                                <input type="text" class="form-control" placeholder="Marca del producto" name="txtMarca">
                            </div>
                            <div class="col-lg-2">
                                <label>Precio Unitario</label>
                                <input type="number" step="0.01" class="form-control" placeholder="7.50" name="txtPrecioUnitario">
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-8">
                                <label>Descripcion de Producto</label>
                                <textarea class="form-control" name="txtDescripcion" rows="4" placeholder="Escriba una breve descripcion del la utilidad del producto"></textarea>
                            </div>
                            <div class="col-lg-4">
                           <div class="form-group" data-select2-id="13">
                               <label>Categoria</label>
                               <select class="form-control select2 select2-hidden-accessible" name="listaDeCategoria">
                               <?php
                                      require "../../controller/productoController.php";
                                      $printer=getListaDeCategoria();
                                      echo $printer;      
                                            
                                ?>
                                    
                               </select>

                           </div>
                          </div> 
                        <div class="col-lg-4" method="post" action="../../controller/productoController.php">
                                <button type="submit" class="btn btn-block btn-success" name="btnInsertarProducto" title="Agregar Servicio">Agregar Registro <i class="fa fa-fw fa-check"></i></button>
                            </div>
                            
                        </div>
                        <div class="box-body">
                           
                        </div>
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">Lista de Productos</h3>
                            </div>
                            <div class="box-body" style="overflow:scroll">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Marca</th>
                                            <th>Categoria</th>
                                            <th>Precio</th>
                                            <th>Actualizar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            
                                            $printer=getListaDeProductos();
                                            echo $printer;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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