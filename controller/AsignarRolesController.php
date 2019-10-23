<?php

function getListaUsuario(){
    require_once '../../model/UsuarioModel.php';
    $usuario =new Usuario(-1,"","","");
    return $usuario->getListaUsuarios();
}

function getListaRols(){
    require_once '../../model/UsuarioModel.php';
    $usuario =new Usuario(-1,"","","");
    return $usuario->getListaroles();
}

if (isset($_POST['nombrePersonal']) && $_POST['nombrePersonal']!="" && isset($_POST["rolesUsuario"]) && !is_null($_POST["rolesUsuario"])) {
    require_once '../model/UsuarioModel.php';
    $usuario =new Usuario(-1,"","","");
    $nombreUsuario = $_POST['nombrePersonal'];
    $arrayRoles = $_POST["rolesUsuario"];
    $codUsuario = $usuario->getCodUsuario($nombreUsuario);
    foreach ($arrayRoles as $rol) {
        if (! $usuario->asignarRolAUsuario($codUsuario,$rol)) {
            die("Error en la asignacion de Roles a Usuario, el servicio murió");
        }
    }
    header('Location: ../view/gestionDeUsuario/gestionUsuario.php');
}
?>