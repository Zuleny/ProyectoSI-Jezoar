<?php
require "../model/ServicioModel.php";

$id_serv=$_POST['id_servicio'];
$nombre_serv=$_POST['nombre_servicio'];
$descripcion_serv=$_POST['descricion'];

if (isset($id_serv) && isset($nombre_serv) && isset($descripcion_serv)) {
    $servicio = new Servicio($id_serv,$nombre_serv,$descripcion_serv);
    if ($id_serv>0) {
        $result=$servicio->insertarServicio();
    }
    header('Location: ../view/gestionDeServicio/gestionServicio.php');
}
?>