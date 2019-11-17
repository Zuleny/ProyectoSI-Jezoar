<?php


    $id_ingreso=$_POST['id_ingreso'];

    $opcion=$_POST['opcion'];

    require "../../model/NotaIngresoModel.php";
    $notaIngreso= new NotaIngreso();
    if($opcion=='eliminar'){
       $b=$notaIngreso->eliminarDetalleIngreso($id_ingreso);
       if($b){
           echo json_encode("Eliminado Correctamente");
       }else{
           echo json_encode("Error: No se Elimino");
       }
    }else{
       $nombre_insumo=$_POST['nombre_insumo'];
       $cantidad=$_POST['cantidad'];
       $precio=$_POST['precio'];
       $b=$notaIngreso->actualizarDetalle($id_ingreso,$nombre_insumo,$cantidad,$precio);
        if($b){
            echo json_encode("Actualizado Correctamente");
        }else{
            echo json_encode("Error: No se Actualizo");
        }
    }

?>
