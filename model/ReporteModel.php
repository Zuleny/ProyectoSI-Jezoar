<?php
include "Conexion.php";
class Reporte{
    public $nombre;
    public $Conexion;

    public function __construct($Almacen=""){
        $this->Conexion=new Conexion();
        $this->nombre=$Almacen;
    }

    public function getListDeAlmacen(){
        $result=$this->Conexion->execute("select nombre from almacen;");
        return $result;
    }
    public function getStock($nombreAlmacen){
        $result = $this->Conexion->execute("SELECT insumonombre, stockinsumo from getInventarioDeProductos('$nombreAlmacen');");
        return $result;
    }
}
?>
