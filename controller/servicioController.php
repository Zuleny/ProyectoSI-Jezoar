<?php

if (isset($_POST['nombre_servicio']) && isset($_POST['descripcion'])) {
    require "../model/ServicioModel.php";
    $nombre_serv=$_POST['nombre_servicio'];
    $descripcion_serv=$_POST['descripcion'];
    $servicio = new Servicio(0,$nombre_serv,$descripcion_serv);
    $servicio->id_servicio=$servicio->getNewIdServicio();
    $result=$servicio->insertarServicio();
    header('Location: ../view/gestionDeServicio/gestionServicio.php');
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
                                    <button type="button" class="btn bg-purple btn-sm" data-toggle="modal" data-target="#modal-default">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </div>
                            </td>
                    </tr>';
    }
    return $printer;
}
?>