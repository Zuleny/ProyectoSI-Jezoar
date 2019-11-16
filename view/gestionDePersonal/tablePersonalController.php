<?php

    $idPersonal = $_POST['idPersonal'];
    $nombre = $_POST['nombre'];
    $tipo = $_POST['tipo'];
    $cargo=$_POST['cargo'];
    $opcion=$_POST['opcion'];

    require "../../model/personalModel.php";
    $personal = new Personal($nombre,$tipo,$cargo);
    $b=$personal->actualizarPersonal($idPersonal,$nombre,$tipo,$cargo);
    if(!$b) {
        echo json_encode("Error: No actualizado");
    }else{
        echo  json_encode("se realizo un error correctamente");
    }




?>
