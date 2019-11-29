<?php
require "../../model/PropuestaModel.php";
$opcion=$_POST['opcion'];
$cod_presentacion=$_POST['cod_presentacion'];
$propuesta=new Propuesta();

    $result=[];
    $result=$propuesta->getListaInsumoPropuesta($cod_presentacion);
    echo json_encode($result)."\n";

?>
