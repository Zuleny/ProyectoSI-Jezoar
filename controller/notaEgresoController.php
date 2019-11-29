<?php
function getNombresDePersonal(){
    require '../../model/notaEgresoModel.php';
    $notaEgreso = new NotaEgreso();
    return $notaEgreso->getListaPersonal();
}

function getPersonal(){
    require '../../model/notaEgresoModel.php';
    $nota = new NotaEgreso();
    return $nota->getListaPersonal();
}

function getDatosNotaEgresoEditar($nroNota) {
    $nota = new NotaEgreso();
    return $nota->getDatosNotaEgresoEditar($nroNota);
}

function getAlmacenes(){
    $nota = new NotaEgreso();
    return $nota->getListaAlmacenes();
}

function getNombreAlmacenes(){
    $notaEgreso = new NotaEgreso();
    return $notaEgreso->getNombreAlmacen();
}

function getListaNotasDevolucion(){
    $notaEgreso = new NotaEgreso();
    return $notaEgreso->getListaDeNotasEgreso();
}

if (isset($_POST['fechaEgreso'])  &&  isset($_POST['personalEgreso'])  &&  isset($_POST['almacenEgreso'])) {
    if ($_POST['fechaEgreso']!="" && $_POST['personalEgreso']!="" && $_POST['almacenEgreso']!="") {
        require '../model/notaEgresoModel.php';
        $notaEgreso = new NotaEgreso($_POST['fechaEgreso'], $_POST['personalEgreso'], $_POST['almacenEgreso']);
        if ($notaEgreso->insertNotaEgreso()) {
            header('Location: ../view/GestionDeNotasEgreso/gestionarNotaDeEgreso.php');
        }else{
            header('Location: ../view/Exceptions/exceptions.php');
        }
    }else{
        header('Location: ../view/Exceptions/exceptions.php');
    }
}else if (isset($_GET['nota'])) {
    if ($_GET['nota']!="") {
        require '../model/notaEgresoModel.php';
        $nota = new NotaEgreso();
        if ($nota->deleteNotaDevolucion($_GET['nota'])) {
            header('Location: ../view/GestionDeNotasEgreso/gestionarNotaDeEgreso.php');
        }else{
            header('Location: ../view/Exceptions/exceptions.php');
        }
    }else{
        header('Location: ../view/Exceptions/exceptions.php');
    }
}else if ( isset($_POST['personalEditar']) && isset($_POST['fechaEditar']) && isset($_POST['almacenEditar']) && isset($_POST['nroNotaEditar']) ) {
    require '../model/notaEgresoModel.php';
    $nota = new NotaEgreso();
    if ($nota->updateNotaEgreso($_POST['nroNotaEditar'], $_POST['personalEditar'], $_POST['fechaEditar'], $_POST['almacenEditar'])) {
        session_start();
        $fecha_hora = date('j-n-Y G:i:s', time());
        $username = $_SESSION['user'];
        $nroNota = $_POST['nroNotaEditar'];
        $nota->getConexion()->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                                 VALUES ('$username', 'Modificación de la Nota de Egreso nro. $nroNota', '$fecha_hora');");
        header('Location: ../view/GestionDeNotasEgreso/gestionarNotaDeEgreso.php');
    }else{
        header('Location: ../view/Exceptions/exceptions.php');       
    }
}


?>

