
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
                            <div class="col-lg-2">
                                <label>Codigo de Producto</label>
                                <input type="number" class="form-control" placeholder="50" name="txtCodProd">
                            </div>
                            <div class="col-lg-5">
                                <label>Nombre de Producto</label>
                                <input type="text" class="form-control" placeholder="Esponja" name="txtNombreProd">
                            </div>
                            <div class="col-lg-3">
                                <label>Marca</label>
                                <input type="text" class="form-control" placeholder="Marca del producto" name="txtMarca">
                            </div>
                            <div class="col-lg-2">
                                <label>Precio Unitario</label>
                                <input type="number" class="form-control" placeholder="7.50" name="txtPrecioUnitario">
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-12">
                                <label>Descripcion de Producto</label>
                                <textarea class="form-control" name="txtDescripcion" rows="3" placeholder="Escriba una breve descripcion del la utilidad del producto"></textarea>
                            </div>
                            
                        </div>
                        <div class="box-body">
                          <div class="col-lg-5">
                           <div class="form-group" data-select2-id="13">
                               <label>Categoria</label>
                               <select class="form-control select2 select2-hidden-accessible" name="listaDeCategoria">
                               <?php
                                            include "../../model/Conexion.php";
                                            $conexion=new Conexion("localhost",5432,"jezoar","jezoar","123456");
                                            $result=$conexion->execute("SELECT nombre from Categoria;");
                                            
                                            if (!$result) {
                                                die("Error en la consulta");
                                            }
                                            $nroFilas=pg_num_rows($result);
                                            if ($nroFilas>0) {
                                                for ($nroTupla=0; $nroTupla < $nroFilas; $nroTupla++){ 
                                                    echo '<option>'.pg_result($result,$nroTupla,0).'</option>';
                                                }
                                            }
                                        ?>
                                    
                               </select>

                           </div>
                          </div> 
                        <div class="col-lg-5" method="post" action="../../controller/productoController.php">
                                <br>
                                <button type="submit" class="btn btn-block btn-success" name="btnInsertarProducto" title="Agregar Servicio">Agregar Registro <i class="fa fa-fw fa-check"></i></button>
                            </div> 
                        </div>
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">Lista de Productos</h3>
                            </div>
                            <div class="box-body">
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
                                            
                                            $result=$conexion->execute("SELECT Producto.cod_insumo_producto,Insumo.nombre,Insumo.descripcion,Producto.marca,getCategoriaDeProducto(Producto.cod_insumo_producto),Producto.precio_unitario 
                                            from Insumo,Producto,Producto_Categoria
                                            where Insumo.cod_insumo=Producto.cod_insumo_producto and Producto.cod_insumo_producto=Producto_Categoria.cod_insumo_producto;");
                                            
                                            if (!$result) {
                                                die("Error en la consulta");
                                            }
                                            $nroFilas=pg_num_rows($result);
                                            if ($nroFilas>0) {
                                                for ($nroTupla=0; $nroTupla < $nroFilas; $nroTupla++){ 

                                                    echo "<tr> <td> ". pg_result($result,$nroTupla,0)."</td>";
                                                    echo "<td>".'<div contentEditable="false">'. pg_result($result,$nroTupla,1)."</div></td>";
                                                    echo "<td>".'<div contentEditable="false">'. pg_result($result,$nroTupla,2)."</div></td>";
                                                    echo "<td>". pg_result($result,$nroTupla,3)."</td>";
                                                    echo "<td>". pg_result($result,$nroTupla,4)."</td>";
                                                    echo "<td>". pg_result($result,$nroTupla,5)."</td>";
                                                    echo '<td>  
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-warning btn-xs" title="Actualizar">
                                                                        <i class="fa fa-fw fa-refresh"></i>
                                                                    </button>
                                                                    <button type="button" class="btn bg-purple btn-xs" title="Editar">
                                                                        <i class="fa fa-edit"></i>
                                                                    </button>
                                                                </div>
                                                            </td> 
                                                        </tr>';
                                                }
                                            }
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