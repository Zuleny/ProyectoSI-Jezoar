<?php
if(isset($_POST["fecha_inicial"]) && isset($_POST["fecha_final"]) && isset($_POST['codPresentacion']) && isset($_POST['contratos'])){
    
    echo $_POST['fecha_inicial'];
    echo $_POST['fecha_final'];
    echo $_POST['codPresentacion'];
    echo $_POST['contratos'];
    require "../model/contratoModel.php";
    $contrato = new Contrato($_POST["fecha_inicial"],$_POST["fecha_final"]);
    $codidgo = $_POST['codPresentacion'];
    if($contrato->registrarContrato($_POST['codPresentacion'])){
        session_start();
        $hoy = getdate();
        $fecha_hora = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'].' '.$hoy['hours'].':'.$hoy['minutes'].':'.$hoy['seconds'];
        $name = $_SESSION['user'];
        $fechaI = $_POST['fecha_inicial'];
        $fechaF = $_POST['fecha_final'];
        $contrato->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                                 VALUES ('$name','Registro de Contrato para $codidgo con fecha $fechaI - $fechaF .', '$fecha_hora');");
        echo '<br> Registrado hasta bitacora correctamente';
        header('Location: ../view/gestionDeContrato/gestionContrato.php');
    }else{
        $errorMessage = "<b>Error en el proceso de registro del contrato</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
    }
    //EDITAR CONTRATO
}else if( isset($_GET['fecha_inicial']) && isset($_GET['fecha_final'])&& isset($_GET['codigo_contrato_editar'])){
    require "../model/contratoModel.php";
    $contrato = new Contrato();
    $result =$contrato->actualizarContrato($_GET['codigo_contrato_editar'],($_GET['fecha_final']),$_GET['fecha_final']);
    if($result){
        header('Location: ../view/gestionDeContrato/gestionContrato.php');
    }else{
        $errorMessage = "<b>Error al editar el contrato</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
    }
    //ELIMINAR CONTRATO
}else if (isset($_GET['codigo_contrato_Eliminar'])) {
    require "../model/contratoModel.php";
    $contrato = new Contrato();
    if ($_GET['codigo_contrato_Eliminar'] != "") {
        if ($contrato->eliminarContrato($_GET['codigo_contrato_Eliminar'])) {
            header('Location: ../view/gestionDeContrato/gestionContrato.php');
        } else {
            header('Location: ../view/Exceptions/exceptions.php');
        }
    }
}
//require "../../model/contratoModel.php";
function getClienteContrato(){
    require "../../model/contratoModel.php";
    $contrato=new Contrato();
    $result1=$contrato->listaCliente();
    $rows=pg_num_rows($result1);
    $printer="";
    for($i=0;$i<$rows;$i++){
        $printer.='<option>'.pg_result($result1,$i,0).'</option>';
    }
    return $printer;
}
function getListaContratos(){
    require "../../model/contratoModel.php";
    $contrato = new Contrato;
    return $contrato->getLitsContrato();
}
function nombreDeCliente($cod)
{ require "../../model/contratoModel.php";
    $contrato = new Contrato();
    $result1 = $contrato->getNombreCliente($cod);
    return $result1;
}
function listaParaEditarContrato($cod){
    //require "../../model/contratoModel.php";
    $contrato = new Contrato();
    return  $contrato->listaParaEditarContrato($cod);
}
function nombreClientePorCodigoContrato($cod_contrato){
    require "../../model/contratoModel.php";
    $contrato = new Contrato();
    return  $contrato->nombreClientePorCodigoContrato($cod_contrato);
}

function getFechas($codPresentacion){
    $contratoDePresentacion = new Contrato();
    return $contratoDePresentacion->getFechasPresentacion($codPresentacion);
}

function tieneContrato($codPresentacion){
    $contratoDePresentacion = new Contrato();
    return $contratoDePresentacion->tenemosSuContrato($codPresentacion);
}
?>
