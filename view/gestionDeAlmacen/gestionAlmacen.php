    <?php
        include "../../view/theme/AdminLTE/Additional/head.php";
    ?>

<!-- the fixed layout is not compatible with sidebar-mini -->
        <div class="content-wrapper">
            <!-- Titulo de la cabecera -->
            <section class="content-header">
                <h1>
                    Almacen
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
            </section>
            <!-- Fin de la cabecera -->
            <!-- contenido -->
            <section class="content">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Almacen</h3>
                        <div class="box-tools pull-right">
                            <a href="../../index.php" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                        </div>
                    </div>
                   <!-- Inicia tu codigo aqui -->
                    <form role="form" action="../../controller/almacenController.php" method="post">
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box-body">
                            <div class="col-lg-4">
                                <label>Nombre de Almacen</label>
                                <div class="input-group margin-bottom-sm">
                                    <span class="input-group-addon"><i class="fa fa-home fa-fw" aria-hidden="true"></i></span>
                                    <input type="text" name ="Almacen" required class="form-control" placeholder="nombre del almacen" method="post" method="post" >
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Direccion</label>
                                <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon">
                                    <i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>
                                </span>
                                <input type="text" name="Dir" required placeholder="Direccion del Almacen" class="form-control" >
                            </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-9"></div>
                            <div class="col-lg-3">
                                <button type="submit" class="btn btn-block btn-success" style="border-radius: 15px;" name=InsertarAlmacen" title="Agregar Almacen">Agregar Registro
                                    <i class="fa fa-fw fa-check"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">Lista de Almacen</h3>
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
                                                <th class="col-lg-2">codigo</th>
                                                <th class="col-lg-3">Nombre</th>
                                                <th class="col-lg-4">Direccion</th>
                                                <th class="col-lg-3"></th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
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
                                            <h4 class="modal-title" id="modalUpdateLabel">Actualizar Almacen</h4>
                                        </div>
                                        <!--Modal Body Here-->
                                        <div class="modal-body">
                                            <form id="frmUpdateAlmacen" class="form-horizontal" action="" method="POST">
                                                <input type="hidden" id="idAlmacen" name="idAlmacen" value="0">
                                                <input type="hidden" id="opcion" name="opcion" value="actualizar">

                                                <div class="form-group">
                                                    <label for="nombre" class="col-form-label">Nombre:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre">
                                                </div>

                                                <div class="form-group">
                                                    <label for="direccion" class="col-form-label">Direccion:</label>
                                                    <input type="text" class="form-control" id="direccion" name="direccion">
                                                </div>

                                            </form>
                                        </div>
                                        <!--Modal Body-->
                                        <div class="modal-footer">
                                            <button type="button" id="updateAlmacen" onclick="location.reload()" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" id="idAlmacen" name="idAlmacen" value="">
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
                                        "url":"listarAlmacen.php",
                                        "dataSrc": "data"
                                    },
                                    "columns":[
                                        {"data":"cod_almacen"}, //nombre del data del navegador del listar
                                        {"data":"nombre"},
                                        {"data":"direccion"},
                                        {"defaultContent":"<button type='button' class='editar btn bg-purple btn-xs' data-toggle='modal' data-target='#modalUpdate' ><i class='fa fa-pencil-square-o'></i></button>"+
                                        "<button type='button' class='insumo btn bg-aqua btn-xs' title='Agregar Insumos'><i class='fa fa-fw fa-cubes'></i></button>"}

                                    ],
                                    "language":idioma_espanol
                                });
                                getDataRow("#tabla1 tbody",table);
                                getIdAlmacenRow("#tabla1 tbody",table);
                            }

                            var getDataRow=function (tbody,table) {

                                $(tbody).on("click","button.editar",function () {
                                    var data=table.row($(this).parents("tr")).data();
                                    console.log(data);
                                    var codalmacen=$("#frmUpdateAlmacen #idAlmacen").val(data.cod_almacen);
                                    var nombrealmacen=$("#frmUpdateAlmacen #nombre").val(data.nombre)
                                    var  direccionalmacen=$("#frmUpdateAlmacen #direccion").val(data.direccion);
                                });
                            }

                            var getIdAlmacenRow=function (tbody,table) {
                                $(tbody).on("click","button.insumo",function () {
                                    var data=table.row($(this).parents("tr")).data();
                                    var id_almacen=$("#idAlmacen").val(data.cod_almacen);
                                    var porId=document.getElementById("idAlmacen").value;
                                    console.log(porId);
                                    location.href = "asignacionProductoAlmacen.php?cod_almacen=" + porId;
                                });
                            }

                            var actualizar=function () {
                                $("#updateAlmacen").on("click",function () {
                                    var codalmacen=$("#frmUpdateAlmacen #idAlmacen").val(),
                                        nombrealmacen=$("#frmUpdateAlmacen #nombre").val(),
                                        direccionalmacen=$("#frmUpdateAlmacen #direccion").val(),
                                        opcion=$("#frmUpdateAlmacen #opcion").val(); //actualizar o
                                    console.log("aaa");
                                    var row={codalmacen:codalmacen,nombrealmacen:nombrealmacen,direccionalmacen:direccionalmacen,opcion:opcion};
                                    $.ajax({
                                        method:"POST",
                                        url: "tableAlmacenController.php",
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

                </div>
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

    ?>