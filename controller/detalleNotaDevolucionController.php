<?php

function getInsumos($nroNota){
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
    
}

?>