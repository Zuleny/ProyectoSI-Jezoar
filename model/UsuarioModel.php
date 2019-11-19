<?php

include "Conexion.php";

class Usuario {

    //Atributo
    private $codUsuario;
    private $nombreUsuario;
    private $password;
    private $question;
    private $answer;
    private $idPersonal;
    private $conexion;
    /**
     * Constructor
     */
    public function __construct($codUsuario = -1, $nombreUsuario  = "",$password = "",$question = "",$answer = "",$nombrePersonal = ""){
        $this->conexion = new Conexion();
        $this->codUsuario = $codUsuario;
        $this->nombreUsuario = strtolower($nombreUsuario);
        $this->password = sha1($password);
        $this->question=$question;
        $this->answer=md5($answer);
        if ($nombrePersonal != "") {
            $this->idPersonal = $this->getIdPersonal($nombrePersonal);
        }else{
            $this->idPersonal = -1;
        }
    }

    /**
     * Modificar el Cod Usuario
     */
    public function setCodUsuario($nuevoCodigoUsuario) {
        $this->codUsuario = $nuevoCodigoUsuario;
    }

    /**
     * Inserta un Usuario con sus correspondientes campos
     */
    public function insertarUsuario(){
        try {
            $this->conexion->execute("INSERT INTO usuario(cod_usuario,nombre,contrasenia,question,answer,id_personal_usuario)
                                        VALUES ($this->codUsuario,'$this->nombreUsuario','$this->password','$this->question','$this->answer',$this->idPersonal);");
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

    /**
     * Devuelve una Lista de nombres de Personalpara la Asignacion de Usuario, excluyendo 
     */
    public function getListPersonal(){
        return $this->conexion->execute("SELECT nombre 
                                         FROM personal 
                                         WHERE id_personal NOT IN (SELECT id_personal_usuario 
                                                                   from usuario)
                                         ORDER BY nombre;");
    }

    /**
     * Devuelve una Lista de Personal Completa
     */
    public function getListaPersonalEditar(){
        return $this->conexion->execute("SELECT nombre FROM personal ORDER BY nombre;");
    }

    /**
     * Retorna la cantidad de usuarios registrados en el sistema (BD)
     */
    public function getCantidadUsuarios(){
        $result = $this->conexion->execute("SELECT COUNT(*) FROM usuario;");
        return pg_result($result,0,0);
    }
 
    /**
     * Devuelve una Lista de Roles
     */
    public function getListaroles(){
        return $this->conexion->execute("SELECT* from rol;");
    }

    /**
     * Devuelve el codigo de usuario a traves de su nombre
     */
    public function getCodUsuario($usuario){
        $result = $this->conexion->execute("SELECT cod_usuario FROM usuario WHERE nombre = '$usuario';");
        return pg_result($result,0,0);
    }

    /**
     * Asigna Roles a Usuario a traves de sus Codigos
     */
    public function asignarRolAUsuario($codUsuario, $codRol){
        try {
            $this->conexion->execute("INSERT INTO usuario_rol(cod_rol,cod_usuario) VALUES ($codRol,$codUsuario)");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Devuelve una Lista de Usuarios y sus Roles, con sus detalles
     */
    public function getListaUsuarioYSusRoles(){
        return $this->conexion->execute("SELECT usuario.cod_usuario, 
                                                usuario.nombre, 
                                                rol.cod_rol, 
                                                rol.descripcion, 
                                                personal.nombre 
                                         FROM usuario_rol,rol,usuario,personal 
                                         WHERE usuario_rol.cod_rol=rol.cod_rol AND 
                                                usuario.cod_usuario=usuario_rol.cod_usuario AND 
                                                    usuario.id_personal_usuario=personal.id_personal;
        ");
    }

    /**
     * Verifica la respuesta de seguridad de un personal, al que tiene un usuario
     */
    public function verificarUsuarioSeguridad($nombrePersonal, $answer){
        try {
            $result = $this->conexion->execute("SELECT usuario.answer 
                                                FROM personal, usuario 
                                                WHERE personal.id_personal=usuario.id_personal_usuario AND personal.nombre='$nombrePersonal';");
            $respuestaCorrecta = pg_result($result,0,0);
            if ($respuestaCorrecta === md5($answer)) {
                return true;
            }else{
                return false;
            }
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Devuelve el Codigo de Usuario de un Personal a traves de su nombre y tiene un usuario
     */
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

    /**
     * Envia un correo electronico a $email
     */
    private function enviarEMailUsuario($email, $personal, $password){
        
    }

    /**
     * Modificar la Contraseña de un Personal, si solo si es usuario
     */
    public function updatePasswordUser($personal, $password, $email){
        try {
            $passwdSeguro = sha1($password);
            $codUsuario = $this->getCodUsuarioPersonal($personal);
            $this->conexion->execute("UPDATE usuario set contrasenia='$passwdSeguro' WHERE cod_usuario=$codUsuario ;");
            $this->enviarEMailUsuario($email, $personal, $password);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Devuelve el nombre de un Usuarioa traves de su codigo
     */
    public function getNombreUsuario($codUsuario){
        return $this->conexion->execute("SELECT nombre FROM usuario WHERE cod_usuario=$codUsuario;");
    }

    /**
     * Devuelve una lista Completa de las activivdades realizadas (tabla Bitacora)
     */
    public function getBitacoraUsers() {
        return $this->conexion->execute("SELECT * FROM bitacora;");
    }

    /**
     * Devuelve una lista Completa de las actividades realizadas por un usuario $usuarioBitacora (Tabla Bitacora)
     */
    public function getBitacoraUser($usuarioBitacora) {
        return $this->conexion->execute("SELECT codigo, nombre_usuario, descripcion, fecha_hora 
                                         FROM bitacora 
                                         WHERE nombre_usuario='$usuarioBitacora';");
    }

    /**
     * Devuelve los Datos Principales del Usuario que se Editaran 
     */
    public function getDatosUsuarioEditar($codUsuario) {
        return $this->conexion->execute("SELECT nombre, question, answer, getnombrepersona(id_personal_usuario)
                                         FROM usuario
                                         WHERE cod_usuario = $codUsuario;");
    }

    /**
     * Modificar los Datos Principlaes de un Usuario
     */
    public function updateUsuario( $codUsuario, $nombreUser, $passwordUser, $question, $answer, $nombrePersonal){
        try {
            $answer = md5($answer);
            $this->conexion->execute("UPDATE usuario set nombre='$nombreUser', contrasenia='$passwordUser', question='$question', answer='$answer', id_personal_usuario=getidpersonal('$nombrePersonal') WHERE cod_usuario = $codUsuario;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
?>