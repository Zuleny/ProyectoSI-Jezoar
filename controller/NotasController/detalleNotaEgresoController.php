<?php

function getInsumos($nroNota){
    require '../../model/notaEgresoModel.php';
    $nota = new NotaEgreso();
    return $nota->getInsumos($nroNota);
}

function getListaInsumosDeDetalle($nroNotaDetalle){
    $notaDetalle = new NotaEgreso();
    return $notaDetalle->getListaInsumosDeNotaEgreso($nroNotaDetalle);
}

if (isset($_POST['nombreInsumo']) && isset($_POST['stock']) && isset($_POST['nroNota'])) {
    if ( $_POST['nombreInsumo']!="" && $_POST['stock']!="" && $_POST['nroNota']!="" ) {
        require '../../model/notaEgresoModel.php';
        $nota = new NotaEgreso();
        if ($nota->registrarInsumo($_POST['nombreInsumo'], $_POST['stock'], $_POST['nroNota'])) {
            $nroNota = $_POST['nroNota'];
            header("Location: http://localhost/ProyectoSI-Jezoar/view/GetionarNotas/gestionDetalleNotaEgreso.php?nroNotaDetalle=$nroNota");
        }else{
            header('Location: ../../view/Exceptions/exceptions.php');
        }
    }else{
        header('Location: ../view/Exceptions/exceptions.php');
    }   
}else if (isset($_GET['nroNotaDetalle']) && isset($_GET['idDetalle'])) {
    require '../../model/notaEgresoModel.php';
    $nota = new NotaEgreso();
    if ($nota->deleteDetalleInsumo($_GET['nroNotaDetalle'], $_GET['idDetalle'])) {
        $nroNota = $_GET['nroNotaDetalle'];
        header("Location: http://localhost/ProyectoSI-Jezoar/view/GetionarNotas/gestionDetalleNotaEgreso.php?nroNotaDetalle=$nroNota");
    }else{
        header('Location: ../../view/Exceptions/exceptions.php');
    }
}

?>