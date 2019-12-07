<?php
    if (isset($_POST['fecha']) && isset($_POST['nombreCliente'])&& isset($_POST['cantidadMeses']) && isset($_POST['estadoP']) && isset($_POST['precio']) && isset($_POST['descripcionServicio'])) {
        $fecha=$_POST['fecha'];
        $nombreCliente=$_POST['nombreCliente'];
        $cantidadMeses=$_POST['cantidadMeses'];
        $estado=$_POST['estadoP'];
        $precio=$_POST['precio'];
        $descripcionServicio=$_POST['descripcionServicio'];

        require "../model/PropuestaModel.php";
        $propuesta= new Propuesta();
        $b=$propuesta->insertarPropuesta($fecha,$nombreCliente,$cantidadMeses,$descripcionServicio,$estado);
        if($b){
            session_start();
            $fecha_hora = date('j-n-Y G:i:s', time());
            $username = $_SESSION['user'];
            $propuesta->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Registro de Propuesta Cod. $propuesta->codPropuesta', '$fecha_hora');");
            echo "Insertado Correctamente";
            header('Location: ../view/gestionDePropuesta/gestionPropuesta.php');
        }else{
            $errorMessage = "<b>Error en proceso de Registro de Propuesta</b>";
            header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
        }

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