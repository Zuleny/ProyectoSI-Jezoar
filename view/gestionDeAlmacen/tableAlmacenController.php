<?php

    $codalmacen = $_POST['codalmacen'];
    $nombrealmacen = $_POST['nombrealmacen'];
    $direccionalmacen = $_POST['direccionalmacen'];
    $opcion=$_POST['opcion'];
    
    require "../../model/AlmacenModel.php";
    $almacen=new Almacen($codalmacen,$nombrealmacen,$direccionalmacen);
    $b=$almacen->actualizarAlmacen($codalmacen,$nombrealmacen,$direccionalmacen);
    if(!$b) {
        echo json_encode("Error: No actualizado");
    }else{
        echo  json_encode("Actualizado Correctamente");
    }

?>
