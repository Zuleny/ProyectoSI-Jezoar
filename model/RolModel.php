<?php
    require "Conexion.php";

    class Rol{
        public $codRol;
        public $descripcion;
        public $conexion;

        public function __construct($codRol=0, $descripcion=""){
            $this->codRol=$codRol;
            $this->descripcion=$descripcion;
            $this->conexion=new Conexion();
        }

        public function getListaRoles(){
            return $this->conexion->execute("SELECT cod_rol, descripcion FROM rol ORDER BY cod_rol;");
        }

        public function getCantidadRoles(){
            $result=$this->conexion->execute("SELECT count(*) FROM rol;");
            return pg_result($result,0,0);
        }

        public function getNewCodigoRol(){
            return $this->getCantidadRoles()+1;
        }

        public function insertNewRol(){
            try {
                $result=$this->conexion->execute("INSERT INTO rol VALUES ($this->codRol, '$this->descripcion');");
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }
        
        public function getDescripcionRol($codRol) {
            return $this->conexion->execute("SELECT descripcion FROM rol WHERE cod_rol=$codRol;");
        }

        public function updateRol($codRol, $descripcion) {
            try {
                $this->conexion->execute("UPDATE rol set descripcion = '$descripcion' WHERE cod_rol=$codRol;");
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }
    }

?>