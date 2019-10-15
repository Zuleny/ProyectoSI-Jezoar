<?php
require_once "Conexion.php";
class Herramienta{
    //atributo
    public $codigo;
    public $nombre;
    public $Descripcion;
    public $Estado;

    public $Conexion;
    public function __construct($cod,$name,$des,$estado){   
        $this->codigo=$cod;
        $this->nombre=$name;
        $this->Descripcion=$des;
        $this->Estado=$estado;
        $this->Conexion=new Conexion();
    }
    public function insertarHerramienta(){
            $this->Conexion->execute("insert into Insumo(cod_insumo,nombre,descripcion,tipo_insumo) values($this->codigo,'$this->nombre','$this->Descripcion','H');");
            $this->Conexion->execute("insert into Herramienta(cod_insumo_herramienta,estado) values($this->codigo,'$this->Estado');");
            return true;
    }

    public function getListaHeramientas(){
        $result=$this->Conexion->execute("select insumo.cod_insumo,insumo.nombre,insumo.descripcion,herramienta.estado from herramienta,insumo where insumo.cod_insumo=herramienta.cod_insumo_herramienta;");
        return $result;
    }

}