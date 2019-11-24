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

    public function actualizarAlmacen($codalmacen,$nombrealmacen,$direccionalmacen){
        try{
            $this->Conexion->execute("UPDATE Almacen SET nombre='$nombrealmacen', direccion='$direccionalmacen' where cod_almacen=$codalmacen;");
            return true;
        }catch (\Throwable $th){
            return false;
        }
    }

    public function getListaAlmacen(){
        return $this->Conexion->getArrayAssoc("SELECT cod_almacen,nombre,direccion FROM Almacen;"); //getArrayAssoc sirve para listar en un arreglo asociativo
    }

    public function getCantidadAlmacen(){
        $result = $this->Conexion->execute("select count(*) from Almacen;");
        return pg_result($result,0,0);
    }
}
?>