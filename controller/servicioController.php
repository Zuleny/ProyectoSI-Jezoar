<?php
if (isset($_POST['nombre_servicio']) && isset($_POST['descripcion'])) {
    if ($_POST['nombre_servicio']!="" && $_POST['descripcion']!="") {
        require "../model/ServicioModel.php";
        $nombre_serv=$_POST['nombre_servicio'];
        $descripcion_serv=$_POST['descripcion'];
        $servicio = new Servicio(0,$nombre_serv,$descripcion_serv);
        $servicio->id_servicio=$servicio->getNewIdServicio();
        if ($servicio->insertarServicio()) {
            header('Location: ../view/gestionDeServicio/gestionServicio.php');    
        }else{
            header('Location: ../view/Exceptions/exceptions.php');
        }
    }else{
        header('Location: ../view/Exceptions/exceptions.php');
    }
}else if (isset($_GET['cod']) && isset($_GET['name']) && isset($_GET['description'])) {
    if ($_GET['cod']!="" && $_GET['name']!="" && $_GET['description']!="") {
        require "../model/ServicioModel.php";
        $servicio = new Servicio($_GET['cod'], $_GET['name'], $_GET['description']);
        if ($servicio->updateServicio()) {
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
                                        <button type="button" class="btn bg-purple btn-sm" data-toggle="modal" data-target="#modal-default">
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