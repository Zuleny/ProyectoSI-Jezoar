<?php
if (isset($_POST['nombre_cliente']) && isset($_POST['direccion_cliente']) && isset($_POST['correo_cliente']) && isset($_POST['tipo']) ) {
    require "../model/clienteModel.php";
    $nombreCliente = $_POST['nombre_cliente'];
    $direccion = $_POST['direccion_cliente'];
    $email = $_POST['correo_cliente'];
    $tipo = $_POST['tipo'];
    $telefono = $_POST['telefono_cliente'];
    $telefono2 = $_POST['telefono2_cliente'];

    $cliente = new Cliente(0, $nombreCliente, $direccion, $email, $tipo, $telefono, $telefono2);
    $cliente->cod_cliente = $cliente->getNewCodigoCliente();
    $result1 = $cliente->insertarCliente();
    if (!$result1) {
        echo "Cliente no Insertado";
    }
    header('Location: ../view/gestionDeCliente/gestionCliente.php');
}
function getTableCliente(){
    require "../../model/clienteModel.php";
    $cliente1= new Cliente(0,"","","","","","");
    $resultado= $cliente1->getListaDeCliente();
    $nroFilas=pg_num_rows($resultado);
    $printer="";
        for ($nroTupla=0; $nroTupla < $nroFilas; $nroTupla++){
            $printer.='<tr> <td>'.pg_result($resultado,$nroTupla,0).'</td>';
            $printer.=      '<td>'.pg_result($resultado,$nroTupla,1).'</td>';
            $printer.=      '<td>'.pg_result($resultado,$nroTupla,2).'</td>';
            $printer.=      '<td>'.pg_result($resultado,$nroTupla,3).'</td>';
            $printer.=      '<td>'.pg_result($resultado,$nroTupla,4).'</td>';
            $printer.=      '<td>'.pg_result($resultado,$nroTupla,5).'</td></tr>';
        }
    return $printer;

}

/*
 //$result2=pg_fetch_array($result2, 0, PGSQL_NUM);
    $result2=$cliente->tablaDeCliente();

    require '..\..\view\GestionDeCliente\gestionCliente.php';

     */
?>