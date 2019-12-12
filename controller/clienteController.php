<?php
//INSERTAR A UN CLIENTE
if (isset($_POST['nombre_cliente']) && isset($_POST['direccion_cliente']) && isset($_POST['correo_cliente']) && isset($_POST['tipo']) ) {
    require "../model/clienteModel.php";
    $nombreCliente = $_POST['nombre_cliente'];
    $direccion = $_POST['direccion_cliente'];
    $email = $_POST['correo_cliente'];
    $tipo = $_POST['tipo'];
    $telefono = $_POST['telefono_cliente'];
    $telefono2 = $_POST['telefono2_cliente'];
    $nit = $_POST['nit_cliente'];
    $cliente = new Cliente($nombreCliente, $direccion, $email, $tipo, $telefono, $telefono2, $nit);
    $cliente->cod_cliente = $cliente->getNewCodigoCliente();
    $result1 = $cliente->registrarCliente();
    if ($result1) {
        session_start();
        $fechaPhp = getDate();
        $fecha_hora = $fechaPhp['year'].'-'.$fechaPhp['mon'].'-'.$fechaPhp['mday'].' '.$fechaPhp['hours'].':'.$fechaPhp['minutes'].':'.$fechaPhp['seconds'];
        $user = $_SESSION['user'];
        $cliente->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                            VALUES ('$user', 'Registro de Cliente $nombreCliente, Direccion: $direccion, Email: $email.', '$fecha_hora');");
        header('Location: ../view/GestionDeCliente/gestionCliente.php');
    } else {
        echo '<script language="javascript">alert("Error registrar cliente");</script>';
        echo 'Espacio blacos';
    }
    //EDITAR INFORMACION DE UN  CLIENTE
}else if(isset($_GET['nombre_cliente']) && isset($_GET['telefono_cliente']) && isset($_GET['nit_cliente']) && isset($_GET['direccion_cliente'])  && isset($_GET['tipo']) && isset($_GET['cod']) ) {
    require "../model/clienteModel.php";
    $cliente2 = new Cliente('', '', '', '', '', '', '');
    $result = $cliente2->editarCliente($_GET['cod'], $_GET['nombre_cliente'], $_GET['direccion_cliente'], $_GET['correo_cliente'], $_GET['tipo'],$_GET['nit_cliente'] , $_GET['telefono_cliente'], $_GET['telefono2_cliente']);
    if ($result) {
        echo '<script language="javascript">alert("Cliente actualizado exitosamente");</script>';
        header('Location: ../view/GestionDeCliente/gestionCliente.php');
    } else {
        echo '<script language="javascript">alert("Error al actualizar el cliente");</script>';
    }

}

function getTableCliente(){
    require "../../model/clienteModel.php";
    $cliente1= new Cliente('','','','','','','');
    $resultado= $cliente1->getListaDeCliente();
    $nroFilas=pg_num_rows($resultado);
    $printer="";
    for ($nroTupla=0; $nroTupla < $nroFilas ; $nroTupla++){
      if(pg_result($resultado,$nroTupla,4) == 'E'){
          $printer.='<tr> <td>'.pg_result($resultado,$nroTupla,1).'</td>';
          $printer.=      '<td>'.pg_result($resultado,$nroTupla,2).'</td>';
          $printer.=      '<td>'.pg_result($resultado,$nroTupla,3).'</td>';
          if (pg_result($resultado,$nroTupla,4) == 'E'){
              $printer.=      '<td>'.'Empresa'.'</td>';
          }else {
              $printer.=      '<td>'.'Persona'.'</td>';
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
      }else{
          $printer.='<tr> <td>'.pg_result($resultado,$nroTupla,1).'</td>';
          $printer.=      '<td>'.pg_result($resultado,$nroTupla,2).'</td>';
          $printer.=      '<td>'.pg_result($resultado,$nroTupla,3).'</td>';
          if (pg_result($resultado,$nroTupla,4) == 'E'){
              $printer.=      '<td>'.'Empresa'.'</td>';
          }else {
              $printer.=      '<td>'.'Persona'.'</td>';
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
      }

        $printer.='<td>
                            <div class="btn-group">
                                <a href="editarCliente.php?cod='.pg_result($resultado,$nroTupla,0).'">
                                    <button type="button" class="btn bg-blue btn-xs btn-sm" title="Editar Clientes">
                                        <i class="fa fa-fw fa-edit"></i>
                                    </button>                          
                                </a>
                             </div>
                                </td></tr>';

    }
    return $printer;
}

function getDatosEditarCliente($codCliente)
{
    require '../../model/clienteModel.php';
    $cliente = new Cliente(0, '', '', '', '', '', '');
    $codCliente = $_GET['cod'];
    return $cliente->getDatosClienteEditar($codCliente);
}

?>