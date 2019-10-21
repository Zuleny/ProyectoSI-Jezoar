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

    public function getListaPermisos($usuario){
        $result = $this->conexion->execute("SELECT DISTINCT p.descripcion 
                                        FROM usuario as u,rol as r,permiso as p,rol_permiso as rp,usuario_rol as ur 
                                        WHERE u.cod_usuario=ur.cod_usuario and p.id_permiso=rp.id_permiso and rp.cod_rol=r.cod_rol and u.nombre='$usuario';
        ");
        return pg_fetch_all($result);
    }
}
?>