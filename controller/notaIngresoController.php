<?php
if(isset($_POST["nombreRecibe"]) &&
isset($_POST["listaProveedor"]) && isset($_POST["listaAlmacen"])){
    $nombreRecibe=$_POST["nombreRecibe"];
    $nombreProveedor=$_POST["listaProveedor"];
    $nombreAlmacen=$_POST["listaAlmacen"];
    require "../model/NotaIngresoModel.php";
    $notaIngreso=new NotaIngreso($nombreRecibe,$nombreAlmacen,$nombreProveedor);
    $b=$notaIngreso->insertarNotaIngreso($nombreRecibe,$nombreAlmacen,$nombreProveedor);
    if($b){
        echo '<script language="javascript">alert("Nota De Ingreso Registrada Exitosamente");</script>';
    }else{
        echo '<script language="javascript">alert("Error al Insertar la Nota De Ingreso");</script>';
    }
    header('Location: ../view/gestionDeNotaDeIngreso/gestionDetalleIngreso.php');
}

function getListaProveedor(){
    require "../../model/NotaIngresoModel.php";
    $notaIngreso2=new NotaIngreso();
    $result2=$notaIngreso2->getListaProveedor();
    $rows=pg_num_rows($result2);
    $printer="";
    for($i=0;$i<$rows;$i++){
       $printer.='<option>'.pg_result($result2,$i,0).'</option>'; 
    }
    return $printer;
}

function getListaAlmacen(){
    
    $notaIngreso1=new NotaIngreso();
    $result1=$notaIngreso1->getListaAlmacen();
    $rows=pg_num_rows($result1);
    $printer="";
    for($i=0;$i<$rows;$i++){
       $printer.='<option>'.pg_result($result1,$i,0).'</option>'; 
    }
    return $printer;
}


?>