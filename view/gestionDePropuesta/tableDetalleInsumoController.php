<?php
$cod_presentacion=$_POST['cod_presentacion'];
$opcion=$_POST['opcion'];

require "../../model/PropuestaModel.php";
$propuesta=new Propuesta();
session_start();
$fecha_hora = date('j-n-Y G:i:s', time());
$username = $_SESSION['user'];
if($opcion=='insertar'){
    $nombreInsumo=$_POST['nombre'];
    $cant_insumo=$_POST['cant_insumo'];
    $b=$propuesta->agregarInsumo($cod_presentacion,$nombreInsumo,$cant_insumo);
    if($b){
        $propuesta->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Insercion de Insumo $nombreInsumo de la Propuesta Cod. $cod_presentacion', '$fecha_hora');");
        echo json_encode("Insertado Correctamente");
    }else{
        echo json_encode("Error: No se Inserto");
    }
}else if($opcion=='actualizar'){
    $cod_insumo=$_POST['cod_insumo'];
    $cant_insumo=$_POST['cant_insumo'];
    $b=$propuesta->actualizarInsumo($cod_presentacion,$cod_insumo,$cant_insumo);
    if($b){
        $propuesta->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Actualizacion de Insumo Cod. $cod_insumo de la Propuesta Cod. $cod_presentacion', '$fecha_hora');");
        echo json_encode("Actualizado Correctamente");
    }else{
        echo json_encode("Error: No se Actualizo");
    }
}else{
    $cod_insumo=$_POST['cod_insumo'];
    $b=$propuesta->eliminarInsumo($cod_presentacion,$cod_insumo);
    if($b){
        $propuesta->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Eliminacion de Insumo Cod. $cod_insumo de la Propuesta Cod. $cod_presentacion', '$fecha_hora');");
        echo json_encode("Eliminado Correctamente");
    }else{
        echo json_encode("Error: No se Elimino");
    }
}

?>
