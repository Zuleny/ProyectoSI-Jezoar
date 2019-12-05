<?php

    $nro_ingreso=$_POST['nro_ingreso'];
    $id_ingreso=$_POST['id_ingreso'];

    $opcion=$_POST['opcion'];

    require "../../model/NotaIngresoModel.php";
    $notaIngreso= new NotaIngreso();
    session_start();
    $fecha_hora = date('j-n-Y G:i:s', time());
    $username = $_SESSION['user'];
    if($opcion=='eliminar'){
       $b=$notaIngreso->eliminarDetalleIngreso($nro_ingreso,$id_ingreso);
       if($b){
           $notaIngreso->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Eliminacion de insumo del detalle $id_ingreso de Nota de Ingreso Nro. $nro_ingreso', '$fecha_hora');");
           echo json_encode("Eliminado Correctamente");
       }else{
           echo json_encode("Error: No se Elimino");
       }
    }else if($opcion=='actualizar'){
       $nombre_insumo=$_POST['nombre_insumo'];
       $cantidad=$_POST['cantidad'];
       $precio=$_POST['precio'];
       $b=$notaIngreso->actualizarDetalle($nro_ingreso,$id_ingreso,$nombre_insumo,$cantidad,$precio);
        if($b){
            $notaIngreso->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Actualizacion de insumo del detalle $id_ingreso de Nota de Ingreso Nro. $nro_ingreso', '$fecha_hora');");
            echo json_encode("Actualizado Correctamente");
        }else{
            echo json_encode("Error: No se Actualizo");
        }
    }

?>
