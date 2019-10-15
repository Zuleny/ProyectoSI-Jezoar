<?php
require "../model/HerramientaModel.php";

$codigo=$_GET['codigo'];
$nombre=$_GET['nombre'];
$Descripcion=$_GET['descripcion'];
$Estado=$_GET['estado'];
//$almacen=new Almacen($codigo,$nombre,$Direccion);
echo $codigo;
echo $nombre;
echo $Descripcion;
echo $Estado;
$herramienta=new Herramienta($codigo,$nombre,$Descripcion,$Estado);
$result=$herramienta->insertarHerramienta();
header('Location: ../view/gestionDeHerramienta/gestionHerramienta.php');
?>