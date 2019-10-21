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
?>