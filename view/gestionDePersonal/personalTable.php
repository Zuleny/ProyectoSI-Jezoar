
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Lista de Personal</title>
	<link rel="stylesheet" href="../../public/assets/AdminLTE/bower_components/datatables.net/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../public/assets/AdminLTE/bower_components/datatables.net/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="../../public/assets/AdminLTE/bower_components/datatables.net/css/estilos.css">
	<!-- Buttons DataTables -->
	<link rel="stylesheet" href="../../public/assets/AdminLTE/bower_components/datatables.net/css/buttons.bootstrap.min.css">
	<link rel="stylesheet" href="../../public/assets/AdminLTE/bower_components/datatables.net/css/font-awesome.min.css">

</head>
<body>
	<div class="row fondo">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<h1 class="text-center text-uppercase">Lista Personal</h1>
		</div>
	</div>

	<div class="row">
		<div id="cuadro1" class="col-sm-12 col-md-12 col-lg-12">
			<div class="col-sm-offset-2 col-sm-8">
				<h3 class="text-center"> <small class="mensaje"></small></h3>
			</div>
			<div class="table-responsive col-sm-12">		
				<table id="dt_personal" class="table table-bordered table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>								
							<th class="col-lg-1">Codigo</th>
							<th class="col-lg-7">Nombre</th>
							<th class="col-lg-1">Tipo</th>
							<th class="col-lg-2">Cargo</th>
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
							<button type="button" onclick="" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
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
                            <button type="button" id="updatePersonal" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>

    </div>
	
	<script src="../../public/assets/AdminLTE/bower_components/datatables.net/js/jquery-1.12.3.js"></script>
	<script src="../../public/assets/AdminLTE/bower_components/datatables.net/js/bootstrap.min.js"></script>
	<script src="../../public/assets/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="../../public/assets/AdminLTE/bower_components/datatables.net/js/dataTables.bootstrap.js"></script>
	<!--botones DataTables-->	
	<script src="../../public/assets/AdminLTE/bower_components/datatables.net/js/dataTables.buttons.min.js"></script>
	<script src="../../public/assets/AdminLTE/bower_components/datatables.net/js/buttons.bootstrap.min.js"></script>
	<!--Libreria para exportar Excel-->
	<script src="../../public/assets/AdminLTE/bower_components/datatables.net/js/jszip.min.js"></script>
	<!--Librerias para exportar PDF-->
	<script src="../../public/assets/AdminLTE/bower_components/datatables.net/js/pdfmake.min.js"></script>
	<script src="../../public/assets/AdminLTE/bower_components/datatables.net/js/vfs_fonts.js"></script>
	<!--Librerias para botones de exportación-->
	<script src="../../public/assets/AdminLTE/bower_components/datatables.net/js/buttons.html5.min.js"></script>

	<script>

	$(document).on("ready",function(){
       listar();
       actualizar();
    });

   var listar= function(){
     var table=$("#dt_personal").DataTable({
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
          {"defaultContent":"<button type='button' class='editar btn btn-primary' data-toggle='modal' data-target='#modalUpdate' ><i class='fa fa-pencil-square-o'></i></button>" +
                  "<button type='button' class='eliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar' ><i class='fa fa-trash-o'></i></button>"}

        ],
       "language":idioma_espanol
     });
     getDataRow("#dt_personal tbody",table);
     getIdPersonalRow("#dt_personal tbody",table);
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
</body>
</html>
