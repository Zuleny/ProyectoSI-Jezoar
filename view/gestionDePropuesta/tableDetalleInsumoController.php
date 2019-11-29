<?php
$cod_presentacion=$_POST['cod_presentacion'];
$opcion=$_POST['opcion'];

require "../../model/PropuestaModel.php";
$propuesta=new Propuesta();
if($opcion=='insertar'){
    $nombreInsumo=$_POST['nombre'];
    $cant_insumo=$_POST['cant_insumo'];
    $b=$propuesta->agregarInsumo($cod_presentacion,$nombreInsumo,$cant_insumo);
    if($b){
        echo json_encode("Insertado Correctamente");
    }else{
        echo json_encode("Error: No se Inserto");
    }
}else if($opcion=='actualizar'){
    $cod_insumo=$_POST['cod_insumo'];
    $cant_insumo=$_POST['cant_insumo'];
    $b=$propuesta->actualizarInsumo($cod_presentacion,$cod_insumo,$cant_insumo);
    if($b){
        echo json_encode("Actualizado Correctamente");
    }else{
        echo json_encode("Error: No se Actualizo");
    }
}else{
    $cod_insumo=$_POST['cod_insumo'];
    $b=$propuesta->eliminarInsumo($cod_presentacion,$cod_insumo);
    if($b){
        echo json_encode("Eliminado Correctamente");
    }else{
        echo json_encode("Error: No se Elimino");
    }
}

?>
