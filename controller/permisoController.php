<?php

if (isset($_GET['descripcion_permiso'])) {
    require "../model/PermisoModel.php";
    $descripcion=$_GET['descripcion_permiso'];
    $permiso = new Permiso(0,$descripcion);
    $permiso->id_permiso = $permiso->getNewIdPermiso();
    if ($permiso->insertarPermiso()) {
        header('Location: ../view/GestionDePermiso/gestionPermiso.php');
    }else{
        echo "Error en la insersion de datos";
    }
}

function getListaDePermisos(){
    require "../../model/PermisoModel.php";
    $permisoInvalido = new Permiso(0,"");
    $resultado = $permisoInvalido->getPermisos();
    $cantPermisos = pg_num_rows($resultado);
    $printer = "";
    for ($nroPermiso=0; $nroPermiso < $cantPermisos ; $nroPermiso++) { 
        $printer.='<tr> <td>'.pg_result($resultado,$nroPermiso,0).'</td>';
        $printer.='     <td>'.pg_result($resultado,$nroPermiso,1).'</td>';
        $printer.='     <td> <div class="btn-group">                                               
                                <button type="button" class="btn bg-purple btn-xs" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                            </div>
                        </td>
                  </tr>';
    }
    return $printer;
}
?>