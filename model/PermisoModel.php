<?php
require "Conexion.php";

class Permiso {

    //Atributo
    public $id_permiso;
    public $descripcion_permiso;
    public $conexion;

    /**
     * Constructor
     */
    public function __construct($id = -1, $descripcion = ""){
        $this->id_permiso = $id;
        $this->descripcion_permiso = $descripcion;
        $this->conexion = new Conexion();
    }

    /**
     * Devuelve la Cantidad de Permisos
     */
    public function getCantidadPermisos(){
        $result = $this->conexion->execute("select count(*) from permiso;");
        return pg_result($result,0,0);
    }

    /**
     * Devuelve un Nuevo Id_Permiso
     */
    public function getNewIdPermiso(){
        return $this->getCantidadPermisos()+1;
    }

    /**
     * Verifica si Exsite Permiso
     */
    public function existePermiso(){
        $result = $this->conexion->execute("select count(*) from permiso where descripcion='$this->descripcion_permiso';");
        if (pg_result($result,0,0)===1) {
            return true;
        }
        return false;
    }

    /**
     * Registra un Permiso
     */
    public function insertarPermiso(){
        try {
            if (! $this->existePermiso()) {
                $this->conexion->execute("INSERT INTO permiso 
                                          VALUES ($this->id_permiso, '$this->descripcion_permiso');");
            }
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Devuelve una Lista de Permisos
     */
    public function getPermisos(){
        return $this->conexion->execute("SELECT * FROM permiso ORDER BY id_permiso;");
    }

    /**
     * Devuelve una Descripcion de permisos
     */
    public function getDescripcion($codPermiso) {
        return $this->conexion->execute("SELECT descripcion FROM permiso WHERE id_permiso=$codPermiso;");
    }

    /**
     * Modificar un Permiso a traves de su Codigo
     */
    public function updatePermiso($codPermiso, $descripcion){
        try {
            $this->conexion->execute("UPDATE permiso set descripcion='$descripcion' WHERE id_permiso=$codPermiso;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}

?>