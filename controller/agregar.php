<?php
require_once "../model/Producto.php";

$cantidad = $_POST["txtCantidad"];

$producto = new Producto();
$producto->id = $_POST["txtId"];
$producto->nombre = $_POST["txtNombre"];
$producto->precio = $_POST["txtPrecio"];
$producto->stock = $_POST["txtStock"];

// Añadir el producto al carrito
// redirigir a index
session_start();

if (isset($_SESSION['carrito'])) {
    $carrito = $_SESSION['carrito'];
}else {
    $carrito = array();
}
array_push($carrito,$producto);
$_SESSION['carrito'] = $carrito;
// redirigir a index
header("location:../index.php");
?>