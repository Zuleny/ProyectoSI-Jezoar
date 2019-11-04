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
            header('Location: ../view/GestionDeNotasDevolucion/gestionNotasDevolucion.php');
        }else{
            header('Location: ../view/Exceptions/exceptions.php');
        }
    }
}else if (isset($_GET['nota'])) {
    if ($_GET['nota']!="") {
        require '../model/NotaDevolucionModel.php';
        $nota = new NotaDevolucion();
        if ($nota->deleteNotaDevolucion($_GET['nota'])) {
            header('Location: ../view/GestionDeNotasDevolucion/gestionNotasDevolucion.php');
        }else{
            header('Location: ../view/Exceptions/exceptions.php');
        }
    }
}else if ( isset($_POST['personalEditar']) && isset($_POST['fechaEditar']) && isset($_POST['almacenEditar']) && isset($_POST['nroNotaEditar']) ) {
    require '../model/NotaDevolucionModel.php';
    $nota = new NotaDevolucion();
    if ($nota->updateNotaDevolucion($_POST['nroNotaEditar'], $_POST['personalEditar'], $_POST['fechaEditar'], $_POST['almacenEditar'])) {
        header('Location: ../view/GestionDeNotasDevolucion/gestionNotasDevolucion.php');
    }else{
        header('Location: ../view/Exceptions/exceptions.php');       
    }
}

?>