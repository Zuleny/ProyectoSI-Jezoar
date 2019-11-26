<?php
if (isset($_POST['nombre_servicio']) && isset($_POST['descripcion'])) {
    if ($_POST['nombre_servicio']!="" && $_POST['descripcion']!="") {
        require "../model/ServicioModel.php";
        session_start();
        $nombre_serv=$_POST['nombre_servicio'];
        $descripcion_serv=$_POST['descripcion'];
        $servicio = new Servicio(0,$nombre_serv,$descripcion_serv);
        $servicio->id_servicio=$servicio->getNewIdServicio();
        if ($servicio->insertarServicio()) {
            $fecha_hora = date('j-n-Y G:i:s', time());
            $username = $_SESSION['user'];
            $servicio->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Insertando servicio con Id. $servicio->id_servicio', '$fecha_hora');");
            header('Location: ../view/gestionDeServicio/gestionServicio.php');    
        }else{
            header('Location: ../view/Exceptions/exceptions.php');
        }
    }else{
        $errorMessage = "<b>Error en el registro de Servicio, Datos Invalidos.</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
    }
}else if (isset($_GET['cod']) && isset($_GET['name']) && isset($_GET['description'])) {
    if ($_GET['cod']!="" && $_GET['name']!="" && $_GET['description']!="") {
        require "../model/ServicioModel.php";
        $servicio = new Servicio($_GET['cod'], $_GET['name'], $_GET['description']);
        if ($servicio->updateServicio()) {
            session_start();
            $id = $_GET['cod'];
            $fecha_hora = date('j-n-Y G:i:s', time());
            $username = $_SESSION['user'];
            $servicio->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                      VALUES ('$username', 'Actualizando servicio con Id. $id', '$fecha_hora');");
            header('Location: ../view/gestionDeServicio/gestionServicio.php');
        }else{
            header('Location: ../view/Exceptions/exceptions.php');
        }
    }else{
        header('Location: ../view/Exceptions/exceptions.php');
    }
}

function getListaServicios(){
    require "../../model/ServicioModel.php";
    $servicio= new Servicio(0,"","");
    $result=$servicio->getListDeServicios();
    $cantidadTuplas=pg_num_rows($result);
    $printer="";
    for ($nroTupla=0; $nroTupla < $cantidadTuplas; $nroTupla++) { 
        $printer.='<tr> <td>'.pg_result($result,$nroTupla,0).'</td>';
        $printer.=      '<td>'.pg_result($result,$nroTupla,1).'</td>';
        $printer.=      '<td>'.pg_result($result,$nroTupla,2).'</td>';
        $printer.=      '<td> <div class="btn-group">
                                    <a href="modificarServicio.php?codServicio='.pg_result($result,$nroTupla,0).'&nombre='.pg_result($result,$nroTupla,1).'&descripcion='.pg_result($result,$nroTupla,2).'">
                                        <button type="button" class="btn bg-purple btn-sm btn-xs" data-toggle="modal" data-target="#modal-default">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </a>
                                </div>
                            </td>
                    </tr>';
    }
    return $printer;
}
?>