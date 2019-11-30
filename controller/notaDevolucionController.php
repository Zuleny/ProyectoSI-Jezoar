<?php 
function getListaNotasDevolucion(){
    
    $nota = new NotaDevolucion();
    return $nota->getListaDeNotasDeDevolucion();
}

function getPersonal(){
    require '../../model/NotaDevolucionModel.php';
    $nota = new NotaDevolucion();
    return $nota->getListaPersonal();
}

function getAlmacenes(){
    $nota = new NotaDevolucion();
    return $nota->getListaAlmacenes();
}

function getDatosNotaDevolucionEditar($nroNota) {
    $nota = new NotaDevolucion();
    return $nota->getDatosNotaDevolucionEditar($nroNota);
}

if (isset($_POST['fecha']) && isset($_POST['personal']) && isset($_POST['almacen'])) {
    if ($_POST['fecha']!="" && $_POST['personal']!="" && $_POST['almacen']!="") {
        require '../model/NotaDevolucionModel.php';
        $notaDevolucion = new NotaDevolucion($_POST['fecha'], $_POST['personal'], $_POST['almacen']);
        if ($notaDevolucion->insertNotaDevolucion()) {
            session_start();
            $fecha_hora = date('j-n-Y G:i:s', time());
            $username = $_SESSION['user'];
            $nroNota = $notaDevolucion->getNroNota();
            $notaDevolucion->getConexion()->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                                     VALUES ('$username', 'Registro de la Nota de Devolución nro. $nroNota', '$fecha_hora');");
            header('Location: ../view/GestionDeNotasDevolucion/gestionNotasDevolucion.php');
        }else{
            header('Location: ../view/Exceptions/exceptions.php');
        }
    }else{
        $errorMessage = "<b>Error en el registro de Nota Devolución, fecha invalida en Nota Devolución, Datos invalidos.</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
    }
}else if (isset($_GET['nota'])) {
    if ($_GET['nota']!="") {
        require '../model/NotaDevolucionModel.php';
        $nota = new NotaDevolucion();
        if ($nota->deleteNotaDevolucion($_GET['nota'])) {
            session_start();
            $fecha_hora = date('j-n-Y G:i:s', time());
            $username = $_SESSION['user'];
            $nroNota = $_GET['nota'];
            $nota->getConexion()->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                                     VALUES ('$username', 'Eliminacion de la Nota de Devolución nro. $nroNota', '$fecha_hora');");
            header('Location: ../view/GestionDeNotasDevolucion/gestionNotasDevolucion.php');
        }else{
            $errorMessage = "<b>Error en al eliminar Nota Devolucion # ".$_GET['nota'].".</b>";
            header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
        }
    }
}else if ( isset($_POST['personalEditar']) && isset($_POST['fechaEditar']) && isset($_POST['almacenEditar']) && isset($_POST['nroNotaEditar']) ) {
    require '../model/NotaDevolucionModel.php';
    $nota = new NotaDevolucion();
    if ($nota->updateNotaDevolucion($_POST['nroNotaEditar'], $_POST['personalEditar'], $_POST['fechaEditar'], $_POST['almacenEditar'])) {
        session_start();
        $fecha_hora = date('j-n-Y G:i:s', time());
        $username = $_SESSION['user'];
        $nroNota = $_POST['nroNotaEditar'];
        $nota->getConexion()->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                                 VALUES ('$username', 'Modificación de la Nota de Devolución nro. $nroNota', '$fecha_hora');");
        header('Location: ../view/GestionDeNotasDevolucion/gestionNotasDevolucion.php');
    }else{
        $errorMessage = "<b>Error en la modificación de Nota Devolución (".$_POST['nroNotaEditar'].", ".$_POST['personalEditar'].",  ".$_POST['fechaEditar'].").</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
    }
}

?>