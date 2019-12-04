<?php
//echo $_GET['cod'];
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
        echo '<script language="javascript">alert("Cliente registrado exitosamente");</script>';
    }else{
        echo '<script language="javascript">alert("Error registrar cliente");</script>';
        echo 'Espacio blacos';
    }
    header('Location: ../view/gestionDeCliente/gestionCliente.php');
    
}else if(isset($_GET['cod']) && isset($_GET['nombre_cliente']) && isset($_GET['direccion_cliente']) && isset($_GET['correo_cliente']) && isset($_GET['telefono_cliente']) && isset($_GET['telefono2_cliente'] )) {
    require "../model/clienteModel.php";
    $cliente2 = new Cliente('', '', '', '', '', '', '');
    $result = $cliente2->actualizarCliente($_GET['cod'], '$nombreCliente', '$direccion', '$email', $tipo, '$nit', '$telefono', '$telefono2');
    if ($result) {
        echo '<script language="javascript">alert("Cliente actualizado exitosamente");</script>';
    } else {
        echo '<script language="javascript">alert("Error al actualizar el cliente");</script>';
    }
header('Location: ../view/gestionDeCliente/gestionCliente.php');
}

echo '1';
function getTableCliente(){
    require "../../model/clienteModel.php";
    $cliente1= new Cliente('','','','','','','');
    $resultado= $cliente1->getListaDeCliente();
    $nroFilas=pg_num_rows($resultado);
    $printer="";
    for ($nroTupla=0; $nroTupla < $nroFilas ; $nroTupla++){
      //  <tr> </tr>
        $printer.='<tr> <td>'.pg_result($resultado,$nroTupla,1).'</td>';
        $printer.=      '<td>'.pg_result($resultado,$nroTupla,2).'</td>';
        $printer.=      '<td>'.pg_result($resultado,$nroTupla,3).'</td>';
        if (pg_result($resultado,$nroTupla,4) == 'E'){
            $printer.=      '<td class="info">'.'Empresa'.'</td>';
        }else {
            $printer.=      '<td class="warning" >'.'Persona'.'</td>';
        }
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
        $printer.=      '<td>'.pg_result($resultado,$nroTupla,5).'</td>';
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
    /*
    function getListaClienteEditar(){
        $cliente= new Cliente(0,"","","","","","","");
        $result=$cliente->getListCliente();
        $nroFilas=pg_num_rows($result);
        $printer="";
        for ($tupla=0; $tupla <$nroFilas ; $tupla++) {
            $printer.='<option value="'.pg_result($result,$tupla,0).'">'.pg_result($result,$tupla,0).'</option>';
        }
        return $printer;
    }*/


function getDatosEditarCliente($codCliente)
{
    require '../../model/clienteModel.php';
    $cliente = new Cliente(0, '', '', '', '', '', '');
    return $cliente->getDatosClienteEditar($_GET['cod']);
}
?>