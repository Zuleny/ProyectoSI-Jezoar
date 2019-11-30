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
                <h3 class="box-title">Detalle Insumo de Propuesta Nro:
                    <b><?php echo $_GET['cod_presentacion']; ?></b>
                </h3>
                <div class="box-tools pull-right">
                    <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                        <span class="glyphicon glyphicon-home"></span></a>
                </div>

                <form id="frmInsertInsumoPropuesta" action="" method="POST">
                    <input type="hidden" id="opcion" name="opcion" value="insertar">
                    <?php
                    $codPresentacion=$_GET['cod_presentacion'];
                    echo '<input type="hidden" id="codPresentacion" name="codPresentacion" value="'.$codPresentacion.'">'
                    ?>
                    <div class="form-group col-md-12">
                        <div class="col-lg-6">
                            <label>Insumo</label>
                            <select class="form-control" name="insumo" id="insumo">
                                <?php
                                require "../../controller/propuestaController.php";
                                $result=getListaInsumos();
                                $nroFilas=pg_num_rows($result);
                                for ($tupla=0; $tupla <$nroFilas ; $tupla++) {
                                    echo '<option value="'.pg_result($result,$tupla,0).'">'.pg_result($result,$tupla,0).'</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-lg-2">
                            <label>Cant. Insumo</label>
                            <input type="number" class="form-control" min="1" step=".01" name="cantInsumo" id="cantInsumo" required placeholder="5"/>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <button type="button" class="btn btn-block btn-success" id="button1"  title="Registrar Insumo">Registrar Detalle</button>
                    </div>

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
                            <h3 class="box-title">Lista de Insumos</h3>
                        </div>
                        <div class="col-sm-offset-2 col-sm-8">
                            <h3 class="text-center"> <small class="mensaje"></small></h3>
                        </div>
                        <div class="table-responsive col-sm-12">
                            <table id="tabla1" class="table table-bordered table-hover" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Insumo</th>
                                    <th>Cant. Insumo</th>
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
                    <form id="frmDeleteInsumoPropuesta" action="" method="POST">
                        <input type="hidden" id="idInsumoPropuesta" name="idInsumoPropuesta" value="0">
                        <input type="hidden" id="opcion" name="opcion" value="eliminar">
                        <!-- Modal Delete-->
                        <div class="modal fade" data-backdrop=”static” id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="modalEliminarLabel">Eliminar Insumo</h4>
                                    </div>

                                    <div class="modal-body">
                                        ¿Está seguro de eliminar el Insumo?<strong data-name=""></strong>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" onclick="location.reload()" id="deleteInsumoPropuesta" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
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
                                    <h4 class="modal-title" id="modalUpdateLabel">Actualizar Insumo</h4>
                                </div>
                                <!--Modal Body Here-->
                                <div class="modal-body">
                                    <form id="frmUpdateInsumoPropuesta" class="form-horizontal" action="" method="POST">
                                        <input type="hidden" id="idInsumoPropuesta" name="idInsumoPropuesta" value="0">
                                        <input type="hidden" id="opcion" name="opcion" value="actualizar">

                                        <div class="form-group">
                                            <label for="insumo" class="col-form-label">Insumo:</label>
                                            <input type="text" class="form-control" id="insumo" name="insumo" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="cantInsumo" class="col-form-label">Cant. Insumo:</label>
                                            <input type="number" step="0.01" class="form-control"  id="cantInsumo" name="cantInsumo" required>
                                        </div>

                                    </form>
                                </div>
                                <!--Modal Body-->
                                <div class="modal-footer">
                                    <button type="button" onclick="location.reload()" id="updateInsumoPropuesta" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div>
                    <h3>
                        <b></b>
                    </h3>
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
                            opcion="insumo";
                        var d={"cod_presentacion":cod_presentacion,"opcion":opcion};
                        console.log(d);
                        var table=$("#tabla1").DataTable({
                            "destroy":true,
                            "ajax":{
                                "method":"POST",
                                "data":d,
                                "url":"listarDetalleInsumo.php",
                                "dataSrc": "data"
                            },
                            "columns":[
                                {"data":"cod_insumo"},
                                {"data":"nombre"},
                                {"data":"cant_insumo"},
                                {"defaultContent":"<button type='button' class='editar btn bg-purple btn-xs' data-toggle='modal' data-target='#modalUpdate' ><i class='fa fa-pencil-square'></i></button>" +
                                        "<button type='button' class='eliminar btn bg-red btn-xs' data-toggle='modal' data-target='#modalEliminar' ><i class='fa fa-trash-o'></i></button>"}

                            ],
                            "language":idioma_espanol
                        });
                        getDataRow("#tabla1 tbody",table);
                        getIdInsumoPropuestaRow("#tabla1 tbody",table);
                    }


                    var getDataRow=function (tbody,table) {
                        $(tbody).on("click","button.editar",function () {
                            var data=table.row($(this).parents("tr")).data();
                            console.log(data);
                            var cod_insumo=$("#frmUpdateInsumoPropuesta #idInsumoPropuesta").val(data.cod_insumo),
                                nombre=$("#frmUpdateInsumoPropuesta #insumo").val(data.nombre),
                                cant_insumo=$("#frmUpdateInsumoPropuesta #cantInsumo").val(data.cant_insumo);

                        });
                    }

                    var getIdInsumoPropuestaRow=function (tbody,table) {
                        $(tbody).on("click","button.eliminar",function () {
                            var data=table.row($(this).parents("tr")).data();
                            var cod_insumo=$("#frmDeleteInsumoPropuesta #idInsumoPropuesta").val(data.cod_insumo);

                        });
                    }

                    var insertar=function () {
                        $("#button1").on("click",function () {
                            var cod_presentacion=$("#frmInsertInsumoPropuesta #codPresentacion").val(),
                                nombre=$("#frmInsertInsumoPropuesta #insumo").val(),
                                cant_insumo=$("#frmInsertInsumoPropuesta #cantInsumo").val(),
                                opcion=$("#frmInsertInsumoPropuesta #opcion").val();
                            console.log(nombre);
                            var row={};
                            row={cod_presentacion:cod_presentacion,nombre:nombre,cant_insumo:cant_insumo,opcion:opcion};
                            $.ajax({
                                method:"POST",
                                url: "tableDetalleInsumoController.php",
                                data: row,
                                success: function (info) {
                                    console.log(info);
                                }
                            });
                            listar();
                        });
                    }

                    var actualizar=function () {
                        $("#updateInsumoPropuesta").on("click",function () {
                            var cod_presentacion=$("#frmInsertInsumoPropuesta #codPresentacion").val(),
                                cod_insumo=$("#frmUpdateInsumoPropuesta #idInsumoPropuesta").val(),
                                cant_insumo=$("#frmUpdateInsumoPropuesta #cantInsumo").val(),
                                opcion=$("#frmUpdateInsumoPropuesta #opcion").val();
                            var row={};
                            row={cod_presentacion:cod_presentacion,cod_insumo:cod_insumo,cant_insumo:cant_insumo,opcion:opcion};
                            $.ajax({
                                method:"POST",
                                url: "tableDetalleInsumoController.php",
                                data: row,
                                success: function (info) {
                                    console.log(info);
                                }
                            });
                            listar();
                        });
                    }

                    var eliminar=function () {
                        $("#deleteInsumoPropuesta").on("click",function () {
                            var cod_presentacion=$("#frmInsertInsumoPropuesta #codPresentacion").val(),
                                cod_insumo=$("#frmDeleteInsumoPropuesta #idInsumoPropuesta").val(),
                                opcion=$("#frmDeleteInsumoPropuesta #opcion").val();
                            console.log(cod_insumo);
                            var row={};
                            row={cod_presentacion:cod_presentacion,cod_insumo:cod_insumo,opcion:opcion};
                            $.ajax({
                                method:"POST",
                                url: "tableDetalleInsumoController.php",
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

