
    <?php
        include "../../view/theme/AdminLTE/Additional/head.php";
    ?>

<!-- the fixed layout is not compatible with sidebar-mini -->
        
        <div class="content-wrapper">
            <!-- Titulo de la cabecera -->
            <section class="content-header">
                <h1>
                    Personal
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
            </section>
            <!-- Fin de la cabecera -->
            <!-- contenido -->
            <section class="content">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Gestion de Personal</h3>
                        <div class="box-tools pull-right">
                            <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                        </div>
                    </div>
                   <!-- Inicia tu codigo aqui -->                    
                    <form role="form" method="post" action="../../controller/personalController.php">
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box-body">
                            
                            <div class="col-lg-5">
                                <label>Nombre de Personal</label>
                                <input type="text" class="form-control" placeholder="Escriba nombres y apellidos" name="txtNombrePersonal">
                            </div>

                            <div class="col-lg-3">
                             <div class="form-group" data-select2-id="13">
                               <label>Tipo de Personal</label>
                               <select class="form-control select2 select2-hidden-accessible" name="listaTipoDePersonal">
                                   <option value="F">Fijo</option>
                                   <option value="E">Eventual</option>

                               </select>
                             </div>
                            </div> 

                            <div class="col-lg-4">
                             <div class="form-group" data-select2-id="13">
                               <label>Cargo</label>
                               <select class="form-control select2 select2-hidden-accessible" name="listaDeCargo">
                               <?php
                                      require "../../controller/personalController.php";
                                      $printer=getlistaCargoDePersonal();
                                      echo $printer;      
                                            
                                ?>
                                    
                               </select>
                             </div>
                             </div>
                            
                        </div>
                            
                        
                        <div class="box-body">
                            <div class="col-lg-9"></div>
                            <div class="col-lg-3">
                                <button type="submit" class="btn btn-block btn-success" style="border-radius: 15px;" name="btnInsertarProducto" title="Agregar Servicio">Agregar Registro <i class="fa fa-fw fa-check"></i></button>
                            </div>
                        </div>
                        
                        <!--  Lugar de butons y label y textbox  -->

                    </form>
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Personal</h3>
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
                                            <th class="col-lg-1">Codigo</th>
                                            <th class="col-lg-6">Nombre</th>
                                            <th class="col-lg-1">Tipo</th>
                                            <th class="col-lg-2">Cargo</th>
                                            <th class="col-lg-2"></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div>
                            <form id="frmDeletePersonal" action="" method="POST">
                                <input type="hidden" id="idPersonal" name="idPersonal" value="0">
                                <input type="hidden" id="opcion" name="opcion" value="eliminar">
                                <!-- Modal Delete-->
                                <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="modalEliminarLabel">Eliminar Usuario</h4>
                                            </div>

                                            <div class="modal-body">
                                                ¿Está seguro de eliminar al personal?<strong data-name=""></strong>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" onclick="location.reload()" id="deletePersonal" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
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
                                        <h4 class="modal-title" id="modalUpdateLabel">Actualizar Personal</h4>
                                    </div>
                                    <!--Modal Body Here-->
                                    <div class="modal-body">
                                        <form id="frmUpdatePersonal" class="form-horizontal" action="tablePersonalController.php" method="POST">
                                            <input type="hidden" id="idPersonalFrmUpdate" name="idPersonalFrmUpdate" value="">
                                            <input type="hidden" id="opcion" name="opcion" value="actualizar">

                                            <div class="form-group">
                                                <label for="nombre" class="col-form-label">Nombre:</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre">
                                            </div>
                                            <div class="form-group">
                                                <label for="tipo" class="col-form-label">Tipo:</label>
                                                <input type="text" class="form-control" id="tipo" name="tipo">
                                            </div>
                                            <div class="form-group">
                                                <label for="cargo" class="col-form-label">Cargo:</label>
                                                <input type="text" class="form-control" id="cargo" name="cargo">
                                            </div>

                                        </form>
                                    </div>
                                    <!--Modal Body-->
                                    <div class="modal-footer">
                                        <button type="button" onclick="location.reload()" id="updatePersonal" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Termina tu codigo aqui -->
                </div>

                <?php
                    include "../../view/theme/AdminLTE/Additional/scripts.php";
                ?>

                <script>
                    console.log("aqui");
                    $(document).ready(function(){

                        listar();
                        actualizar();
                    });

                    var listar= function(){
                        console.log("aqui");
                        var table=$("#tabla1").DataTable({
                            "destroy":true,
                            "ajax":{
                                "method":"POST",
                                "url":"listarPersonal.php",
                                "dataSrc": "data"
                            },
                            "columns":[
                                {"data":"id_personal"},
                                {"data":"nombre"},
                                {"data":"tipo"},
                                {"data":"cargo"},
                                {"defaultContent":"<button type='button' class='editar btn bg-purple btn-xs' data-toggle='modal' data-target='#modalUpdate' ><i class='fa fa-pencil-square'></i></button>"}

                            ],
                            "language":idioma_espanol
                        });
                        getDataRow("#tabla1 tbody",table);
                        getIdPersonalRow("#tabla1 tbody",table);
                    }


                    var getDataRow=function (tbody,table) {
                        $(tbody).on("click","button.editar",function () {
                            var data=table.row($(this).parents("tr")).data();
                            var idPersonal=$("#frmUpdatePersonal #idPersonalFrmUpdate").val(data.id_personal),
                                nombre=$("#frmUpdatePersonal #nombre").val(data.nombre),
                                tipo=$("#frmUpdatePersonal #tipo").val(data.tipo),
                                cargo=$("#frmUpdatePersonal #cargo").val(data.cargo);

                        });
                    }

                    var getIdPersonalRow=function (tbody,table) {
                        $(tbody).on("click","button.eliminar",function () {
                            var data=table.row($(this).parents("tr")).data();
                            var id_personal=$("#frmDeletePersonal #idPersonal").val(data.id_personal);
                        });
                    }

                    var actualizar=function () {
                        $("#updatePersonal").on("click",function () {
                            var idPersonal=$("#frmUpdatePersonal #idPersonalFrmUpdate").val(),
                                nombre=$("#frmUpdatePersonal #nombre").val(),
                                tipo=$("#frmUpdatePersonal #tipo").val(),
                                cargo=$("#frmUpdatePersonal #cargo").val(),
                                opcion=$("#frmUpdatePersonal #opcion").val();
                            console.log(opcion);
                            var row={idPersonal:idPersonal,nombre:nombre,tipo:tipo,cargo:cargo,opcion:opcion};
                            $.ajax({
                                method:"POST",
                                url: "tablePersonalController.php",
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
                <div>
                    <a href="https://www.facebook.com/Jezoar-228770924276961/" target="_blank"class="btn btn-block btn-social btn-facebook">
                        <i class="fa fa-facebook"></i>
                        Página de Facebook de Jezoar
                    </a>
                </div>
            </section>
        </div>

