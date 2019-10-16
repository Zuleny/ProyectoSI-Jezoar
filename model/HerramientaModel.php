<?php
include "Conexion.php";
class Herramienta{
    //atributo
    public $codigo;
    public $nombre;
    public $Descripcion;
    public $Estado;
    public $Conexion;
    public function __construct($codigo,$nombre,$Descripcion,$Estado){   
        $this->codigo=$codigo;
        $this->nombre=$nombre;
        $this->Descripcion=$Descripcion;
        $this->Estado=$Estado;
        $this->Conexion=new Conexion();
    }
    public function insertarHerramienta(){
            $this->Conexion->execute("insert into Insumo(cod_insumo,nombre,descripcion,tipo_insumo) values($this->codigo,'$this->nombre','$this->Descripcion','H');");
            $this->Conexion->execute("insert into Herramienta(cod_insumo_herramienta,estado) values($this->codigo,'$this->Estado');");
            return true;
    }
    
    public function getListaHerramientas(){
        return $this->Conexion->execute("SELECT cod_insumo_herramienta,nombre,descripcion,estado FROM Insumo,Herramienta WHERE cod_insumo=cod_insumo_herramienta;");
    }

    public function getCantidadHerramienta(){
        $result = $this->Conexion->execute("select count(*) from Insumo;");
        return pg_result($result,0,0);
    }
}