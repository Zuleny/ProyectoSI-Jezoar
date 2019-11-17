<?php


    $nro_ingreso=$_POST['nro_ingreso'];
    $opcion=$_POST['opcion'];

    require "../../model/NotaIngresoModel.php";
    $notaIngreso= new NotaIngreso();
    if($opcion=='eliminar'){
       $b=$notaIngreso->eliminarNotaIngreso($nro_ingreso);
       if($b){
           echo json_encode("Eliminado Correctamente");
       }else{
           echo json_encode("Error: No se Elimino");
       }
    }else{
       $nombre_recibe=$_POST['nombre_recibe'];
       $b=$notaIngreso->actualizarNotaIngreso($nro_ingreso,$nombre_recibe);
        if($b){
            echo json_encode("Actualizado Correctamente");
        }else{
            echo json_encode("Error: No se Actualizo");
        }
    }

?>
