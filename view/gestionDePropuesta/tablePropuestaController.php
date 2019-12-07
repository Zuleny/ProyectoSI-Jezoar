<?php


    $cod_presentacion=$_POST['cod_presentacion'];
    $opcion=$_POST['opcion'];

    require "../../model/PropuestaModel.php";
    $propuesta=new Propuesta();
    session_start();
    if($opcion=='eliminar'){
       $b=$propuesta->eliminarPropuesta($cod_presentacion);
       if($b){
           echo json_encode("Eliminado Correctamente");
       }else{
           echo json_encode("Error: No se Elimino");
       }
    }else{
       $fecha=$_POST['fecha'];
       $nombre_cliente=$_POST['nombre_cliente'];
       $cant_meses=$_POST['cant_meses'];
       $descripcion_servicio=$_POST['descripcion_servicio'];
       $estado=$_POST['estado'];
       $b=$propuesta->actualizarPropuesta($cod_presentacion,$fecha,$nombre_cliente,$cant_meses,$descripcion_servicio,$estado);
        if($b){

            $fecha_hora = date('j-n-Y G:i:s', time());
            $username = $_SESSION['user'];
            $propuesta->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Actualizacion de Propuesta Cod. $cod_presentacion', '$fecha_hora');");
            echo json_encode("Actualizado Correctamente");
        }else{
            echo json_encode("Error: No se Actualizo");
        }
    }

?>
