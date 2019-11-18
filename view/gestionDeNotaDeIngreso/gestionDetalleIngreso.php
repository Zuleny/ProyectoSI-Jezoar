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
                        <?php
                           $nroIngreso=$_GET['nro_ingreso'];
                           echo '<input type="hidden" id="nroIngreso" name="nroIngreso" value="'.$nroIngreso.'">'
                        ?>
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
                            <input type="number" class="form-control" min="1" name="cantidadInsumo" required placeholder="45"/>
                        </div>
                        <div class="col-lg-2">
                            <label>Precio Unitario</label>
                            <input type="number" class="form-control" min="0" step=".01" name="precioUnitario" required placeholder="25.33"/>
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
                    </form>

                    <!--Aqui Inicia Datatable-->
                    <div class="row">
                        <div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
                            <div class="box-header">
                                <h3 class="box-title">Lista de detalles</h3>
                            </div>
                            <div class="col-sm-offset-2 col-sm-8">
                                <h3 class="text-center"> <small class="mensaje"></small></h3>
                            </div>
                            <div class="table-responsive col-sm-12">
                                <table id="tabla1" class="table table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre Insumo</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unitario</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div>
                        <form id="frmDeleteDetalleIngreso" action="" method="POST">
                            <input type="hidden" id="idDetalleIngreso" name="idDetalleIngreso" value="0">
                            <input type="hidden" id="opcion" name="opcion" value="eliminar">
                            <!-- Modal Delete-->
                            <div class="modal fade" data-backdrop=”static” id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="modalEliminarLabel">Eliminar Detalle de Ingreso</h4>
                                        </div>

                                        <div class="modal-body">
                                            ¿Está seguro de eliminar el Detalle de Ingreso?<strong data-name=""></strong>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="deleteDetalleIngreso" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div>


                        <!-- Modal Update-->
                        <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdateLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="modalUpdateLabel">Actualizar Detalle Ingreso</h4>
                                    </div>
                                    <!--Modal Body Here-->
                                    <div class="modal-body">
                                        <form id="frmUpdateDetalleIngreso" class="form-horizontal" action="" method="POST">
                                            <input type="hidden" id="idDetalleIngresoFrmUpdate" name="idDetalleIngresoFrmUpdate" value="">
                                            <input type="hidden" id="opcion" name="opcion" value="actualizar">

                                            <div class="form-group">
                                                <label for="nombre" class="col-form-label">Nombre:</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre">
                                            </div>

                                            <div class="form-group">
                                                <label for="cantidad" class="col-form-label">Cantidad:</label>
                                                <input type="number"  min="1" class="form-control" id="cantidad" name="cantidad">
                                            </div>

                                            <div class="form-group">
                                                <label for="precio" class="col-form-label">Precio:</label>
                                                <input type="number" step="0.01" class="form-control"  id="precio" name="precio">
                                            </div>

                                        </form>
                                    </div>
                                    <!--Modal Body-->
                                    <div class="modal-footer">
                                        <button type="button" id="updateDetalleIngreso" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
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

                        $(document).on("ready",function(){
                            listar();
                            actualizar();
                            eliminar();
                        });

                        var listar= function(){
                            var nro_ingreso=document.getElementById("nroIngreso").value;
                            console.log(nro_ingreso);
                            var table=$("#tabla1").DataTable({
                                "destroy":true,
                                "ajax":{
                                    "method":"POST",
                                    "data":{"nro_ingreso":nro_ingreso},
                                    "url":"listarDetalleIngreso.php",
                                    "dataSrc": "data"
                                },
                                "columns":[
                                    {"data":"id_ingreso"},
                                    {"data":"nombre_insumo"},
                                    {"data":"cantidad"},
                                    {"data":"precio_unitario"},
                                    {"defaultContent":"<button type='button' class='editar btn btn-primary' data-toggle='modal' data-target='#modalUpdate' ><i class='fa fa-pencil-square-o'></i></button>" +
                                                      "<button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fa fa-trash-o'></i></button>"}

                                ],
                                "language":idioma_espanol
                            });
                            getDataRow("#tabla1 tbody",table);
                            getIdDetalleIngresoRow("#tabla1 tbody",table);
                        }


                        var getDataRow=function (tbody,table) {
                            $(tbody).on("click","button.editar",function () {
                                var data=table.row($(this).parents("tr")).data();
                                console.log(data);
                                var id_ingreso=$("#frmUpdateDetalleIngreso #idDetalleIngresoFrmUpdate").val(data.id_ingreso),
                                    nombre_insumo=$("#frmUpdateDetalleIngreso #nombre").val(data.nombre_insumo),
                                    cantidad=$("#frmUpdateDetalleIngreso #cantidad").val(data.cantidad),
                                    precio=$("#frmUpdateDetalleIngreso #precio").val(data.precio_unitario);

                            });
                        }

                        var getIdDetalleIngresoRow=function (tbody,table) {
                            $(tbody).on("click","button.eliminar",function () {
                                var data=table.row($(this).parents("tr")).data();
                                var id_ingreso=$("#frmDeleteDetalleIngreso #idDetalleIngreso").val(data.id_ingreso);
                            });
                        }

                        var actualizar=function () {
                            $("#updateDetalleIngreso").on("click",function () {
                                var id_ingreso=$("#frmUpdateDetalleIngreso #idDetalleIngresoFrmUpdate").val(),
                                    nombre_insumo=$("#frmUpdateDetalleIngreso #nombre").val(),
                                    cantidad=$("#frmUpdateDetalleIngreso #cantidad").val(),
                                    precio=$("#frmUpdateDetalleIngreso #precio").val(),
                                    opcion=$("#frmUpdateDetalleIngreso #opcion").val();

                                var row={id_ingreso:id_ingreso,nombre_insumo:nombre_insumo,cantidad:cantidad,precio:precio,opcion:opcion};
                                $.ajax({
                                    method:"POST",
                                    url: "tableDetalleIngresoController.php",
                                    data: row,
                                    success: function (info) {
                                        console.log(info);
                                    }
                                });
                                listar();
                            });
                        }

                        var eliminar=function () {
                            $("#deleteDetalleIngreso").on("click",function () {
                                var id_ingreso=$("#frmDeleteDetalleIngreso #idDetalleIngreso").val(),
                                    opcion=$("#frmDeleteDetalleIngreso #opcion").val();

                                var row={id_ingreso:id_ingreso,opcion:opcion};
                                $.ajax({
                                    method:"POST",
                                    url: "tableDetalleIngresoController.php",
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

                    
                
                <!-- Termina tu codigo aqui -->
        </section>
        <!-- fin de contenido de mi Vista -->
    </div>
    </body>
    <footer>
        <div class="box-footer">
                    <a href="https://www.facebook.com/Jezoar-228770924276961/" id="linkFacebook"target="_blank"class="btn btn-block btn-social btn-facebook">
                        <i class="fa fa-facebook"></i>
                        Página de Facebook de Jezoar
                    </a>
                </div>
    </footer>
