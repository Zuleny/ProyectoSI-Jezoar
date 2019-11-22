<?php
function getClienteInforme(){
    require "../../model/informeModel.php";
    $informes=new Informe();
    $result1=$informes->listaCliente();
    $rows=pg_num_rows($result1);
    $printer="";
    for($i=0;$i<$rows;$i++){
        $printer.='<option>'.pg_result($result1,$i,0).'</option>';
    }
    return $printer;
}
//echo $_POST["descripcion"];
if(isset($_POST["nombreCliente"]) && isset($_POST["descripcion"]) ) {
    $nombreCliente = $_POST["nombreCliente"];
    $descripcion = $_POST["descripcion"];
    require '../model/informeModel.php';
    $informe= new Informe($nombreCliente,$descripcion);
    $image= $_POST['image2'];
    $image2= $_POST['image3'];
    $result = pg_escape_string($image);

    $result2 = pg_escape_string($image2);

    //$im = imageCreateFromString($result);
    $informe->registrarInforme($result,$result2);
    session_start();
    $_SESSION['image2']=$result;
    $_SESSION['image3']=$result2;
    header("Location: ../view/gestionDeInforme/informe.php/?des=".$descripcion."&cliente=".$nombreCliente);
}


