
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
                            <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                        </div>
                    </div>
                   <!-- Inicia tu codigo aqui -->                    
                    <form role="form" method="post" action="../../controller/productoController.php">
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box-body">
                            
                            <div class="col-lg-5">
                                <label>Nombre de Producto</label>
                                <input type="text" class="form-control" placeholder="Esponja" name="txtNombreProd" required>
                            </div>
                            <div class="col-lg-5">
                                <label>Marca</label>
                                <input type="text" class="form-control" placeholder="Marca del producto" name="txtMarca" required>
                            </div>
                            <div class="col-lg-2">
                                <label>Precio Unitario</label>
                                <input type="number" step="0.01" class="form-control" placeholder="7.50" name="txtPrecioUnitario" required>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-8">
                                <label>Descripcion de Producto</label>
                                <textarea class="form-control" name="txtDescripcion" required rows="4" placeholder="Escriba una breve descripcion del la utilidad del producto"></textarea>
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
                        <div class="col-lg-4" >
                                <button type="submit" class="btn btn-block btn-success" id="button1" name="btnInsertarProducto" title="Agregar Servicio">Agregar Registro <i class="fa fa-fw fa-check"></i></button>
                        </div>
                            
                        </div>
                        <a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeAlmacen/asignacionProductoAlmacen.php" target="_blank" id="etiqueta1">
                            Ir a: Registrar Producto en un almacen 
                        </a>
                        <!--  Lugar de butons y label y textbox  -->

                    </form>
                    <div class="box-header">
                        <h3 class="box-title">Lista de Productos</h3>
                    </div>
                    <!--Aqui Inicia Datatable-->

                    <div class="row">

                        <div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
                            <div class="col-sm-offset-2 col-sm-8">
                                <h3 class="text-center"> <small class="mensaje"></small></h3>
                            </div>
                            <div class="table-responsive col-sm-12">
                                <table id="tabla1" class="table table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="col-lg-1">#</th>
                                        <th class="col-lg-2">Nombre</th>
                                        <th class="col-lg-4">Descripcion</th>
                                        <th class="col-lg-1">Marca</th>
                                        <th class="col-lg-1">Categoria</th>
                                        <th class="col-lg-1">Precio</th>
                                        <th class="col-lg-1"></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div>

                        <!-- Modal Update-->
                        <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdateLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="modalUpdateLabel">Actualizar Producto</h4>
                                    </div>
                                    <!--Modal Body Here-->
                                    <div class="modal-body">
                                        <form id="frmUpdateProducto" class="form-horizontal" action="" method="POST">
                                            <input type="hidden" id="idProductoFrmUpdate" name="idProductoFrmUpdate" value="">
                                            <input type="hidden" id="opcion" name="opcion" value="actualizar">

                                            <div class="form-group">
                                                <label for="nombre" class="col-form-label">Nombre:</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="descripcion" class="col-form-label">Descripcion:</label>
                                                <textarea class="form-control" rows="4" id="descripcion" name="descripcion" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="marca" class="col-form-label">Marca:</label>
                                                <input type="text" class="form-control" id="marca" name="marca" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="categoria" class="col-form-label">Categoria:</label>
                                                <input type="text" class="form-control" id="categoria" name="categoria" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="precio" class="col-form-label">Precio:</label>
                                                <input type="number" step="0.01" class="form-control" placeholder="7.50" id="precio" name="precio" required>
                                            </div>

                                        </form>
                                    </div>
                                    <!--Modal Body-->
                                    <div class="modal-footer">
                                        <button type="button" id="updateProducto" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <?php
                           include "../../view/theme/AdminLTE/Additional/scripts.php";
                    ?>

                    <script>
                        $(document).ready(function(){
                            listar();
                            actualizar();
                        });

                        var listar= function(){
                            var table=$("#tabla1").DataTable({
                                "destroy":true,
                                "ajax":{
                                    "method":"POST",
                                    "url":"listarProducto.php",
                                    "dataSrc": "data"
                                },
                                "columns":[
                                    {"data":"codproducto"},
                                    {"data":"nombreinsumo"},
                                    {"data":"descripcioninsumo"},
                                    {"data":"marcaproducto"},
                                    {"data":"categoriaproducto"},
                                    {"data":"precioproducto"},
                                    {"defaultContent":"<button type='button' class='editar btn bg-purple btn-xs' data-toggle='modal' data-target='#modalUpdate' ><i class='fa fa-pencil-square-o'></i></button>"}

                                ],
                                "language":idioma_espanol
                            });
                            getDataRow("#tabla1 tbody",table);

                        }


                        var getDataRow=function (tbody,table) {
                            $(tbody).on("click","button.editar",function () {
                                var data=table.row($(this).parents("tr")).data();
                                console.log(data);
                                var codproducto=$("#frmUpdateProducto #idProductoFrmUpdate").val(data.codproducto),
                                    nombreinsumo=$("#frmUpdateProducto #nombre").val(data.nombreinsumo),
                                    descripcioninsumo=$("#frmUpdateProducto #descripcion").val(data.descripcioninsumo),
                                    marcaproducto=$("#frmUpdateProducto #marca").val(data.marcaproducto),
                                    categoriaproducto=$("#frmUpdateProducto #categoria").val(data.categoriaproducto),
                                    precioproducto=$("#frmUpdateProducto #precio").val(data.precioproducto);
                                console.log(precioproducto);

                            });
                        }



                        var actualizar=function () {
                            $("#updateProducto").on("click",function () {
                                var codproducto=$("#frmUpdateProducto #idProductoFrmUpdate").val(),
                                    nombreinsumo=$("#frmUpdateProducto #nombre").val(),
                                    descripcioninsumo=$("#frmUpdateProducto #descripcion").val(),
                                    marcaproducto=$("#frmUpdateProducto #marca").val(),
                                    categoriaproducto=$("#frmUpdateProducto #categoria").val(),
                                    precioproducto=$("#frmUpdateProducto #precio").val(),
                                    opcion=$("#frmUpdateProducto #opcion").val();
                                console.log(opcion);
                                var row={codproducto:codproducto,nombreinsumo:nombreinsumo,descripcioninsumo:descripcioninsumo,marcaproducto:marcaproducto,categoriaproducto:categoriaproducto,precioproducto:precioproducto,opcion:opcion};
                                $.ajax({
                                    method:"POST",
                                    url: "tableProductoController.php",
                                    data: row,
                                    success: function (info) {
                                        console.log(info);
                                    }
                                });
                                listar();
                            });
                        }

                        var idioma_espanol={
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla =(",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            },
                            "buttons": {
                                "copy": "Copiar",
                                "colvis": "Visibilidad"
                            }
                        }

                    </script>
        <!--Datatable termina aqui-->
                    <div>
                        <a href="https://www.facebook.com/Jezoar-228770924276961/" target="_blank" class="btn btn-block btn-social btn-facebook">
                            <i class="fa fa-facebook"></i>
                            Página de Facebook de Jezoar
                        </a>
                    </div>
                    <!-- Termina tu codigo aqui -->

            </section>
        </div>

