<?php
$cod_presentacion=$_POST['cod_presentacion'];
$opcion=$_POST['opcion'];

require "../../model/PropuestaModel.php";
$propuesta=new Propuesta();

session_start();
$fecha_hora = date('j-n-Y G:i:s', time());
$username = $_SESSION['user'];
if($opcion=='insertar'){
    $nombreServicio=$_POST['nombre'];
    $area_trabajo=$_POST['area_trabajo'];
    $cant_personal=$_POST['cant_personal'];
    $precio_unitario=$_POST['precio_unitario'];

    $b=$propuesta->agregarServicio($cod_presentacion,$nombreServicio,$area_trabajo,$cant_personal,$precio_unitario);
    if($b){
        $propuesta->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Insercion de Servicio $nombreServicio de la Propuesta Cod. $cod_presentacion', '$fecha_hora');");
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
        $propuesta->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Actualizacion de Servicio Id. $idServicio de la Propuesta Cod. $cod_presentacion', '$fecha_hora');");
        echo json_encode("Actualizado Correctamente");
    }else{
        echo json_encode("Error: No se Actualizo");
    }
}else{
    $idServicio1=$_POST['id_servicio'];
    $b=$propuesta->eliminarServicio($cod_presentacion,$idServicio1);
    if($b){
        $propuesta->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Eliminacion de Servicio Id. $idServicio1 de la Propuesta Cod. $cod_presentacion', '$fecha_hora');");
        echo json_encode("Eliminado Correctamente");
    }else{
        echo json_encode("Error: No se Elimino");
    }
}

?>
