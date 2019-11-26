<?php

function getListaInsumosAAgregar($nroNota){
    require '../../model/NotaDevolucionModel.php';
    $nota = new NotaDevolucion();
    return $nota->getInsumos($nroNota);
}

function getListaInsumosDeDetalle($nroNotaDetalle){
    $notaDetalle = new NotaDevolucion();
    return $notaDetalle->getListaInsumosDeNotaDevolucion($nroNotaDetalle);
}

if (isset($_POST['nombreInsumo']) && isset($_POST['stock']) && isset($_POST['nroNota'])) {
    if ( $_POST['nombreInsumo']!="" && $_POST['stock']!="" && $_POST['nroNota']!="" ) {
        require '../model/NotaDevolucionModel.php';
        $nota = new NotaDevolucion();
        if ($nota->registrarInsumo($_POST['nombreInsumo'], $_POST['stock'], $_POST['nroNota'])) {
            $nroNota = $_POST['nroNota'];
            session_start();
            $insumo = $_POST['nombreInsumo'];
            $fecha_hora = date('j-n-Y G:i:s', time());
            $username = $_SESSION['user'];
            $nota->getConexion()->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                                     VALUES ('$username', 'Inserción del insumo $insumo en Nota de Devolución nro. $nroNota', '$fecha_hora');");
            header("Location: http://localhost/ProyectoSI-Jezoar/view/GestionDeNotasDevolucion/gestionDetalleNotaDevolucion.php?nroNotaDetalle=$nroNota");
        }else{
            $errorMessage = "<b>Error en el registro de ".$_POST['nombreInsumo'].", ".$_POST['stock']." y ".$_POST['nroNota']." en Nota Devolución.</b>";
            header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
        }
    }else{
        $errorMessage = "<b>Error en el registro de insumo (".$_POST['nombreInsumo'].", stock invalido, ".$_POST['nroNota'].") en Nota Devolución, Datos invalidos.</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
    }   
}else if (isset($_GET['nroNotaDetalle']) && isset($_GET['idDetalle'])) {
    require '../model/NotaDevolucionModel.php';
    $nota = new NotaDevolucion();
    if ($nota->deleteDetalleInsumo($_GET['nroNotaDetalle'], $_GET['idDetalle'])) {
        $nroNota = $_GET['nroNotaDetalle'];
        session_start();
        $insumo = $_GET['idDetalle'];
        $fecha_hora = date('j-n-Y G:i:s', time());
        $username = $_SESSION['user'];
        $nota->getConexion()->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                                     VALUES ('$username', 'Eliminacion del insumo $insumo en Nota de Devolución nro. $nroNota', '$fecha_hora');");
        header("Location: http://localhost/ProyectoSI-Jezoar/view/GestionDeNotasDevolucion/gestionDetalleNotaDevolucion.php?nroNotaDetalle=$nroNota");
    }else{
        $errorMessage = "<b>Error en el eliminacion de ".$_GET['nroNotaDetalle']." en Nota Devolución.</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
    }
}

?>