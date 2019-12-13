<?php 

function getPersonal(){
    require '../../model/notaEgresoModel.php';
    $nota = new NotaEgreso();
    return $nota->getListaPersonal();
}

function getListaInsumosAAgregar($nroNota){
    require '../../model/notaEgresoModel.php';
    $nota = new NotaEgreso();
    return $nota->getInsumos($nroNota);
}

function getAlmacenes(){
    $nota = new NotaEgreso();
    return $nota->getListaAlmacenes();
}

function getDatosNotaEgresoEditar($nroNota) {
    $nota = new NotaEgreso();
    return $nota->getDatosNotaEgresoEditar($nroNota);
}

function getListaInsumosDeDetalle($nroNotaDetalle){
    $notaDetalle = new NotaEgreso();
    return $notaDetalle->getListaInsumosDeNotaEgreso($nroNotaDetalle);
}

if (isset($_POST['nombreInsumo']) && isset($_POST['stock']) && isset($_POST['nroNota'])) {
    if ( $_POST['nombreInsumo']!="" && $_POST['stock']!="" && $_POST['nroNota']!="" ) {
        require '../model/notaEgresoModel.php';
        $nota = new NotaEgreso();
        if ($nota->registrarInsumo($_POST['nombreInsumo'], $_POST['stock'], $_POST['nroNota'])) {
            $nroNota = $_POST['nroNota'];
            session_start();
            $insumo = $_POST['nombreInsumo'];
            $fechaPhp = getDate();
            $fecha_hora = $fechaPhp['year'].'-'.$fechaPhp['mon'].'-'.$fechaPhp['mday'].' '.$fechaPhp['hours'].':'.$fechaPhp['minutes'].':'.$fechaPhp['seconds'];
            $username = $_SESSION['user'];
            $nota->getConexion()->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                                     VALUES ('$username', 'Inserción del insumo $insumo en Nota de Egreso nro. $nroNota', '$fecha_hora');");
            header("Location: ../view/GestionDeNotasEgreso/gestionDetalleNotaEgreso.php?nroNotaDetalle=$nroNota");
        }else{
            $errorMessage = "<b>Error en el registro de insumo en Nota Egreso ".$_POST['nroNota']." , Datos invalidos.</b>";
            header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
        }
    }else{
        $errorMessage = "<b>Error en el registro de insumo (".$_POST['nombreInsumo'].", stock Invalido, ".$_POST['nroNota'].") en Nota Egreso, Datos invalidos.</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
    }   
}else if (isset($_GET['nroNotaDetalle']) && isset($_GET['idDetalle'])) {
    require '../model/notaEgresoModel.php';
    $nota = new NotaEgreso();
    if ($nota->deleteDetalleInsumo($_GET['nroNotaDetalle'], $_GET['idDetalle'])) {
        $nroNota = $_GET['nroNotaDetalle'];
        session_start();
        $insumo = $_GET['idDetalle'];
        $fechaPhp = getDate();
        $fecha_hora = $fechaPhp['year'].'-'.$fechaPhp['mon'].'-'.$fechaPhp['mday'].' '.$fechaPhp['hours'].':'.$fechaPhp['minutes'].':'.$fechaPhp['seconds'];
        $username = $_SESSION['user'];
        $nota->getConexion()->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                                     VALUES ('$username', 'Eliminacion del insumo $insumo en Nota de Devolución nro. $nroNota', '$fecha_hora');");
        header("Location: ../view/GestionDeNotasEgreso/gestionDetalleNotaEgreso.php?nroNotaDetalle=$nroNota");
    }else{
        $errorMessage = "<b>Error al eliminar insumo en Nota Egreso.</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
    }
}

?>