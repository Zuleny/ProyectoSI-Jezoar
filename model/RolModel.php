<?php
    require "Conexion.php";

    class Rol{

        //Atributo
        public $codRol;
        public $descripcion;
        public $conexion;

        /**
         * Contructor
         */
        public function __construct($codRol=0, $descripcion=""){
            $this->codRol=$codRol;
            $this->descripcion=$descripcion;
            $this->conexion=new Conexion();
        }

        /**
         * Devuelve una Lista de Errores
         */
        public function getListaRoles(){
            return $this->conexion->execute("SELECT cod_rol, descripcion 
                                             FROM rol 
                                             ORDER BY cod_rol;");
        }

        /**
         * Devuelve la Cantidad de Roles Registradas
         */
        public function getCantidadRoles(){
            $result=$this->conexion->execute("SELECT count(*) FROM rol;");
            return pg_result($result,0,0);
        }

        /**
         * Devuelve un Nuevo Codigo Rol
         */
        public function getNewCodigoRol(){
            return $this->getCantidadRoles()+1;
        }

        /**
         * Registra un Nuevo Rol
         */
        public function insertNewRol(){
            try {
                $result=$this->conexion->execute("INSERT INTO rol VALUES ($this->codRol, '$this->descripcion');");
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }
        
        /**
         * Devuelve la Descripcion de un Rol a traves de su Codigo Rol
         */
        public function getDescripcionRol($codRol) {
            return $this->conexion->execute("SELECT descripcion 
                                             FROM rol 
                                             WHERE cod_rol=$codRol;");
        }

        /**
         * Modificar un Rol a traves de su Código
         */
        public function updateRol($codRol, $descripcion) {
            try {
                $this->conexion->execute("UPDATE rol set descripcion = '$descripcion' WHERE cod_rol=$codRol;");
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }

        public function getListaDePermisosAAsignar($codRol){
            return $this->conexion->execute("SELECT id_permiso, descripcion
                                             FROM permiso
                                             WHERE id_permiso NOT IN (SELECT id_permiso 
                                                                      FROM rol_permiso 
                                                                      WHERE cod_rol=$codRol);");
        }

        public function asignarPermisosARol($codRol, $listaPermisos){
            try {
                foreach ($listaPermisos as $idPermiso) {
                    $this->conexion->execute("INSERT INTO rol_permiso(cod_rol,id_permiso) VALUES ($codRol, $idPermiso);");
                }
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }

        public function getListaPermisosRol($codRol){
            return $this->conexion->execute("SELECT descripcion, permiso.id_permiso 
                                             FROM rol_permiso, permiso 
                                             WHERE rol_permiso.id_permiso=permiso.id_permiso AND
                                                   cod_rol=$codRol;");
        }

        public function eliminarPermisoDeRol($idPermiso, $idRol){
            try {
                $this->conexion->execute("DELETE FROM rol_permiso WHERE id_permiso=$idPermiso AND cod_rol=$idRol;");
                return true;
            } catch (\Throwable $th) {
                return false;
            }
        }

        public function getNombreRol($codRol){
            $result = $this->conexion->execute("SELECT descripcion FROM rol WHERE cod_rol=$codRol;");
            return pg_result($result,0,0);
        }

        private function getNamePermiso($idPermiso){
            $result = $this->conexion->execute("SELECT descripcion FROM permiso WHERE id_permiso=$idPermiso;");
            return pg_result($result,0,0);
        }

        public function getListaPermisosString($array){
            $listPermisos = "[";
            foreach ($array as $permiso) {
                $listPermisos.= $this->getNamePermiso($permiso) ."-";
            }
            $listPermisos.="]";
            return $listPermisos;
        }
    }

?>