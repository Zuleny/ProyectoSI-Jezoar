<?php
require "../model/LoginModel.php";

$username=$_GET['username'];
$password=$_GET['password'];
$login=new Login(strtolower($username),sha1($password));
if($login->existeUser()){
    session_start();
    $_SESSION['user']=$username;
    $_SESSION['cod_usuario'] = $login->getCodigoUsuario();
    $_SESSION['permisos']=$login->getListaPermisos($username);
    header('Location: ../index.php');
}else{
    header('Location: ../view/login.php');
}
?>