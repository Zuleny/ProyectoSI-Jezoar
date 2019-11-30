<?php
    $cod_almacen = $_POST['codalmacen'];
    $nombre = $_POST['nombrealmacen'];
    $direccion = $_POST['direccionalmacen'];
    $opcion=$_POST['opcion'];
    
    require "../../model/AlmacenModel.php";
    $almacen=new Almacen($cod_almacen,$nombre,$direccion);
    $b=$almacen->actualizarAlmacen($cod_almacen,$nombre,$direccion);
    if(!$b) {
        echo json_encode("Error: No actualizado");
    }else{
        echo  json_encode("Actualizado Correctamente");
    }

?>
