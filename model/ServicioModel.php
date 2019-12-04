<?php
include "Conexion.php";

class Servicio {

    //Atributos
    public $id_servicio;
    public $nombre;
    public $conexion;

    /**
     * Constructor
     */
    public function __construct($id = -1, $nombre = ""){
        $this->id_servicio=$id;
        $this->nombre=$nombre;
        $this->conexion=new Conexion();
    }

    /**
     * Refistra un Nuevo Servicio
     */
    public function insertarServicio(){
        try {
            $this->conexion->execute("INSERT INTO servicio(id_servicio,nombre) 
                                            VALUES ($this->id_servicio,'$this->nombre'); ");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Devuelve la Cantidad de Servicios Registrados
     */
    public function getCantidadServicios(){
        $result=$this->conexion->execute("SELECT COUNT(*) 
                                          FROM servicio;");
        return pg_result($result,0,0);
    }

    /**
     * Devuelve un Nuevo Id_servicio para un Servicio
     */
    public function getNewIdServicio(){
        return $this->getCantidadServicios()+1;
    }
 
    /**
     * Devuelve una Lista de Servicios con sus Detalles
     */
    public function getListDeServicios(){
        $result=$this->conexion->execute("SELECT id_servicio, nombre
                                          FROM servicio
                                          ORDER BY id_servicio;");
        return $result;
    }

    /**
     * Modificar un Servicio a traves de si ID
     */
    public function updateServicio(){
        try {
            $this->conexion->execute("UPDATE servicio SET nombre='$this->nombre' 
                                                        WHERE id_servicio=$this->id_servicio; ");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
?>