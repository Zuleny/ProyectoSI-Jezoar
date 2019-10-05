<?php
require "../model/productoModel.php";


$codProducto = $_POST["txtCodProd"];
$nombreProducto = $_POST["txtNombreProd"];
$marca = $_POST["txtMarca"];
$precioUnitario = $_POST["txtPrecioUnitario"];
$descripcion=$_POST["txtDescripcion"];
$listaDeCategoria=$_POST["listaDeCategoria"];



$producto = new Producto($codProducto,$nombreProducto,$marca,$precioUnitario,$descripcion,$listaDeCategoria);
$producto->insertarProducto();



echo $codProducto;
echo $nombreProducto;
echo $marca;
echo $precioUnitario;
echo $descripcion;
echo $listaDeCategoria;

header('Location: ../view/gestionDeProducto/gestionProducto.php');

?>