<?php
function getNombresDePersonal(){
    require '../../model/notaEgresoModel.php';
    $notaEgreso = new NotaEgreso();
    return $notaEgreso->getListaPersonal();
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
        require '../../model/notaEgresoModel.php';
        $notaEgreso = new NotaEgreso($_POST['fechaEgreso'], $_POST['personalEgreso'], $_POST['almacenEgreso']);
        if ($notaEgreso->insertNotaEgreso()) {
            header('Location: ../../view/GetionarNotas/gestionarNotaDeEgreso.php');
        }else{
            header('Location: ../../view/Exceptions/exceptions.php');
        }
    }
}else if (isset($_GET['nota'])) {
    if ($_GET['nota']!="") {
        require '../../model/notaEgresoModel.php';
        $nota = new NotaEgreso();
        if ($nota->deleteNotaDevolucion($_GET['nota'])) {
            header('Location: ../../view/GetionarNotas/gestionarNotaDeEgreso.php');
        }else{
            header('Location: ../../view/Exceptions/exceptions.php');
        }
    }
}else{
    echo "no hace nada";
}


?>

