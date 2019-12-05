<?php

    $idPersonal = $_POST['idPersonal'];
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $cargo=$_POST['cargo'];
    $opcion=$_POST['opcion'];

    require "../../model/personalModel.php";
    $personal = new Personal($nombre,$tipo,$cargo);
    $b=$personal->actualizarPersonal($idPersonal,$nombre,$tipo,$cargo);
    if(!$b) {
        echo json_encode("Error: No actualizado");
    }else{
        session_start();
        $fecha_hora = date('j-n-Y G:i:s', time());
        $username = $_SESSION['user'];
        $personal->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Actualizacion de Personal Cod. $idPersonal', '$fecha_hora');");
        echo  json_encode("se actualizo correctamente");
    }




?>
