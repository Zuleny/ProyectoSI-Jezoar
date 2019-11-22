<?php
include "Conexion.php";
class Almacen{
    public $codAlmacen;
    public $nombre;
    public $Direccion;
    public $Conexion;
    
    public function __construct($codAlmacen,$Almacen,$Dir){ 
        $this->Conexion=new Conexion();
        $this->codAlmacen=$codAlmacen;
        $this->nombre=$Almacen;
        $this->Direccion=$Dir;
        
    }
    public function insertarAlmacen(){
        try{
            $this->Conexion->execute("insert into Almacen(cod_almacen,nombre,direccion) values($this->codAlmacen,'$this->nombre','$this->Direccion');");
            return true;
        }catch (\Throwable $th){
            return false;
        }
    }

    public function getListaAlmacen(){
        return $this->Conexion->execute("SELECT cod_almacen,nombre,direccion FROM Almacen;");
    }

    public function getCantidadAlmacen(){
        $result = $this->Conexion->execute("select count(*) from Almacen;");
        return pg_result($result,0,0);
    }
}
?>