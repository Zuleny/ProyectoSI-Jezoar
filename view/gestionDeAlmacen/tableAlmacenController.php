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
        session_start();
        $fecha_hora = date('j-n-Y G:i:s', time());
        $username = $_SESSION['user'];
        $almacen->Conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Actualizacion de Almacen: $nombre', '$fecha_hora');");
        echo  json_encode("Actualizado Correctamente");
    }

?>
