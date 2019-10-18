function getServicioPorID(id_servicio){
    parametros = {
        "id_servicio" : id_servicio
    }
    $.ajax({
        data : parametros,
        url: '../../controller/servicioController.php?op=obtenerServiciosPorID',
        type : 'POST',
        beforeSend : function(){},
        success : function(response){
            console.log(response);
            alert(id_servicio);
            alert(response);
        }
    })
}