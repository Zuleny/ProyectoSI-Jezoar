<?php
    if (isset($_POST['fecha']) && isset($_POST['nombreCliente'])&& isset($_POST['cantidadMeses']) && isset($_POST['estadoP']) && isset($_POST['precio'])) {
        $fecha=$_POST['fecha'];
        $nombreCliente=$_POST['nombreCliente'];
        $cantidadMeses=$_POST['cantidadMeses'];
        $estado=$_POST['estadoP'];
        $precio=$_POST['precio'];

        require "../model/PropuestaModel.php";
        $propuesta= new Propuesta();
        $b=$propuesta->insertarPropuesta($fecha,$nombreCliente,$cantidadMeses,$estado);
        if($b){
            echo "Insertado Correctamente";
        }else{
            echo "No insertado";
        }
        header('Location: ../view/gestionDePropuesta/gestionPropuesta.php');
    }
require "../../model/PropuestaModel.php";
function getListaCliente(){

    $propuesta= new Propuesta();
    $result=$propuesta->getListaCliente();
    return $result;
}
function getListaClientes(){
    $propuesta= new Propuesta();
    $result=$propuesta->getListaCliente();
    return $result;
}
function getListaServicios(){
    $propuesta1=new Propuesta();
    $result=$propuesta1->getListaServicios();
    return $result;
}

function getListaInsumos(){
    $propuesta2= new Propuesta();
    $result=$propuesta2->getListaInsumos();
    return $result;
}
    
?>