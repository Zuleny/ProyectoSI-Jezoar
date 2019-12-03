<?php
include "../../view/theme/AdminLTE/Additional/head.php";
?>

<!-- the fixed layout is not compatible with sidebar-mini -->

<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Propuesta
            <!-- <small>Blank example to the fixed layout</small> -->
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Gestion de Propuesta</h3>
                <div class="box-tools pull-right">
                    <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                        <span class="glyphicon glyphicon-home"></span></a>
                </div>

                <!-- Inicia tu codigo aqui -->
                <form role="form" method="post" action="../../controller/propuestaController.php">
                    <!--  Lugar de butons y label y textbox  -->

                    <div class="box-body">
                        <div class="col-lg-4">
<<<<<<< HEAD
                            <label>Nombre Cliente</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Yerba Buena">
=======
                            <label>Fecha</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="date" class="form-control" name="fecha" required>
                            </div>
>>>>>>> origin
                        </div>
                        <div class="col-lg-3 form-group">
                            <label>Nombre Cliente</label>
                            <select class="form-control" name="nombreCliente" >
                                <?php
                                require "../../controller/propuestaController.php";
                                $result=getListaCliente();
                                $nroFilas=pg_num_rows($result);
                                for ($tupla=0; $tupla <$nroFilas ; $tupla++) {
                                    echo '<option value="'.pg_result($result,$tupla,0).'">'.pg_result($result,$tupla,0).'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label>Cant. Meses</label>
                            <input type="number" id="cantidadMeses" name="cantidadMeses" min="1" class="form-control" placeholder="6" required>
                        </div>

                        <div class="col-lg-7 form-group" style="background-color: #D4EFDF;" required >
                            <label>Estado</label>
                            <br>
                            <div class="col-md-3">
                                <p><input type="radio" name="estadoP" value="Aceptado">Aceptado</p>
                            </div>
                            <div class="col-md-3">
                                <p><input type="radio" name="estadoP" value="Espera" checked>En Espera</p>
                            </div>
                            <div class="col-md-3">
                                <p><input type="radio" name="estadoP" value="Denegado">Denegado</p>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label>Precio Total</label>
                            <input type="text" class="form-control" step="0.01" placeholder="Precio Total" value="0.0 Bs." disabled>
                            <input type="hidden" name="precio" value="0.0">
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-block btn-success" id="button1" name="InsertarPropuesta" title="Agregar Propuesta">Agregar Registro
                                <i class="fa fa-fw fa-check"></i>
                            </button>
                        </div>
                    </div>

                    <!--  Lugar de butons y label y textbox  -->
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
                                    <th>Fecha</th>
                                    <th>Nombre Cliente</th>
                                    <th>Cant Meses</th>
                                    <th>Estado</th>
                                    <th>Total</th>
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
                    <form id="frmDeletePropuesta" action="" method="POST">
                        <input type="hidden" id="idPropuesta" name="idPropuesta" value="0">
                        <input type="hidden" id="opcion" name="opcion" value="eliminar">
                        <!-- Modal Delete-->
                        <div class="modal fade" data-backdrop=”static” id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="modalEliminarLabel">Eliminar Propuesta</h4>
                                    </div>

                                    <div class="modal-body">
                                        ¿Está seguro de eliminar la Propuesta?<strong data-name=""></strong>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="deletePropuesta" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
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
                                    <h4 class="modal-title" id="modalUpdateLabel">Actualizar Propuesta</h4>
                                </div>
                                <!--Modal Body Here-->
                                <div class="modal-body">
                                    <form id="frmUpdatePropuesta" class="form-horizontal" action="" method="POST">
                                        <input type="hidden"  id="idPropuesta" name="idPropuesta" value="">
                                        <input type="hidden" id="opcion" name="opcion" value="actualizar">

                                        <div class="form-group">
                                            <label>Fecha</label>
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="date" class="form-control" id="fecha" name="fecha">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre" class="col-form-label">Nombre Cliente:</label>
                                            <select class="form-control" name="nombre" id="nombre">
                                            <?php
                                            $result=getListaClientes();
                                            $nroFilas=pg_num_rows($result);
                                            for ($tupla=0; $tupla <$nroFilas ; $tupla++) {
                                                echo '<option  value="'.pg_result($result,$tupla,0).'" >'.pg_result($result,$tupla,0).'</option>';
                                            }
                                            ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="cantidad" class="col-form-label">Cantidad:</label>
                                            <input type="number"  min="1" class="form-control" id="cantidad" name="cantidad" required>
                                        </div>

                                        <div class="form-group">
                                            <select class="form-control" name="estado" id="estado">
                                                <?php
                                                   echo '<option  value="Aceptado" >Aceptado</option>';
                                                   echo '<option  value="Espera" >Espera</option>';
                                                   echo '<option  value="Denegado" >Denegado</option>';
                                                ?>
                                            </select>
                                         </div>



                                    </form>
                                </div>
                                <!--Modal Body-->
                                <div class="modal-footer">
                                    <button type="button" id="updatePropuesta" onclick="location.reload()" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div>
                    <form id="frmPropuesta" action="" method="POST">
                        <input type="hidden" id="idFrmPropuestaInsumo" name="idFrmPropuestaInsumo" value="0">
                        <input type="hidden" id="idFrmPropuestaServicio" name="idFrmPropuestaServicio" value="0">
                        <input type="hidden" id="opcion" name="opcion" value="visualizar">
                    </form>

                </div>

                <?php
                   include "../../view/theme/AdminLTE/Additional/scripts.php";
                ?>

                <script>

                    $(document).ready(function(){
                        listar();
                        actualizar();
                        eliminar();

                    });
                    //Lista los datos devueltos del servidor
                    var listar= function(){
                        var table=$("#tabla1").DataTable({
                            "destroy":true,
                            "ajax":{
                                "method":"POST",
                                "url":"listarPropuesta.php",
                                "dataSrc": "data"
                            },
                            "columns":[
                                {"data":"cod_presentacion"},
                                {"data":"fecha"},
                                {"data":"getnombrecliente"},
                                {"data":"cant_meses"},
                                {"data":"estado",
                                        "render": function ( data ) {
                                                      if(data=="Aceptado"){
                                                          return "<span class='label label-success'>Aceptado</span>";
                                                      }else if(data=="Espera"){
                                                          return "<span class='label label-warning'>Espera</span>";
                                                      }else{
                                                          return "<span class='label label-danger'>Denegado</span>";
                                                      }
                                        }
                                },
                                {"data":"precio_total"},
                                {"defaultContent":" <button type='button' class='insumo btn bg-aqua btn-xs' id='visualizar' title='Agregar Insumos'><i class='fa fa-fw fa-cubes'></i></button>"+
                                        "<button type='button' class='servicio btn btn-xs bg-light-blue btn-sm' id='visualizar' title='Agregar Servicios'><span class='glyphicon glyphicon-briefcase' aria-hidden='true'></span></button>"+
                                        "<button type='button' class='editar btn bg-purple btn-xs' data-toggle='modal' data-target='#modalUpdate' title='Editar'><i class='fa fa-pencil-square'></i></button>" +
                                        "<button type='button' class='eliminar btn bg-red btn-xs' data-toggle='modal' data-target='#modalEliminar' title='Eliminar'><i class='fa fa-trash-o'></i></button>"}

                            ],
                            "language":idioma_espanol
                        });
                        getDataRow("#tabla1 tbody",table);
                        getIdPropuestaRow("#tabla1 tbody",table);
                        getIdPropuestaServicio("#tabla1 tbody",table);
                        getIdPropuestaInsumo("#tabla1 tbody",table);
                    }

                    //Settear los valores devueltos por el servidor(database) al sus respectivos inputs del modal editar
                    var getDataRow=function (tbody,table) {
                        $(tbody).on("click","button.editar",function () {
                            var data=table.row($(this).parents("tr")).data();
                            var cod_presentacion=$("#frmUpdatePropuesta #idPropuesta").val(data.cod_presentacion),
                                fecha=$("#frmUpdatePropuesta #fecha").val(data.fecha),
                                nombre_cliente=$("#frmUpdatePropuesta #nombre").val(data.getnombrecliente),
                                cant_meses=$("#frmUpdatePropuesta #cantidad").val(data.cant_meses),
                                estado=$("#frmUpdatePropuesta #estado").val(data.estado);
                            console.log(data.estado);

                        });
                    }

                    //Settear los valores devueltos por el servidor(database) al sus respectivos inputs del modal eliminar
                    var getIdPropuestaRow=function (tbody,table) {
                        $(tbody).on("click","button.eliminar",function () {
                            var data=table.row($(this).parents("tr")).data();
                            var cod_presentacion=$("#frmDeletePropuesta #idPropuesta").val(data.cod_presentacion);
                        });
                    }

                    //Settear los valores devueltos por el servidor(database) al sus respectivos inputs para visualizar los detalles de dico nro de Ingreeso
                    var getIdPropuestaServicio=function (tbody,table) {
                        $(tbody).on("click","button.servicio",function () {
                            var data=table.row($(this).parents("tr")).data();
                            var cod_presentacion=$("#frmPropuesta #idFrmPropuestaServicio").val(data.cod_presentacion);
                            var porId=document.getElementById("idFrmPropuestaServicio").value;
                            console.log(porId);
                            location.href = "detalleServicioPropuesta.php?cod_presentacion=" + porId;
                        });
                    }

                    //Settear los valores devueltos por el servidor(database) al sus respectivos inputs para visualizar los detalles de dico nro de Ingreeso
                    var getIdPropuestaInsumo=function (tbody,table) {
                        $(tbody).on("click","button.insumo",function () {
                            var data=table.row($(this).parents("tr")).data();
                            var cod_presentacion=$("#frmPropuesta #idFrmPropuestaInsumo").val(data.cod_presentacion);
                            var porId=document.getElementById("idFrmPropuestaInsumo").value;
                            console.log(porId);
                            location.href = "detalleInsumoPropuesta.php?cod_presentacion=" + porId;
                        });
                    }
                    //Metodo Actualizar ( hace una peticion al servidor)
                    var actualizar=function () {
                        $("#updatePropuesta").on("click",function () {
                            var cod_presentacion=$("#frmUpdatePropuesta #idPropuesta").val(),
                                fecha=$("#frmUpdatePropuesta #fecha").val(),
                                nombre_cliente=$("#frmUpdatePropuesta #nombre").val(),
                                cant_meses=$("#frmUpdatePropuesta #cantidad").val(),
                                estado=$("#frmUpdatePropuesta #estado").val(),
                                opcion=$("#frmUpdatePropuesta #opcion").val();
                            var row={cod_presentacion:cod_presentacion,fecha:fecha, nombre_cliente:nombre_cliente, cant_meses:cant_meses, estado:estado, opcion:opcion};
                            $.ajax({
                                method:"POST",
                                url: "tablePropuestaController.php",
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
                        $("#deletePropuesta").on("click",function () {
                            var cod_presentacion=$("#frmDeletePropuesta #idPropuesta").val();
                                opcion=$("#frmDeletePropuesta #opcion").val();
                            console.log(cod_presentacion);
                            var row={cod_presentacion:cod_presentacion,opcion:opcion};
                            $.ajax({
                                method:"POST",
                                url: "tablePropuestaController.php",
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
