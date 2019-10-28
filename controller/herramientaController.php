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
        $printer.=      '<td>'.pg_result($result,$tupla,3).'</td>';
        $printer.=      '<td> <div class="btn-group">
                                            &nbsp
                                            <button type="button" class="btn bg-purple btn-xs" title="Editar">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                      </div>
                                 </td>
    }
    return $printer;
}
?>