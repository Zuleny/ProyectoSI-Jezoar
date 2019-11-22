<?php
    if (isset($_POST['fecha']) && isset($_POST['nombreCliente'])&& isset($_POST['cantidadMeses']) && isset($_POST['estadoP']) && isset($_POST['precio'])) {
        $fecha=$_POST['fecha'];
        $nombreCliente=$_POST['nombreCliente'];
        $cantidadMeses=$_POST['cantidadMeses'];
        $estado=$_POST['estadoP'];
        $precio=$_POST['precio'];

        require "../model/PropuestaModel.php";
        $propuesta= new Propuesta();
        $b=$propuesta->insertarPropuesta($fecha,$nombreCliente,$cantidadMeses,$estado);
        if($b){
            echo "Insertado Correctamente";
        }else{
            echo "No insertado";
        }
        header('Location: ../view/gestionDePropuesta/gestionPropuesta.php');
    }

function getListaCliente(){
    require "../../model/PropuestaModel.php";
    $propuesta= new Propuesta();
    $result=$propuesta->getListaCliente();
    $nroFilas=pg_num_rows($result);
    $printer="";
    for ($tupla=0; $tupla <$nroFilas ; $tupla++) {
        $printer.='<option value="'.pg_result($result,$tupla,0).'">'.pg_result($result,$tupla,0).'</option>';
    }
    return $printer;
}
    
?>