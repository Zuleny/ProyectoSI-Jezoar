<?php
$cod_presentacion=$_POST['cod_presentacion'];
$opcion=$_POST['opcion'];

require "../../model/PropuestaModel.php";
$propuesta=new Propuesta();
if($opcion=='insertar'){
    $nombreServicio=$_POST['nombre'];
    $area_trabajo=$_POST['area_trabajo'];
    $cant_personal=$_POST['cant_personal'];
    $precio_unitario=$_POST['precio_unitario'];

    $b=$propuesta->agregarServicio($cod_presentacion,$nombreServicio,$area_trabajo,$cant_personal,$precio_unitario);
    if($b){
        echo json_encode("Insertado Correctamente");
    }else{
        echo json_encode("Error: No se Inserto");
    }
}else if($opcion=='actualizar'){
    $idServicio=$_POST['id_servicio'];
    $area_trabajo=$_POST['area_trabajo'];
    $cant_personal=$_POST['cant_personal'];
    $precio_unitario=$_POST['precio_unitario'];
    $b=$propuesta->actualizarServicio($cod_presentacion,$idServicio,$area_trabajo,$cant_personal,$precio_unitario);
    if($b){
        echo json_encode("Actualizado Correctamente");
    }else{
        echo json_encode("Error: No se Actualizo");
    }
}else{
    $idServicio1=$_POST['id_servicio'];
    $b=$propuesta->eliminarServicio($cod_presentacion,$idServicio1);
    if($b){
        echo json_encode("Eliminado Correctamente");
    }else{
        echo json_encode("Error: No se Elimino");
    }
}

?>
