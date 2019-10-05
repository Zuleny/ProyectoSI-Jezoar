<?php
require "../model/LoginModel.php";

$username=$_GET['username'];
$password=$_GET['password'];
$login=new Login(strtolower($username),sha1(strtolower($password)));
if($login->existeUser()){
    header('Location: ../index.php');
}else{
    header('Location: ../view/login.php');
}
?>