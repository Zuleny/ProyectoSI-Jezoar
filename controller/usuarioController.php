<?php
require "../model/UsuarioModel.php";

$nombreUser = $_POST['nombreUser'];
$passwordUser = $_POST['passwordUser'];
$nombrePersonal = $_POST['nombrePersonal'];

if (isset($nombreUser) && isset($passwordUser) && isset($nombreUser)) {
    $user = new Usuario(0,$nombreUser,$passwordUser,$nombrePersonal);
    $user->codUsuario = $user->getCantidadUsuarios()+1;
    if (!$user->insertarUsuario()) {
        echo "Error No se pudo registrar al nuevo usuario
                vuelva a interntarlo";
    }
    header('Location: ../view/gestionDeUsuario/gestionUsuario.php');
}

?>