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
            return $this->conexion->execute("select cod_rol, descripcion from rol;");
        }

        public function getCantidadRoles(){
            $result=$this->conexion->execute("select count(*) from rol;");
            return pg_result($result,0,0);
        }

        public function getNewCodigoRol(){
            return $this->getCantidadRoles()+1;
        }

        public function insertNewRol(){
            try {
                $result=$this->conexion->execute("insert into rol values ($this->codRol, '$this->descripcion');");
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }
    }

?>