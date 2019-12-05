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
        session_start();
        $fecha_hora = date('j-n-Y G:i:s', time());
        $username = $_SESSION['user'];
        $proveedor->Conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Actualizacion de Proveedor: $nombre de la empresa: $empresa', '$fecha_hora');");
        echo  json_encode("Actualizado Correctamente");
    }

?>
