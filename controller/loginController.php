<?php
require "../model/LoginModel.php";

$username=$_GET['username'];
$password=$_GET['password'];
$login=new Login($username,$password);
if($login->existeUser()){
    echo "ingresAste user $username y $password";
}else{
    echo "<script>
            alert('Login incorrecto')
            window.location='../view/login.php'
          </script>";
}
require "../view/login.php";
?>