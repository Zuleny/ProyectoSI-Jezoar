<?php
require "../model/clienteModel.php";

    $codCliente = $_POST['codigo_cliente'];
    $nombreCliente = $_POST['nombre_cliente'];
    $direccion = $_POST['direccion_cliente'];
    $email = $_POST['correo_cliente'];
    $tipo=$_POST['tipo'];
    $telefono=$_POST['telefono_cliente'];
    $telefono2=$_POST['telefono2_cliente'];

    echo $codCliente;
    echo $nombreCliente;
    echo $direccion;
    echo $email;
    echo $tipo;
    echo $telefono;
    echo $telefono2;

$cliente = new Cliente($codCliente,$nombreCliente,$direccion,$email,$tipo,$telefono,$telefono2);
$result=$cliente->insertarCliente();

header('Location: ../view/gestionDeCliente/gestionCliente.php');

?>