function editarServicio(id){
    var id= id;
    $.ajax({
        data : {id: id},
        url : '../../controller/servicioController.php',
        type : 'post',
        datatype : 'json',
        async : false,
        error : function(X){
            alert("ha ocurrido un error en el modal");
        },
        success: function(respuesta){
            if (respuesta) {
                document.getElementById('idServicioModifcar').value=respuesta.id_servicio;
                document.getElementById('nombreServicioModifcar').value=respuesta.nombre;
                document.getElementById('descripcionServicioModifcar').value=respuesta.detalle;
                $('#modal-default').modal("toggle");
            }
        }
    });
};