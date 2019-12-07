<?php
if(isset($_POST["nombreCliente"]) && isset($_POST["descripcion"]) ) {
    $nombreCliente = $_POST["nombreCliente"];
    $descripcion = $_POST["descripcion"];
    require '../model/informeModel.php';
    $informe = new Informe($nombreCliente, $descripcion);
    $image = $_POST['image2'];
    $image2 = $_POST['image3'];
    $result = pg_escape_string($image);

    $result2 = pg_escape_string($image2);

    //$im = imageCreateFromString($result);
    $informe->registrarInforme($result, $result2);
    session_start();
    $_SESSION['image2'] = $result;
    $_SESSION['image3'] = $result2;
    header("Location: ../view/gestionDeInforme/gestionInforme.php");
}else if (isset($_GET['cod'])) {
    echo $_GET['cod'];
    if ($_GET['cod'] != "") {
        require '../model/informeModel.php';
        $informe = new Informe();
        if ($informe->deleteInforme($_GET['cod'])) {
            header("Location: ../view/gestionDeInforme/gestionInforme.php");
        } else {
            header('Location: ../view/Exceptions/exceptions.php');
        }
    }
}       /*--- image after = 3 imageBefore =4*/
    function getListaInforme(){
        require "../../model/informeModel.php";
        $informe = new Informe();
        $result = $informe->getListInforme();
        return $result;
    }
    function visualizarDatosParaPDF(){
        $informe =  new Informe();
        $result = $informe->visualizarDatosParaPDF();
        return $result;
    }

?>


