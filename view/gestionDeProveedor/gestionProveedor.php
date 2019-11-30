<?php
include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Proveedor
            <!-- <small>Blank example to the fixed layout</small> -->
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Gestion de Proveedor</h3>
                <div class="box-tools pull-right">
                    <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                        <span class="glyphicon glyphicon-home"></span></a>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->
            <form role="form" action="../../controller/proveedorController.php" method="post">
                <!--  Lugar de butons y label y textbox  -->
                <div class="box-body">
                    <div class="col-lg-4">
                        <label>Empresa</label>
                        <input type="text" class="form-control" name="empresaProv" placeholder="Empresa para la que trabaja"method="post">
                    </div>
                    <div class="col-lg-4">
                        <label>Correo electrónico</label>
                        <input type="email" class="form-control" name="emailProv" placeholder="Ej.: usuario@servidor.com">
                    </div>
                    <div class="col-lg-2">
                        <label>Telefono</label>
                        <input type="text" class="form-control" name="telProv" placeholder="Telefono de la empresa">
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-lg-4">
                        <label>Direccion</label>
                        <input type="text" class="form-control" name="dirProv" placeholder="Direccion">
                    </div>
                    <div class="col-lg-4">
                        <label>Nombre del Proveedor</label>
                        <input type="text" class="form-control" name="nameProv" placeholder="nombre del proveedor">
                    </div>
                    <div class="col-lg-3">
                        <br>
                        <button type="submit" class="btn btn-block btn-success" style="border-radius: 15px;" name=InsertarProveedor" title="Agregar Proveedor">Agregar Registro
                            <i class="fa fa-fw fa-check"></i>
                        </button>
                    </div>
                </div>
            <!--  Lugar de butons y label y textbox  -->
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Lista de Proveedores</h3>
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
                                            <th class="col-lg-1">Codigo</th>
                                            <th class="col-lg-2">Empresa</th>
                                            <th class="col-lg-2">Correo electrónico</th>
                                            <th class="col-lg-3">Direccion</th>
                                            <th class="col-lg-1">Telefono</th>
                                            <th class="col-lg-2">Nombre</th>
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

                    <form id="frmDeleteProveedor" action="" method="POST">
                                    <input type="hidden" id="idProveedor" name="idProveedor" value="0">
                                    <input type="hidden" id="opcion" name="opcion" value="eliminar">
                                    <!-- Modal Delete-->
                                    <div class="modal fade" data-backdrop=”static” id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-footer">
                                                    <button type="button" onclick="" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div>
                            <!-- Modal Update-->
                            <div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdateLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="modalUpdateLabel">Actualizar Proveedor</h4>
                                        </div>
                                        <!--Modal Body Here-->
                                        <div class="modal-body">
                                            <form id="frmUpdateProveedor" class="form-horizontal" action="" method="POST">
                                                <input type="hidden" id="idProveedorFrmUpdate" name="idProveedorFrmUpdate" value="">
                                                <input type="hidden" id="opcion" name="opcion" value="actualizar">

                                                <div class="form-group">
                                                    <label for="empresa" class="col-form-label">Nombre de Empresa:</label>
                                                    <input type="text" class="form-control" id="empresa" name="empresa">
                                                </div>

                                                <div class="form-group">
                                                    <label for="email" class="col-form-label">Email:</label>
                                                    <input type="text" class="form-control" id="email" name="email">
                                                </div>
                                            
                                                <div class="form-group">
                                                    <label for="direccion" class="col-form-label">Direccion:</label>
                                                    <input type="text" class="form-control" id="direccion" name="direccion">
                                                </div>

                                                <div class="form-group">
                                                    <label for="telefono" class="col-form-label">Telefono:</label>
                                                    <input type="text" class="form-control" id="telefono" name="telefono">
                                                </div>

                                                <div class="form-group">
                                                    <label for="nombreProveedor" class="col-form-label">Nombre del Proveedor:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombreProveedor">
                                                </div>

                                            </form>
                                        </div>
                                        <!--Modal Body-->
                                        <div class="modal-footer">
                                            <button type="button" id="updateProveedor" onclick="location.reload()" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
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
                                var table=$('#tabla1').DataTable({
                                    "destroy":true,
                                    "ajax":{
                                        "method":"POST",
                                        "url":"listarProveedor.php",
                                        "dataSrc": "data"
                                    },
                                    "columns":[
                                        {"data":"cod_proveedor"}, //nombre del data del navegador del listar
                                        {"data":"nombre_empresa"},
                                        {"data":"email"},
                                        {"data":"direccion"},
                                        {"data":"telefono"},
                                        {"data":"nombre_proveedor"},
                                        {"defaultContent":"<button type='button' class='editar btn btn-primary' data-toggle='modal' data-target='#modalUpdate' ><i class='fa fa-pencil-square-o'></i></button>"}

                                    ],
                                    "language":idioma_espanol
                                });
                                console.log("nino");
                                getDataRow("#tabla1 tbody",table);
                            }

                            var getDataRow=function (tbody,table) {
                                console.log("entro");
                                $(tbody).on("click","button.editar",function () {
                                    console.log("aqui");
                                    var data=table.row($(this).parents("tr")).data();
                                    console.log(data);
                                    var codProveedor=$("#frmUpdateProveedor #idProveedorFrmUpdate").val(data.cod_proveedor),
                                        empresa=$("#frmUpdateProveedor #empresa").val(data.nombre_empresa),
                                        email=$("#frmUpdateProveedor #email").val(data.email),
                                        direccion=$("#frmUpdateProveedor #direccion").val(data.direccion),
                                        telefono=$("#frmUpdateProveedor #telefono").val(data.telefono),
                                        nombre=$("#frmUpdateProveedor #nombre").val(data.nombre_proveedor);
                                });
                            }

                            var actualizar=function () {
                                $("#updateProveedor").on("click",function () {
                                    var codProveedor=$("#frmUpdateProveedor #idProveedorFrmUpdate").val(),
                                        empresa=$("#frmUpdateProveedor #empresa").val(),
                                        email=$("#frmUpdateProveedor #email").val(),
                                        direccion=$("#frmUpdateProveedor #direccion").val(),
                                        telefono=$("#frmUpdateProveedor #telefono").val(),
                                        nombre=$("#frmUpdateProveedor #nombre").val(),
                                        opcion=$("#frmUpdateProveedor #opcion").val(); 
                                    console.log(opcion);
                                    var row={cod_proveedor:codProveedor,empresa:empresa,email:email,direccion:direccion,telefono:telefono,nombre:nombre,opcion:opcion};
                                    $.ajax({
                                        method:"POST",
                                        url: "tableProveedorController.php",
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
            </form>
                <!--Datatable termina aqui-->
        </div>  
        <div>
            <a href="https://www.facebook.com/Jezoar-228770924276961/" target="_blank" class="btn btn-block btn-social btn-facebook">
                <i class="fa fa-facebook"></i>
                    Página de Facebook de Jezoar
            </a>
        </div>
    </section>
    <!-- Termina tu codigo aqui -->
</div>

?>  
