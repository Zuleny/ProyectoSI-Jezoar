<?php
if(isset($_POST["nombreCliente"]) && isset($_POST["fecha_inicial"]) && isset($_POST["fecha_final"]) && isset($_GET['cod_presetacionC']) ){
    $nombre = $_POST["nombreCliente"];
    //$codPresentacion = $_GET["codPresenacionC"];
    require "../model/contratoModel.php";
    $contrato = new Contrato($_POST["fecha_inicial"],$_POST["fecha_final"]);
    $contrato->registrarContrato($_GET['cod_presetacionC']);
    header('Location: ../view/gestionDeContrato/gestionContrato.php');
}else{
    //header('Location: ../view/Exceptions/exceptions.php');
}
/*else if (isset($_GET['codPresentacionC'])) {
    if ($_GET['codPresentacionC']!="") {
       // require '../model/NotaDevolucionModel.php';
        $contrato = new Contrato();
        if ($contrato->deleteNotaDevolucion($_GET['nota'])) {
            session_start();
            $fecha_hora = date('j-n-Y G:i:s', time());
            $username = $_SESSION['user'];
            $nroNota = $_GET['nota'];
            $contrato->getConexion()->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora)
                                                     VALUES ('$username', 'Eliminacion del contrato nro. $nroNota', '$fecha_hora');");
            header('Location: ../view/GestionDeNotasDevolucion/gestionNotasDevolucion.php');
        }else{
            header('Location: ../view/Exceptions/exceptions.php');
        }
    }*/
require "../../model/contratoModel.php";
function getClienteContrato(){

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
    $contrato = new Contrato;
    return $contrato->getLitsContrato();
}

?>
