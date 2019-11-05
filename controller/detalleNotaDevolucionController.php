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
            header("Location: http://localhost/ProyectoSI-Jezoar/view/GestionDeNotasDevolucion/gestionDetalleNotaDevolucion.php?nroNotaDetalle=$nroNota");
        }else{
            header('Location: ../view/Exceptions/exceptions.php');
        }
    }else{
        header('Location: ../view/Exceptions/exceptions.php');
    }   
}else if (isset($_GET['nroNotaDetalle']) && isset($_GET['idDetalle'])) {
    require '../model/NotaDevolucionModel.php';
    $nota = new NotaDevolucion();
    if ($nota->deleteDetalleInsumo($_GET['nroNotaDetalle'], $_GET['idDetalle'])) {
        $nroNota = $_GET['nroNotaDetalle'];
        header("Location: http://localhost/ProyectoSI-Jezoar/view/GestionDeNotasDevolucion/gestionDetalleNotaDevolucion.php?nroNotaDetalle=$nroNota");
    }else{
        header('Location: ../view/Exceptions/exceptions.php');
    }
}

?>