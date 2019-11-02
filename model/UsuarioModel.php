<?php
include "Conexion.php";
class Usuario {
    public $codUsuario;
    public $nombreUsuario;
    public $password;
    public $question;
    public $answer;
    public $idPersonal;
    public $conexion;
    /**
     * Constructor
     */
    public function __construct($codUsuario = -1, $nombreUsuario  = "",$password = "",$question = "",$answer = "",$nombrePersonal = -1){
        $this->conexion = new Conexion();
        $this->codUsuario = $codUsuario;
        $this->nombreUsuario = strtolower($nombreUsuario);
        $this->password = sha1($password);
        $this->question=$question;
        $this->answer=$answer;
        $this->idPersonal = $this->getIdPersonal($nombrePersonal);
    }

    /**
     * Inserta un Usuario con sus correspondientes campos
     */
    public function insertarUsuario(){
        try {
            $this->conexion->execute("INSERT INTO usuario(cod_usuario,nombre,contrasenia,question,answer,id_personal_usuario) VALUES ($this->codUsuario,'$this->nombreUsuario','$this->password','$this->question','$this->answer',$this->idPersonal);");
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
        $result = $this->conexion->execute("SELECT getIdPersonal('$nombrePersona');");
        return pg_result($result,0,0);
    }

    /**
     * Develve la Lista de Usuarios
     * retorna un $result con 3 campos
     * (cod_Usuario, nombre, nombrePersonal)
     */
    public function getListaUsuarios(){
        return $this->conexion->execute("SELECT cod_usuario,nombre,getNombrePersona(id_personal_usuario) 
                                         FROM usuario
                                         ORDER BY cod_usuario;");
    }

    public function getListPersonal(){
        return $this->conexion->execute("SELECT nombre 
                                         FROM personal 
                                         WHERE id_personal NOT IN (SELECT id_personal_usuario 
                                                                   from usuario);");
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

    public function getListaUsuarioYSusRoles(){
        return $this->conexion->execute("SELECT usuario.cod_usuario, usuario.nombre, rol.cod_rol, rol.descripcion, personal.nombre FROM usuario_rol,rol,usuario,personal WHERE usuario_rol.cod_rol=rol.cod_rol AND usuario.cod_usuario=usuario_rol.cod_usuario AND usuario.id_personal_usuario=personal.id_personal;
        ");
    }

    public function verificarUsuarioSeguridad($nombrePersonal, $answer){
        try {
            $result = $this->conexion->execute("SELECT usuario.answer 
                                                FROM personal, usuario 
                                                WHERE personal.id_personal=usuario.id_personal_usuario AND personal.nombre='$nombrePersonal';");
            $respuestaCorrecta = pg_result($result,0,0);
            if ($respuestaCorrecta === $answer) {
                return true;
            }else{
                return false;
            }
        } catch (\Throwable $th) {
            return false;
        }
    }

    private function getCodUsuarioPersonal($nombrePersonal){
        try {
            $result = $this->conexion->execute("SELECT usuario.cod_usuario 
                                                FROM personal, usuario 
                                                WHERE personal.id_personal=usuario.id_personal_usuario and 
                                                        personal.nombre='$nombrePersonal';");
            return pg_result($result,0,0);
        } catch (\Throwable $th) {
            return null;
        }
    }

    public function updatePasswordUser($personal, $password){
        try {
            $passwdSeguro = sha1($password);
            $codUsuario = $this->getCodUsuarioPersonal($personal);
            $this->conexion->execute("UPDATE usuario set contrasenia='$passwdSeguro' WHERE cod_usuario=$codUsuario ;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
?>