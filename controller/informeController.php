<?php   //CREAR INFORME
if(isset($_POST["image2"])  && isset($_POST["image3"]) && isset($_POST['descripcion'])) {
    require '../model/informeModel.php';
    $informe = new Informe($_POST["descripcion"] );
    $image = $_POST['image2'];
    $image2 = $_POST['image3'];
    $result = pg_escape_string($image);
    $result2 = pg_escape_string($image2);
    //$im = imageCreateFromString($result);
    $insertado =$informe->registrarInforme($_POST['codCotizacion'],$result, $result2);
    echo $_POST['codCotizacion'];
    if($insertado){
        session_start();
        $fecha_hora = date('j-n-Y G:i:s', time());
        $username = $_SESSION['user'];
        $conexion = new Conexion();
        $conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora)
                    VALUES ('$username', 'Generó informe de entrega de un proyecto para el cliente', '$fecha_hora');");
        
        header("Location: ../view/gestionDeInforme/gestionInformePrincipal.php");
    }else{
        $errorMessage = "<b>Error en el proceso de registro del informe</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
    }

    /*session_start();
    $_SESSION['image2'] = $result;
    $_SESSION['image3'] = $result2;*/

}else if (isset($_GET['cod'])) {
        require '../model/informeModel.php';
        $informe = new Informe();
        if ($informe->deleteInforme($_GET['cod'])) {
            header("Location: ../view/gestionDeInforme/gestionInformePrincipal.php");
        } else {
            header('Location: ../view/Exceptions/exceptions.php');
        }

}     /*--- image after = 3 imageBefore =4*/
    function getListaInforme(){
        require "../../model/informeModel.php";
        $informe = new Informe();
        $result = $informe->getListInforme();
        return $result;
    }
    function visualizarDatosParaPDF(){
        $informe =  new Informe();
        $result = $informe->getListInforme();
        return $result;
    }
    function getNombreClientePorcodigoCotizacion($codCotizacion){
        require "../../model/informeModel.php";
        $informe = new Informe();
        return $result= $informe->getNombreClientePorcodigoCotizacion($codCotizacion);
    }
    function datosParaPDF($codInforme){
        $informe = new Informe();
        return $result= $informe->visualizarDatosParaPDF($codInforme);
    }
    function getNombreClientePorCodInforme($codInforme){
        require "../../model/informeModel.php";
        $informe = new Informe();
        return $result= $informe->getNombreClientePorCodInforme($codInforme);
    }

?>


