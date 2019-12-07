<?php

if (isset($_GET['descripcion_permiso'])) {
    if ($_GET['descripcion_permiso']!="") {
        require "../model/PermisoModel.php";
        $descripcion=$_GET['descripcion_permiso'];
        $permiso = new Permiso(0,$descripcion);
        $permiso->id_permiso = $permiso->getNewIdPermiso();
        if ($permiso->insertarPermiso()) {
            session_start();
            $hoy = getdate();
            $fecha_hora = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'].' '.$hoy['hours'].':'.$hoy['minutes'].':'.$hoy['seconds'];
            $name = $_SESSION['user'];
            $codidgo = $permiso->id_permiso;
            $nombre = $permiso->descripcion_permiso;
            $permiso->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                                     VALUES ('$name','Registro de Permiso nro $codidgo y descripcion: $nombre', '$fecha_hora');");
            header('Location: ../view/GestionDePermiso/gestionPermiso.php');
        }else{
            $errorMessage = "<b>Error en el registro de Permiso, Datos Invalidos.</b>";
            header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
        }
    }else{
        $errorMessage = "<b>Error en el registro de Permiso, Escriba algo en la descripcion por favor.</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
    }
}else if (isset($_GET['codPermisoEditar']) && isset($_GET['descripcionPermisoEditar'])) {
    if ( $_GET['codPermisoEditar']!="" && $_GET['descripcionPermisoEditar']!="" ) {
        require '../model/PermisoModel.php';
        $permiso = new Permiso();
        if ($permiso->updatePermiso($_GET['codPermisoEditar'], $_GET['descripcionPermisoEditar'])) {
            session_start();
            $hoy = getdate();
            $fecha_hora = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'].' '.$hoy['hours'].':'.$hoy['minutes'].':'.$hoy['seconds'];
            $name = $_SESSION['user'];
            $codidgo = $_GET['codPermisoEditar'];
            $nombre = $_GET['descripcionPermisoEditar'];
            $permiso->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                                     VALUES ('$name','Modificacion de Permiso nro $codidgo y descripcion: $nombre', '$fecha_hora');");
            header('Location: ../view/GestionDePermiso/gestionPermiso.php');
        }else{
            header('Location: ../view/Exceptions/exceptions.php');
        }
    }else{
        $errorMessage = "<b>Error en la modificación de Permiso, Datos Invalidos.</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
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