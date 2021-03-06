
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
                            <a href="../../index.php" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                        </div>

                        <!-- Inicia tu codigo aqui -->                    
                        <form role="form" method="post" action="../../controller/notaIngresoController.php">
                            <!--  Lugar de butons y label y textbox  -->
                        
                            <div class="box-body">
                                <div class="col-lg-5">
                                    <label>Nombre</label>
                                    <div class="input-group margin-bottom-sm"> 
                                        <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" placeholder="Escriba nombres y apellidos de quien recibe" name="nombreRecibe" required>
                                    </div> 
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group" data-select2-id="13">
                                        <label>Nombre de Proveedor</label>
                                        <div class="input-group margin-bottom-sm"> 
                                            <span class="input-group-addon"><i class="fa fa-street-view fa-fw" aria-hidden="true"></i></span>
                                            <select class="form-control select2 select2-hidden-accessible" name="listaProveedor">
                                                <?php
                                                    require "../../controller/notaIngresoController.php";
                                                    $printer=getlistaProveedor();
                                                    echo $printer;             
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div> 
                                <div class="col-lg-4">
                                    <div class="form-group" data-select2-id="13">
                                        <label>Almacen</label>
                                        <div class="input-group margin-bottom-sm"> 
                                            <span class="input-group-addon"><i class="fa fa-home fa-fw" aria-hidden="true"></i></span>
                                            <select class="form-control select2 select2-hidden-accessible" name="listaAlmacen">
                                            <?php
                                                $printer=getlistaAlmacen();
                                                echo $printer;             
                                            ?> 
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4" >
                                    <button type="submit" class="btn btn-block btn-success" id="button1" style="border-radius: 15px;" name="btnInsertarProducto" title="Agregar Servicio">Agregar Registro <i class="fa fa-fw fa-check"></i></button>
                                </div>
                            </div>
                            <br>
                        
                        <!--  Lugar de butons y label y textbox  -->
                        
                    </form>
                        <!--Aqui Inicia Datatable-->
                        <div class= "box box-success">
                            <div class="box-header">
                                <h3 class="box-title">Lista de detalles</h3>
                            </div>
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
                                                <th class="col-lg-2">Fecha</th>
                                                <th class="col-lg-7">Nombre Recibe</th>
                                                <th class="col-lg-2"><th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <form id="frmDeleteNotaIngreso" action="" method="POST">
                                    <input type="hidden" id="idNotaIngreso" name="idNotaIngreso" value="0">
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
                                                    ¿Está seguro de eliminar la Nota de Ingreso?<strong data-name=""></strong>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" id="deleteNotaIngreso" onclick="location.reload()" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
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
                                                <h4 class="modal-title" id="modalUpdateLabel">Actualizar Nota Ingreso</h4>
                                            </div>
                                            <!--Modal Body Here-->
                                            <div class="modal-body">
                                                <form id="frmUpdateNotaIngreso" class="form-horizontal" action="" method="POST">
                                                    <input type="hidden" id="idNotaIngreso" name="idNotaIngreso" value="">
                                                    <input type="hidden" id="opcion" name="opcion" value="actualizar">

                                                    <div class="form-group">
                                                        <label for="nombre" class="col-form-label">Nombre:</label>
                                                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                                                    </div>

                                                </form>
                                            </div>
                                            <!--Modal Body-->
                                            <div class="modal-footer">
                                                <button type="button" id="updateNotaIngreso" class="btn btn-primary" onclick="location.reload()" data-dismiss="modal">Aceptar</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div>
                                <form id="frmVisualizarNotaIngreso" action="" method="POST">
                                <input type="hidden" id="idFrmNotaIngreso" name="idFrmNotaIngreso" value="0">
                                <input type="hidden" id="opcion" name="opcion" value="visualizar">
                                </form>

                            </div>
                        </div>

                        <?php
                             include "../../view/theme/AdminLTE/Additional/scripts.php";
                        ?>

                        <script>

                            $(document).ready(function(){
                                listar();
                                actualizar();
                                eliminar();
                                //visualizar();
                            });
                            //Lista los datos devueltos del servidor
                            var listar= function(){
                                var table=$("#tabla1").DataTable({
                                    "destroy":true,
                                    "ajax":{
                                        "method":"POST",
                                        "url":"listarNotaIngreso.php",
                                        "dataSrc": "data"
                                    },
                                    "columns":[
                                        {"data":"nro_ingreso"},
                                        {"data":"fecha_ingreso"},
                                        {"data":"nombre_recibe"},
                                        {"defaultContent":"<div class='btn-group'>" +
                                                                "<button type='button' class='visualizar btn btn-xs bg-light-blue btn-sm' id='visualizar'><i class='fa fa-fw fa-cubes'></i></button>"+
                                                                "<button type='button' class='editar btn bg-purple btn-xs' data-toggle='modal' data-target='#modalUpdate' ><i class='fa fa-pencil-square'></i></button>" +
                                                                "<button type='button' class='eliminar btn bg-red btn-xs' data-toggle='modal' data-target='#modalEliminar' ><i class='fa fa-trash-o'></i></button>"+
                                                            "</div>"}

                                    ],
                                    "language":idioma_espanol
                                });
                                getDataRow("#tabla1 tbody",table);
                                getIdNotaIngresoRow("#tabla1 tbody",table);
                                getIdNotaIngresoVisualizar("#tabla1 tbody",table);
                            }

                            //Settear los valores devueltos por el servidor(database) al sus respectivos inputs del modal editar
                            var getDataRow=function (tbody,table) {
                                $(tbody).on("click","button.editar",function () {
                                    var data=table.row($(this).parents("tr")).data();
                                    var nro_ingreso=$("#frmUpdateNotaIngreso #idNotaIngreso").val(data.nro_ingreso),
                                        nombre_recibe=$("#frmUpdateNotaIngreso #nombre").val(data.nombre_recibe);

                                });
                            }

                            //Settear los valores devueltos por el servidor(database) al sus respectivos inputs del modal eliminar
                            var getIdNotaIngresoRow=function (tbody,table) {
                                $(tbody).on("click","button.eliminar",function () {
                                    var data=table.row($(this).parents("tr")).data();
                                    var nro_ingreso=$("#frmDeleteNotaIngreso #idNotaIngreso").val(data.nro_ingreso);
                                });
                            }

                            //Settear los valores devueltos por el servidor(database) al sus respectivos inputs para visualizar los detalles de dico nro de Ingreeso
                            var getIdNotaIngresoVisualizar=function (tbody,table) {
                                $(tbody).on("click","button.visualizar",function () {
                                    var data=table.row($(this).parents("tr")).data();
                                    var nro_ingreso=$("#frmVisualizarNotaIngreso #idFrmNotaIngreso").val(data.nro_ingreso);
                                    var porId=document.getElementById("idFrmNotaIngreso").value;
                                    console.log(porId);
                                    location.href = "gestionDetalleIngreso.php?nro_ingreso=" + porId;
                                });
                            }
                            //Metodo Actualizar ( hace una peticion al servidor)
                            var actualizar=function () {
                                $("#updateNotaIngreso").on("click",function () {
                                    var nro_ingreso=$("#frmUpdateNotaIngreso #idNotaIngreso").val(),
                                        nombre_recibe=$("#frmUpdateNotaIngreso #nombre").val(),
                                        opcion=$("#frmUpdateNotaIngreso #opcion").val();

                                    var row={nro_ingreso:nro_ingreso,nombre_recibe:nombre_recibe, opcion:opcion};
                                    $.ajax({
                                        method:"POST",
                                        url: "tableNotaIngresoController.php",
                                        data: row,
                                        success: function (info) {
                                            console.log(info);
                                        }
                                    });
                                    listar();
                                });
                            }

                            //Metodo Eliminar ( hace una peticion al servidor)
                            var eliminar=function () {
                                $("#deleteNotaIngreso").on("click",function () {
                                    var nro_ingreso=$("#frmDeleteNotaIngreso #idNotaIngreso").val(),
                                        opcion=$("#frmDeleteNotaIngreso #opcion").val();
                                    console.log(nro_ingreso);
                                    var row={nro_ingreso:nro_ingreso,opcion:opcion};
                                    $.ajax({
                                        method:"POST",
                                        url: "tableNotaIngresoController.php",
                                        data: row,
                                        success: function (info) {
                                            console.log(info);
                                        }
                                    });
                                    listar();
                                });
                            }

                            //Metodo Que va a la ventana de detalle ingreso de un determinado nota de ingreso ( hace una peticion al servidor)
                            var visualizar=function () {
                                $("#visualizar").on("click",function () {
                                    var nro_ingreso=$("#frmVisualizarNotaIngreso #idNotaIngreso").val(),
                                        opcion=$("#frmVisualizarNotaIngreso #opcion").val();

                                    var row={nro_ingreso:nro_ingreso,opcion:opcion};
                                    $.ajax({
                                        method:"POST",
                                        url: "listarDetalleIngreso.php",
                                        data: row,
                                        success: function (info) {
                                            console.log(info);
                                        }
                                    });
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
                        <a href="https://www.facebook.com/Jezoar-228770924276961/" target="_blank"class="btn btn-block btn-social btn-facebook">
                            <i class="fa fa-facebook"></i>
                            Página de Facebook de Jezoar
                        </a>
                    </div>
                    <!-- Termina tu codigo aqui -->
                </div>
            </section>
        </div>
    </body>
