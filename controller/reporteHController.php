<?php
if(isset($_POST["listaAlmacen"])){
    //require_once "../../model/ReporteModel.php";
    $nombreAlmacen=$_POST["listaAlmacen"];
    header("Location: ../view/GestionarReporteInventarioHermamienta/ReporteIventarioHerramienta.php?name=$nombreAlmacen");
}

function getListaDeAlmacen(){
    require "../../model/ReporteModel.php";
    $reporte1=new Reporte();
    $result1=$reporte1->getListDeAlmacen();
    $rows=pg_num_rows($result1);
    $printer="";
    for($i=0;$i<$rows;$i++){
        $printer.='<option>'.pg_result($result1,$i,0).'</option>';
    }
    return $printer;
}

?>
