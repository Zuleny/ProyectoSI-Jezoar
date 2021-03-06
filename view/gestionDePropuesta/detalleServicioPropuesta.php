<?php
include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Propuesta
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido de mi Vista -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Detalle Servicios de Propuesta Nro:
                    <b><?php echo $_GET['cod_presentacion']; ?></b>
                </h3>
                <div class="box-tools pull-right">
                    <a href="../gestionDePropuesta/gestionPropuesta.php" class="btn btn-primary" title="Volver Atras">
                        <span class="fa fa-fw fa-mail-reply"></span></a>
                    <a href="../../index.php" class="btn btn-primary" title="Menu Inicio">
                        <span class="glyphicon glyphicon-home"></span></a>
                </div>

                <form id="frmInsertServicioPropuesta" action="" method="POST">
                    <input type="hidden" id="opcion" name="opcion" value="insertar">
                    <?php
                    $codPresentacion=$_GET['cod_presentacion'];
                    echo '<input type="hidden" id="codPresentacion" name="codPresentacion" value="'.$codPresentacion.'">'
                    ?>
                    <div class="box-body">
                        <div class="col-lg-6">
                            <label>Servicio</label>
                            <div class="input-group margin-bottom-sm"> 
                                <span class="input-group-addon"><i class="fa fa-briefcase fa-fw" aria-hidden="true"></i></span>
                                <select class="form-control" name="servicio" id="servicio">
                                    <?php
                                    require "../../controller/propuestaController.php";
                                    $result=getListaServicios();
                                    $nroFilas=pg_num_rows($result);
                                    for ($tupla=0; $tupla <$nroFilas ; $tupla++) {
                                        echo '<option value="'.pg_result($result,$tupla,0).'">'.pg_result($result,$tupla,0).'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label for="areaTrabajo">Area de Trabajo</label>
                            <div class="input-group margin-bottom-sm"> 
                                <span class="input-group-addon"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i></span>          
                                <input type="text" class="form-control" name="area" id="area" required placeholder="Piso"/>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label>Cant. Personal</label>
                            <div class="input-group margin-bottom-sm"> 
                                <span class="input-group-addon"><i class="fa fa-users fa-fw" aria-hidden="true"></i></span>
                                <input type="number" class="form-control" min="1" name="cantidad"  id="cantidad" required placeholder="7"/>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label>Precio Unitario</label>
                            <div class="input-group margin-bottom-sm"> 
                                <span class="input-group-addon"><i class="fa fa-dollar fa-fw" aria-hidden="true"></i></span>
                                <input type="number" class="form-control" min="1" step=".01" name="precio" id="precio" required placeholder="9500"/>
                            </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-lg-3">
                            <button type="button" class="btn btn-block btn-success" id="button1"  onclick="location.reload()" title="Registrar Servicio">Registrar Detalle</button>
                        </div>
                        <div class="col-lg-3">  
                            <a href="../../view/gestionDeServicio/gestionServicio.php" target="_blank" id="etiqueta1">
                                ¿No encontro el servicio en la lista?
                            </a>
                        </div>
                    </div>
                </form>

                <!--Aqui Inicia Datatable-->
                <div class="box box-success">
                    
                    <div class="row">
                    <div class="box-header">
                        <h3 class="box-title">Lista de Servicios</h3>
                    </div>
                        <div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
                            <div class="col-sm-offset-2 col-sm-8">
                                <h3 class="text-center"> <small class="mensaje"></small></h3>
                            </div>
                            <div class="table-responsive col-sm-12">
                                <table id="tabla1" class="table table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Servicio</th>
                                            <th>Area de Trabajo</th>
                                            <th>Cant. Personal</th>
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
                        <form id="frmDeleteServicioPropuesta" action="" method="POST">
                            <input type="hidden" id="idServicioPropuesta" name="idServicioPropuesta" value="0">
                            <input type="hidden" id="opcion" name="opcion" value="eliminar">
                            <!-- Modal Delete-->
                            <div class="modal fade" data-backdrop=”static” id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="modalEliminarLabel">Eliminar Servicio</h4>
                                        </div>

                                        <div class="modal-body">
                                            ¿Está seguro de eliminar el Servicio?<strong data-name=""></strong>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" onclick="location.reload()" id="deleteServicioPropuesta" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
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
                                        <h4 class="modal-title" id="modalUpdateLabel">Actualizar Servicio</h4>
                                    </div>
                                    <!--Modal Body Here-->
                                    <div class="modal-body">
                                        <form id="frmUpdateServicioPropuesta" class="form-horizontal" action="" method="POST">
                                            <input type="hidden" id="idServicioPropuesta" name="idServicioPropuesta" value="0">
                                            <input type="hidden" id="opcion" name="opcion" value="actualizar">

                                            <div class="form-group">
                                                <label for="servicio" class="col-form-label">Servicio:</label>
                                                <input type="text" class="form-control" id="servicio" name="servicio" disabled>
                                            </div>

                                            <div class="form-group">
                                                <label for="area" class="col-form-label">Area de Trabajo:</label>
                                                <input type="text" class="form-control" id="area" name="area" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="cantidad" class="col-form-label">Cantidad Personal:</label>
                                                <input type="number"  min="1" class="form-control" id="cantidad" name="cantidad" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="precio" class="col-form-label">Precio Unitario:</label>
                                                <input type="number" step="0.01" class="form-control"  id="precio" name="precio" required>
                                            </div>

                                        </form>
                                    </div>
                                    <!--Modal Body-->
                                    <div class="modal-footer">
                                        <button type="button" onclick="location.reload()" id="updateServicioPropuesta" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    </div>
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
                        insertar();
                        actualizar();
                        eliminar();
                    });

                    var listar= function(){
                        var cod_presentacion=document.getElementById("codPresentacion").value,
                        opcion="servicio";
                        var d={"cod_presentacion":cod_presentacion,"opcion":opcion};
                        console.log(d);
                        var table=$("#tabla1").DataTable({
                            "destroy":true,
                            "ajax":{
                                "method":"POST",
                                "data":d,
                                "url":"listarDetalleServicioInsumo.php",
                                "dataSrc": "data"
                            },
                            "columns":[
                                {"data":"id_servicio"},
                                {"data":"nombre"},
                                {"data":"area_trabajo"},
                                {"data":"cant_personal"},
                                {"data":"precio_unitario"},
                                {"defaultContent":"<button type='button' class='editar btn bg-purple btn-xs' data-toggle='modal' data-target='#modalUpdate' ><i class='fa fa-pencil-square'></i></button>" +
                                        "<button type='button' class='eliminar btn bg-red btn-xs' data-toggle='modal' data-target='#modalEliminar' ><i class='fa fa-trash-o'></i></button>"}

                            ],
                            "language":idioma_espanol
                        });
                        getDataRow("#tabla1 tbody",table);
                        getIdServicioPropuestaRow("#tabla1 tbody",table);
                    }


                    var getDataRow=function (tbody,table) {
                        $(tbody).on("click","button.editar",function () {
                            var data=table.row($(this).parents("tr")).data();
                            var id_servicio=$("#frmUpdateServicioPropuesta #idServicioPropuesta").val(data.id_servicio),
                                nombre=$("#frmUpdateServicioPropuesta #servicio").val(data.nombre),
                                area_trabajo=$("#frmUpdateServicioPropuesta #area").val(data.area_trabajo),
                                cant_personal=$("#frmUpdateServicioPropuesta #cantidad").val(data.cant_personal),
                                precio_unitario=$("#frmUpdateServicioPropuesta #precio").val(data.precio_unitario);

                        });
                    }

                    var getIdServicioPropuestaRow=function (tbody,table) {
                        $(tbody).on("click","button.eliminar",function () {
                            var data=table.row($(this).parents("tr")).data();
                            var id_servicio=$("#frmDeleteServicioPropuesta #idServicioPropuesta").val(data.id_servicio);

                        });
                    }

                    var insertar=function () {
                        $("#button1").on("click",function () {
                            console.log("aqui");
                            var cod_presentacion=$("#frmInsertServicioPropuesta #codPresentacion").val(),
                                nombre=$("#frmInsertServicioPropuesta #servicio").val(),
                                area_trabajo=$("#frmInsertServicioPropuesta #area").val(),
                                cant_personal=$("#frmInsertServicioPropuesta #cantidad").val(),
                                precio_unitario=$("#frmInsertServicioPropuesta #precio").val(),
                                opcion=$("#frmInsertServicioPropuesta #opcion").val();
                            console.log(nombre);
                            var row={cod_presentacion:cod_presentacion,nombre:nombre,area_trabajo:area_trabajo,cant_personal:cant_personal,precio_unitario:precio_unitario,opcion:opcion};
                            $.ajax({
                                method:"POST",
                                url: "tableDetalleServicioInsumoController.php",
                                data: row,
                                success: function (info) {
                                    console.log(info);
                                }
                            });
                            listar();
                        });
                    }
                    var actualizar=function () {
                        $("#updateServicioPropuesta").on("click",function () {
                            var cod_presentacion=$("#frmInsertServicioPropuesta #codPresentacion").val(),
                                id_servicio=$("#frmUpdateServicioPropuesta #idServicioPropuesta").val(),
                                area_trabajo=$("#frmUpdateServicioPropuesta #area").val(),
                                cant_personal=$("#frmUpdateServicioPropuesta #cantidad").val(),
                                precio_unitario=$("#frmUpdateServicioPropuesta #precio").val(),
                                opcion=$("#frmUpdateServicioPropuesta #opcion").val();

                            var row={cod_presentacion:cod_presentacion,id_servicio:id_servicio,area_trabajo:area_trabajo,cant_personal:cant_personal,precio_unitario:precio_unitario,opcion:opcion};
                            $.ajax({
                                method:"POST",
                                url: "tableDetalleServicioInsumoController.php",
                                data: row,
                                success: function (info) {
                                    console.log(info);
                                }
                            });
                            listar();
                        });
                    }

                    var eliminar=function () {
                        $("#deleteServicioPropuesta").on("click",function () {
                            var cod_presentacion=$("#frmInsertServicioPropuesta #codPresentacion").val(),
                                id_servicio=$("#frmDeleteServicioPropuesta #idServicioPropuesta").val(),
                                opcion=$("#frmDeleteServicioPropuesta #opcion").val();
                              console.log(cod_presentacion);
                            var row={cod_presentacion:cod_presentacion,id_servicio:id_servicio,opcion:opcion};
                            $.ajax({
                                method:"POST",
                                url: "tableDetalleServicioInsumoController.php",
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
<footer>
    <div class="box-footer">
        <a href="https://www.facebook.com/Jezoar-228770924276961/" id="linkFacebook"target="_blank"class="btn btn-block btn-social btn-facebook">
            <i class="fa fa-facebook"></i>
            Página de Facebook de Jezoar
        </a>
    </div>
</footer>
