<?php

    $codproveedor = $_POST['cod_proveedor'];
    $empresa= $_POST['empresa'];
    $email= $_POST['email'];
    $direccion= $_POST['direccion'];
    $telefono= $_POST['telefono'];
    $nombre= $_POST['nombre'];
    $opcion=$_POST['opcion'];
    
    require "../../model/ProveedorModel.php";
    $proveedor=new Proveedor($codproveedor,$empresa,$email,$direccion,$telefono,$nombre);
    $b=$proveedor->actualizarProveedor($codproveedor,$empresa,$email,$direccion,$telefono,$nombre);
    if(!$b) {
        echo json_encode("Error: No actualizado");
    }else{
        echo  json_encode("Actualizado Correctamente");
    }

?>
