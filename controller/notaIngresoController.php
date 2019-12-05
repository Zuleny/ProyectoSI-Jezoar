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
        echo "Nota De Ingreso Registrada Exitosamente";
        session_start();
        $fecha_hora = date('j-n-Y G:i:s', time());
        $username = $_SESSION['user'];
        $notaIngreso->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Registro de Nota de Ingreso Nro. $notaIngreso->nroIngreso', '$fecha_hora');");
        header('Location: ../view/gestionDeNotaDeIngreso/gestionNotaIngreso.php');
    }else{
        $errorMessage = "<b>Error en proceso de Registro de Nota de Ingreso</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
    }

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