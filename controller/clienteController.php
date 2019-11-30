<?php
if (isset($_POST['nombre_cliente']) && isset($_POST['direccion_cliente']) && isset($_POST['correo_cliente']) && isset($_POST['tipo']) ) {
    require "../model/clienteModel.php";
    $nombreCliente = $_POST['nombre_cliente'];
    $direccion = $_POST['direccion_cliente'];
    $email = $_POST['correo_cliente'];
    $tipo = $_POST['tipo'];
    $telefono = $_POST['telefono_cliente'];
    $telefono2 = $_POST['telefono2_cliente'];
    $nit  = $_POST['nit_cliente'];
    $cliente = new Cliente($nombreCliente, $direccion, $email, $tipo, $telefono, $telefono2, $nit);
    $cliente->cod_cliente = $cliente->getNewCodigoCliente();
    $result1 = $cliente->insertarCliente();
    if($result1){
        echo '<script language="javascript">alert("Nota De Ingreso Registrada Exitosamente");</script>';
    }else{
        echo '<script language="javascript">alert("Error al Insertar la Nota De Ingreso");</script>';
        echo 'Espacio blacos';
    }
    header('Location: ../view/gestionDeCliente/gestionCliente.php');
}else if(isset($_GET['cod'])){

}
function getTableCliente(){
    require "../../model/clienteModel.php";
    $cliente1= new Cliente('','','','','','','');
    $resultado= $cliente1->getListaDeCliente();//SELECT distinct (cliente.cod_cliente), cliente.nombre,cliente.email, cliente.direccion, tipo
    $nroFilas=pg_num_rows($resultado);
    $printer="";
    for ($nroTupla=0; $nroTupla < $nroFilas ; $nroTupla++){
        $printer.='<tr> <td>'.pg_result($resultado,$nroTupla,0).'</td>';
        $printer.=      '<td>'.pg_result($resultado,$nroTupla,1).'</td>';
        $printer.=      '<td>'.pg_result($resultado,$nroTupla,2).'</td>';
        $printer.=      '<td>'.pg_result($resultado,$nroTupla,3).'</td>';
        $cod = pg_result($resultado,$nroTupla,0);
        $var = $cliente1->getCantidadTelefono($cod);
        $telefono=$cliente1->getTelefono($cod);
        if($var == 1){
            $printer.=      '<td>'.pg_result($telefono,0,0).'</td>';
        }
        else{
            if($var == 2){
                $printer.=      '<td>'.pg_result($telefono,0,0).' - '.pg_result($telefono,1,0). '</td>';
            }
        }
        $printer.='<td>
                            <div class="btn-group">
                                <a href="editarCliente.php?cod='.pg_result($resultado,$nroTupla,0).'">
                                    <button type="button" class="btn bg-blue btn-xs btn-sm" title="Editar Clientes">
                                        <i class="fa fa-fw fa-edit"></i>
                                    </button>                          
                                </a>
                             </div>
                                <td></tr>';

    }
    return $printer;
}
function getListaClienteEditar(){
    $cliente= new Cliente(0,"","","","","","","");
    $result=$cliente->getListCliente();
    $nroFilas=pg_num_rows($result);
    $printer="";
    for ($tupla=0; $tupla <$nroFilas ; $tupla++) { 
        $printer.='<option value="'.pg_result($result,$tupla,0).'">'.pg_result($result,$tupla,0).'</option>';
    }
    return $printer;
}
function getDatosEditarCliente($codCliente) {
    require '../../model/clienteModel.php';
    $cliente = new Cliente();
    return $cliente->getDatosClienteEditar($codCliente);
}

/*
 //$result2=pg_fetch_array($result2, 0, PGSQL_NUM);
    $result2=$cliente->tablaDeCliente();

    require '..\..\view\GestionDeCliente\gestionCliente.php';

     */
?>