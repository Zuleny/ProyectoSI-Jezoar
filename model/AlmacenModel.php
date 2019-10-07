<?php
require_once "Conexion.php";
class Almacen{
    //atributo
    public $codigo;
    public $nombre;
    public $Direccion;
    public $Conexion;
    public function __construct($cod,$name,$dir){   
        $this->codigo=$cod;
        $this->nombre=$name;
        $this->Direccion=$dir;
        $this->Conexion=new Conexion();
    }
    public function insertarAlmacen(){
        try{
            $this->Conexion->execute("insert into Almacen values($this->codigo,'$this->nombre','$this->Direccion');");
            return true;
        }catch (\Throwable $th){
            echo'<script> alert("Error: Los datos al insertar no se realizaron con exito")</script>';
            return false;
        }
    }
}
?>