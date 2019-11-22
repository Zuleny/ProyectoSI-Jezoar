<?php

if (isset($_GET['nombre']) && isset($_GET['descripcion']) && isset($_GET['estado'])) {
    $nombre=$_GET['nombre'];
    $Descripcion=$_GET['descripcion'];
    $Estado=$_GET['estado'];
    require "../model/HerramientaModel.php";
    $user = new Herramienta(0,$nombre,$Descripcion,$Estado);
    $user->codigo = $user->getCantidadHerramienta()+1;
    if (!$user->insertarHerramienta()) {
        echo "Error No se pudo registrar la nueva herramienta
                vuelva a interntarlo";
    }
    header('Location: ../view/gestionDeHerramienta/gestionHerramienta.php');
}


if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['estado'])) {
    if ($_POST['nombre']!="" && $_POST['descripcion']!="" && $_POST['estado']!="") {
        session_start();
        $nombre=$_POST['nombre'];
        $Descripcion=$_POST['descripcion'];
        $Estado=$_POST['estado'];
        require "../model/HerramientaModel.php";
        $user = new Herramienta(0, $nombre, $Descripcion, $Estado);
        $user->codigo = $user->getCantidadHerramienta()+1;
        if (!$user->insertarHerramienta()) {
            header('Location: ../view/Exceptions/exceptions.php');
        }else{
            $fecha_hora = date('j-n-Y G:i:s', time());
            $username = $_SESSION['user'];
            $user->Conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Registro de Herramienta Código. $user->codigo', '$fecha_hora');");
            header('Location: ../view/gestionDeHerramienta/gestionHerramienta.php');
        }
    }else{
        header('Location: ../view/Exceptions/exceptions.php');
    }
}else if (isset($_POST['nombreEditar']) && isset($_POST['descripcionEditar']) && isset($_POST['estadoEditar'])) {
    if ( $_POST['nombreEditar']!="" && $_POST['descripcionEditar']!="" && $_POST['estadoEditar']!="" ) {
        require '../model/HerramientaModel.php';
        session_start();
        $herramienta = new Herramienta();
        if ($herramienta->updateHerramienta($_POST['codigo'], $_POST['nombreEditar'], $_POST['descripcionEditar'], $_POST['estadoEditar'])) {
            $fecha_hora = date('j-n-Y G:i:s', time());
            $username = $_SESSION['user'];
            $nroCotizacion = $_POST['codigo'];
            $herramienta->Conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Modificando Herramienta Código . $nroCotizacion', '$fecha_hora');");
            header('Location: ../view/gestionDeHerramienta/gestionHerramienta.php');
        }else{
            header('Location: ../view/Exceptions/exceptions.php');
        }
    } else {
        header('Location: ../view/Exceptions/exceptions.php');
    }
}else if (isset($_GET['codigoHerramientaEliminar'])) {
    echo $_GET['codigoHerramientaEliminar'];
    require '../model/HerramientaModel.php';
    $herramienta = new Herramienta();
    if ($herramienta->deleteHerramienta($_GET['codigoHerramientaEliminar'])) {
        header('Location: ../view/gestionDeHerramienta/gestionHerramienta.php');
    }else{
        header('Location: ../view/Exceptions/exceptions.php');
    }
}


function getListaDeHerramientas(){
    include "../../model/HerramientaModel.php";
    $usuario1= new Herramienta(0,"","","");
    $result=$usuario1->getListaHerramientas();
    $nroFilas=pg_num_rows($result);
    $printer="";
    for ($tupla=0; $tupla <$nroFilas ; $tupla++) { 
        $printer.='<tr> <td>'.pg_result($result,$tupla,0).'</td>';
        $printer.=      '<td>'.pg_result($result,$tupla,1).'</td>';
        $printer.=      '<td>'.pg_result($result,$tupla,2).'</td>';
        if (pg_result($result,$tupla,3)=="N") {
            $printer.=  '<td><span class="label label-danger">No Disponibe</span></td>';
        }else if (pg_result($result,$tupla,3)=="D") {
            $printer.=  '<td><span class="label label-success">Disponible</span></td>';
        }else{
            $printer.=  '<td><span class="label label-warning">Mantenimiento</span></td>';
        }
        $printer.=      '<td> <div class="btn-group">
                                         <a href ="editarHerramienta.php?codigo='.pg_result($result,$tupla,0).'">
                                            <button type="button" class="btn bg-purple btn-xs btn-sm" title="Editar">
                                                 <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                        <a href="../../controller/herramientaController.php?codigoHerramientaEliminar='.pg_result($result,$tupla,0).'">
                                            <button type="button" class="btn bg-red btn-xs btn-sm" title="Eliminar">
                                                 <i class="fa fa-fw fa-trash-o"></i>
                                            </button>
                                        </a> 
                                      </div>
                                 </td>';
    }
    return $printer;
}

function getDatos($codHerramienta){
    require '../../model/HerramientaModel.php';
    $herramienta = new Herramienta();
    return $herramienta->getDatosDeHerramienta($codHerramienta);
}

function getDatosEditarHerramienta($codHerramienta) {
    require '../../model/HerramientaModel.php';
    $herramienta = new Herramienta();
    return $herramienta->getDatosHerramientaEditar($codHerramienta);
}
?>