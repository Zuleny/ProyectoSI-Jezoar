<?php
if ( isset($_POST['nombre_servicio']) ) {
    if ( $_POST['nombre_servicio']!="" ) {
        require "../model/ServicioModel.php";
        session_start();
        $nombre_serv=$_POST['nombre_servicio'];
        $servicio = new Servicio(0,$nombre_serv);
        $servicio->id_servicio=$servicio->getNewIdServicio();
        if ($servicio->insertarServicio()) {
            $fechaPhp = getDate();
            $fecha_hora = $fechaPhp['year'].'-'.$fechaPhp['mon'].'-'.$fechaPhp['mday'].' '.$fechaPhp['hours'].':'.$fechaPhp['minutes'].':'.$fechaPhp['seconds'];
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
}else if ( isset($_GET['cod']) && isset($_GET['name']) ) {
    if ( $_GET['cod']!="" && $_GET['name']!="" ) {
        require "../model/ServicioModel.php";
        $servicio = new Servicio( $_GET['cod'], $_GET['name'] );
        if ($servicio->updateServicio()) {
            session_start();
            $id = $_GET['cod'];
            $fechaPhp = getDate();
            $fecha_hora = $fechaPhp['year'].'-'.$fechaPhp['mon'].'-'.$fechaPhp['mday'].' '.$fechaPhp['hours'].':'.$fechaPhp['minutes'].':'.$fechaPhp['seconds'];
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
        $printer.=      '<td> <div class="btn-group">
                                    <a href="modificarServicio.php?codServicio='.pg_result($result,$nroTupla,0).'&nombre='.pg_result($result,$nroTupla,1).'">
                                        <button type="button" class="btn bg-purple btn-sm btn-xs">
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