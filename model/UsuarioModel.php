<?php
include "Conexion.php";
class Usuario {
    public $codUsuario;
    public $nombreUsuario;
    public $password;
    public $idPersonal;
    public $conexion;
    /**
     * Constructor
     */
    public function __construct($codUsuario,$nombreUsuario,$password,$nombrePersonal){
        $this->conexion = new Conexion();
        $this->codUsuario = $codUsuario;
        $this->nombreUsuario = strtolower($nombreUsuario);
        $this->password = sha1(strtolower($password));
        $this->idPersonal = $this->getIdPersonal($nombrePersonal);
    }

    /**
     * Inserta un Usuario con sus correspondientes campos
     */
    public function insertarUsuario(){
        try {
            $this->conexion->execute("insert into Usuario(cod_usuario,nombre,contrasenia,id_personal_usuario) values ($this->codUsuario,'$this->nombreUsuario','$this->password',$this->idPersonal);");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Funcion auxiliar
     * Retorna el Id_Personal de un Empleado(Personal)
     */
    public function getIdPersonal($nombrePersona){
        $result = $this->conexion->execute("select getIdPersonal('$nombrePersona');");
        return pg_result($result,0,0);
    }

    /**
     * Develve la Lista de Usuarios
     * retorna un $result con 3 campos
     * (cod_Usuario, nombre, nombrePersonal)
     */
    public function getListaUsuarios(){
        return $this->conexion->execute("SELECT cod_usuario,nombre,getNombrePersona(id_personal_usuario) FROM usuario;");
    }

    public function getListPersonal(){
        return $this->conexion->execute("SELECT nombre FROM personal;");
    }

    /**
     * Retorna la cantidad de usuarios registrados en el sistema (BD)
     */
    public function getCantidadUsuarios(){
        $result = $this->conexion->execute("select count(*) from usuario;");
        return pg_result($result,0,0);
    }
 
    public function getListaroles(){
        return $this->conexion->execute("SELECT* from rol;");
    }

    public function getCodUsuario($usuario){
        $result = $this->conexion->execute("SELECT cod_usuario FROM usuario WHERE nombre = '$usuario';");
        return pg_result($result,0,0);
    }

    public function asignarRolAUsuario($codUsuario, $codRol){
        try {
            $this->conexion->execute("INSERT INTO usuario_rol(cod_rol,cod_usuario) VALUES ($codRol,$codUsuario)");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
?>