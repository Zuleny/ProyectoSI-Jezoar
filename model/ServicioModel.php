<?php
include "Conexion.php";

class Servicio {
    public $id_servicio;
    public $nombre;
    public $descripcion;
    public $conexion;

    public function __construct($id =-1, $nombre = "",$descripcion = ""){
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

    public function getCantidadServicios(){
        $result=$this->conexion->execute("select count(*) from servicio;");
        return pg_result($result,0,0);
    }

    public function getNewIdServicio(){
        return $this->getCantidadServicios()+1;
    }
 
    public function getListDeServicios(){
        $result=$this->conexion->execute("select servicio.id_servicio, nombre, detalle from servicio,detalle_servicio where servicio.id_servicio=detalle_servicio.id_servicio;");
        return $result;
    }

    public function updateServicio(){
        try {
            $this->conexion->execute("UPDATE servicio SET nombre='$this->nombre' where id_servicio=$this->id_servicio;");
            $this->conexion->execute("UPDATE detalle_servicio SET detalle='$this->descripcion' where id_servicio=$this->id_servicio;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
?>