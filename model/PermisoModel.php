<?php
require "Conexion.php";

class Permiso {
    public $id_permiso;
    public $descripcion_permiso;
    public $conexion;
    public function __construct($id = -1, $descripcion = ""){
        $this->id_permiso = $id;
        $this->descripcion_permiso = $descripcion;
        $this->conexion = new Conexion();
    }

    public function getCantidadPermisos(){
        $result = $this->conexion->execute("select count(*) from permiso;");
        return pg_result($result,0,0);
    }

    public function getNewIdPermiso(){
        return $this->getCantidadPermisos()+1;
    }

    public function existePermiso(){
        $result = $this->conexion->execute("select count(*) from permiso where descripcion='$this->descripcion_permiso';");
        if (pg_result($result,0,0)===1) {
            return true;
        }
        return false;
    }

    public function insertarPermiso(){
        try {
            if (! $this->existePermiso()) {
                $this->conexion->execute("insert into permiso values ($this->id_permiso, '$this->descripcion_permiso');");
            }
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getPermisos(){
        return $this->conexion->execute("SELECT * FROM permiso ORDER BY id_permiso;");
    }

    public function getDescripcion($codPermiso) {
        return $this->conexion->execute("SELECT descripcion FROM permiso WHERE id_permiso=$codPermiso;");
    }

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