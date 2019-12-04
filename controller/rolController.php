<?php
function gestionRol() {
    require_once '../../model/RolModel.php';
    $printer="";
    $rol=new Rol(0,"prueba");
    $result=$rol->getListaRoles();
    $countTuplas=pg_num_rows($result);
    for ($tupla=0; $tupla < $countTuplas; $tupla++) { 
        $printer=$printer.'<tr> <td>'.pg_result($result,$tupla,0).'</td>';
        $printer=$printer.      '<td>'.pg_result($result,$tupla,1).'</td>';
        $printer=$printer.'     <td> <div class="btn-group">
                                        <a href="editarRol.php?codRol='.pg_result($result,$tupla,0).'">
                                            <button type="button" class="btn bg-purple btn-sm btn-xs" title="Editar">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                        <a href="asignarPermisos.php?codigoRolPermiso='.pg_result($result,$tupla,0).'&nombRol='.pg_result($result,$tupla,1).'">
                                            <button type="button" class="btn bg-light-blue btn-sm btn-xs" title="Asignar Permisos">
                                                <i class="fa fa-fw fa-paperclip"></i>
                                            </button>
                                        </a>
                                     </div>
                                </td>
                            </tr>';
    }
    return $printer;
}

function getListaPermisosAAsignarRol($codRol){
    $rol = new Rol();
    return $rol->getListaDePermisosAAsignar($codRol);
}

function getDatosEditarRol($codRol) {
    require '../../model/RolModel.php';
    $rol = new Rol();
    return $rol->getDescripcionRol($codRol);
}

function getListaPermisosDeRol($codRol){
    require '../../model/RolModel.php';
    $rol = new Rol();
    return $rol->getListaPermisosRol($codRol);
}

if (isset($_POST['descripcionRol'])) {
    if ($_POST['descripcionRol']!="") {
        require_once '../model/RolModel.php';
        $descripcion=$_POST['descripcionRol'];
        $rol=new Rol(0,$descripcion);
        $rol->codRol=$rol->getNewCodigoRol();
        $rol->insertNewRol();
        header('Location: ../view/GestionDeRol/gestionRol.php');
    }else{
        $errorMessage = "<b>Error en el registro de Rol, descripcion Invalido.</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
    }
}else if ( isset($_GET['codRolEditar'])  && isset($_GET['descripcionRolEditar'])) {
    if ( $_GET['codRolEditar']!="" && $_GET['descripcionRolEditar']!="" ) {
        require_once '../model/RolModel.php';
        $rol =new Rol();
        if ($rol->updateRol($_GET['codRolEditar'], $_GET['descripcionRolEditar'])) {
            header('Location: ../view/GestionDeRol/gestionRol.php');
        }else{
            header('Location: ../view/Exceptions/exceptions.php');
        }
    }else{
        $errorMessage = "<b>Error en el modficacion de Rol ( ".$_GET['codRolEditar'].", ".$_GET['descripcionRolEditar']." ), Datos Invalidos.</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
    }
}else if (isset($_POST['coRolPermiso']) && isset($_POST['idPermisos'])) {
    if ($_POST['coRolPermiso']!="" && count($_POST['idPermisos'])>0) {
        require '../model/RolModel.php';
        $rol = new Rol();
        if ($rol->asignarPermisosARol($_POST['coRolPermiso'], $_POST['idPermisos'])) {
            header('Location: ../view/GestionDeRol/gestionRol.php');
        }else{
            header('Location: ../view/Exceptions/exceptions.php');    
        }
    }else{
        $errorMessage = "<b>Error en la asignacion de Permisos a Rol, Datos Invalidos en algunos datos.</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
    }
}else if (  isset($_GET['idPermisoE']) && isset($_GET['idRolE'])  ) {
    if ($_GET['idPermisoE']!="" && $_GET['idRolE']!="") {
        require '../model/RolModel.php';
        $rol = new Rol();
        if ($rol->eliminarPermisoDeRol($_GET['idPermisoE'], $_GET['idRolE'])) {
            session_start();
            $hoy = getdate();
            $fecha_hora = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'].' '.$hoy['hours'].':'.$hoy['minutes'].':'.$hoy['seconds'];
            $user = $_SESSION['user'];
            $idPermiso = $_GET['idPermisoE'];
            $nombreRol = $rol->getNombreRol($_GET['idRolE']);
            $rol->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) VALUES ('$user','eliminacion del permiso con ID: $idPermiso del rol: $nombreRol', '$fecha_hora');");
            header('Location: ../view/GestionDeRol/asignarPermisos.php?codigoRolPermiso='.$_GET['idRolE'].'&nombRol='.$nombreRol);
        }else{
            $errorMessage = "<b>Error en la eliminacion de permisos en roles, consulte a soporte urgentemente.</b>";
            header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
        }
    }else{
        $errorMessage = "<b>Problemas con eliminar permisos de un Rol, Datos invalidos.</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
    }
}

?>