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
}else if (isset($_GET['codPermisoEditar']) && isset($_GET['descripcionPermisoEditar'])) {
    if ( $_GET['codPermisoEditar']!="" && $_GET['descripcionPermisoEditar']!="" ) {
        require '../model/PermisoModel.php';
        $permiso = new Permiso();
        if ($permiso->updatePermiso($_GET['codPermisoEditar'], $_GET['descripcionPermisoEditar'])) {
            header('Location: ../view/GestionDePermiso/gestionPermiso.php');
        }else{
            header('Location: ../view/Exceptions/exceptions.php');
        }
    }else{
        header('Location: ../view/Exceptions/exceptions.php');
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
                                <a href="editarPermiso.php?codPermiso='.pg_result($resultado,$nroPermiso,0).'">
                                    <button type="button" class="btn bg-purple btn-xs" title="Editar">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                            </div>
                        </td>
                  </tr>';
    }
    return $printer;
}

function getDatosPermisosEditar($codPermiso) {
    require '../../model/PermisoModel.php';
    $permiso = new Permiso();
    return $permiso->getDescripcion($codPermiso);
}
?>