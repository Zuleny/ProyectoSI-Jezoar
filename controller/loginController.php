<?php
require "../model/LoginModel.php";

if ( isset($_GET['username']) && isset($_GET['password']) ) {
    $username=$_GET['username'];
    $password=$_GET['password'];
    $login=new Login(strtolower($username),sha1($password));
    if($login->existeUser()){
        session_start();
        $_SESSION['user']=$username;
        $_SESSION['cod_usuario'] = $login->getCodigoUsuario();
        $_SESSION['permisos']=$login->getListaPermisos($username);
        $fecha_hora = date('j-n-Y G:i:s', time());
        $login->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Inicio de Sesión de $username', '$fecha_hora');");
        header('Location: ../index.php');
    }else{
        header('Location: ../view/login.php');
    }
}else if ( isset($_GET['user']) ) {
    $username=$_GET['user'];
    $login=new Login($username,"");
    $fecha_hora = date('j-n-Y G:i:s', time());
    $login->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                VALUES ('$username', 'Cierre de Sesión de $username', '$fecha_hora');");
    header('Location: ../view/login.php');
}
?>