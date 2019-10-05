<?php
include "Conexion.php";

class Servicio {
    public $id_servicio;
    public $nombre;
    public $descripcion;
    public $conexion;

    public function __construct($id,$nombre,$descripcion){
        $this->id_servicio=$id;
        $this->nombre=$nombre;
        $this->descripcion=$descripcion;
        $this->conexion=new Conexion();
    }
    public function insertarServicio(){
        try {
            $this->conexion->execute("insert into servicio(id_servicio,nombre) values ($this->id_servicio,'$this->nombre');");
            $this->conexion->execute("insert into detalle_servicio(id_servicio,id_detalle,detalle) values ($this->id_servicio,1,'$this->descripcion');");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
?>