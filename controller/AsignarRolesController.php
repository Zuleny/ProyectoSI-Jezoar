<?php

function getListaUsuario(){
    require_once '../../model/UsuarioModel.php';
    $usuario =new Usuario(-1,"","","","","");
    return $usuario->getListaUsuarios();
}

function getListaRols(){
    require_once '../../model/UsuarioModel.php';
    $usuario =new Usuario(-1,"","","","","");
    return $usuario->getListaroles();
}

if (isset($_POST['nombrePersonal']) && isset($_POST["rolesUsuario"]) ) {
    if ($_POST['nombrePersonal']!="" && count($_POST["rolesUsuario"])>0) {
        require_once '../model/UsuarioModel.php';
        $usuario =new Usuario(-1,"","","","","");
        $nombreUsuario = $_POST['nombrePersonal'];
        $arrayRoles = $_POST["rolesUsuario"];
        $codUsuario = $usuario->getCodUsuario($nombreUsuario);
        foreach ($arrayRoles as $rol) {
            if (! $usuario->asignarRolAUsuario($codUsuario,$rol)) {
                die("Error en la asignacion de Roles a Usuario, el servicio murió");
            }
        }
        header('Location: ../view/gestionDeUsuario/verRolesUsuario.php');
    }else{
        $errorMessage = "<b>Datos inconsistente, Advertencia, reporte con los de mantenimiento, Gracias.</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
    }
}

function getListaRolesUsuario(){
    require_once '../../model/UsuarioModel.php';
    $usuario =new Usuario(-1,"","","","","");
    return $usuario->getListaUsuarioYSusRoles();
}
?>