<?php
require "../model/AlmacenModel.php";

$codigo=$_GET['codigo'];
$nombre=$_GET['Almacen'];
$Direccion=$_GET['Dir'];
echo $codigo;
echo $nombre;
echo $Direccion;
$almacen=new Almacen($codigo,$nombre,$Direccion);
$result=$almacen->insertarAlmacen();
header('Location: ../view/gestionDeAlmacen/gestionAlmacen.php');
//echo $codigo;
//echo $nombre;
//echo $Direccion;

?>