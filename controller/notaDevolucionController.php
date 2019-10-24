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
}else{
    echo "no hace nada";
}

?>