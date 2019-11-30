<?php
require_once "Conexion.php";
class Login{

    //atributos
    public $username;
    public $passwd;
    public $conexion;

    /**
     * Constructor
     */
    public function __construct($user,$pass){
        $this->conexion=new Conexion();
        $this->username=$user;
        //$this->passwd=sha1($pass);
        $this->passwd=$pass;
    }

    /**
     * Verifica si existe el Usuario(Atributos De la Clase)
     */
    public function existeUser() {
        $result=$this->conexion->execute("select count(*) from Usuario where nombre='$this->username' and contrasenia='$this->passwd'");
        if (pg_result($result,0,0)>0) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Devuelve una Lista de Permisos de Una usuario a traves de su Nombre
     */
    public function getListaPermisos($usuario){
        $result = $this->conexion->execute("SELECT id_permiso 
                                            FROM usuario as u, usuario_rol as ur, rol as r, rol_permiso as rp 
                                            WHERE u.cod_usuario=ur.cod_usuario and 
                                                    ur.cod_rol=r.cod_rol and 
                                                    r.cod_rol=rp.cod_rol and 
                                                    u.nombre='$usuario'; ");
        $arrayOfPermisos = array();
        for ($i=0; $i < pg_num_rows($result) ; $i++) { 
            $arrayOfPermisos[$i] = pg_result($result,$i,0);
        }
        return $arrayOfPermisos;
    }

    /**
     * Devuelve el Codigo de un Usuario
     */
    public function getCodigoUsuario(){
        return $this->conexion->execute("SELECT cod_usuario FROM usuario WHERE nombre='$this->username';");
    }
}
?>