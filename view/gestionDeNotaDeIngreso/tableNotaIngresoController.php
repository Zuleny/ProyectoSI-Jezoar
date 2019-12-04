<?php


    $nro_ingreso=$_POST['nro_ingreso'];
    $opcion=$_POST['opcion'];

    require "../../model/NotaIngresoModel.php";
    $notaIngreso= new NotaIngreso();
    session_start();
    $fecha_hora = date('j-n-Y G:i:s', time());
    $username = $_SESSION['user'];
    if($opcion=='eliminar'){
       $b=$notaIngreso->eliminarNotaIngreso($nro_ingreso);
       if($b){
           $notaIngreso->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Eliminacion de Nota de Ingreso Nro. $nro_ingreso', '$fecha_hora');");
           echo json_encode("Eliminado Correctamente");
       }else{
           echo json_encode("Error: No se Elimino");
       }
    }else{
       $nombre_recibe=$_POST['nombre_recibe'];
       $b=$notaIngreso->actualizarNotaIngreso($nro_ingreso,$nombre_recibe);
        if($b){
            $notaIngreso->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Actualizacion de Nota de Ingreso Nro. $nro_ingreso', '$fecha_hora');");
            echo json_encode("Actualizado Correctamente");
        }else{
            echo json_encode("Error: No se Actualizo");
        }
    }

?>
