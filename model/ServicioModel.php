<?php
include "Conexion.php";

class Servicio {

    //Atributos
    public $id_servicio;
    public $nombre;
    public $descripcion;
    public $conexion;

    /**
     * Constructor
     */
    public function __construct($id =-1, $nombre = "",$descripcion = ""){
        $this->id_servicio=$id;
        $this->nombre=$nombre;
        $this->descripcion=$descripcion;
        $this->conexion=new Conexion();
    }

    /**
     * Refistra un Nuevo Servicio
     */
    public function insertarServicio(){
        try {
            $this->conexion->execute("INSERT INTO servicio(id_servicio,nombre) 
                                            VALUES ($this->id_servicio,'$this->nombre');
                                      INSERT INTO detalle_servicio(id_servicio,id_detalle,detalle) 
                                            VALUES ($this->id_servicio,1,'$this->descripcion');");
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
        $result=$this->conexion->execute("SELECT servicio.id_servicio, nombre, detalle 
                                          FROM servicio,detalle_servicio 
                                          WHERE servicio.id_servicio=detalle_servicio.id_servicio;");
        return $result;
    }

    /**
     * Modificar un Servicio a traves de si ID
     */
    public function updateServicio(){
        try {
            $this->conexion->execute("UPDATE servicio SET nombre='$this->nombre' 
                                                        WHERE id_servicio=$this->id_servicio;
                                      UPDATE detalle_servicio SET detalle='$this->descripcion' 
                                                        WHERE id_servicio=$this->id_servicio;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
?>