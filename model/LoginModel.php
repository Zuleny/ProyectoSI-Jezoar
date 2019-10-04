<?php
require_once "Conexion.php";
class Login{
    //atributo
    public $username;
    public $passwd;
    public $conexion;
    public function __construct($user,$pass){
        $this->conexion=new Conexion();
        $this->username=$user;
        //$this->passwd=sha1($pass);
        $this->passwd=$pass;
    }
    public function existeUser() {
        $result=$this->conexion->execute("select count(*) from Usuario where nombre='$this->username' and contrasenia='$this->passwd'");
        if (pg_result($result,0,0)>0) {
            return true;
        }else{
            return false;
        }
    }
}
?>