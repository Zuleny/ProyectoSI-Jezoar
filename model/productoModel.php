<?php
require "Conexion.php";

class Producto{
    public $codigo;
    public $nombre;
    public $marca;
    public $precio;
    public $descripcion;
    public $categoria;

    public $conexion;
    
    
    public function __construct($nombre,$marca,$precio,$descripcion,$categoria){
       $this->conexion=new Conexion();

       $this->codigo=$this->getCantidadDeTuplas()+1;
       $this->nombre=$nombre;
       $this->marca=$marca;
       $this->precio=$precio;
       $this->descripcion=$descripcion;
       $this->categoria=$categoria;
       $result=$this->conexion->execute("select getCodCategoriaDeProducto('$this->categoria');");
       $this->categoria=pg_result($result,0,0);
    }

    public function insertarProducto(){
        
        try{

            $result=$this->conexion->execute("insert into Insumo values($this->codigo,'$this->nombre','$this->descripcion','P');");
            $result=$this->conexion->execute("insert into Producto values($this->codigo,$this->precio,'$this->marca');");
            $result=$this->conexion->execute("insert into Producto_Categoria values($this->codigo,$this->categoria);");
            return true;
        }catch (\Throwable $th){
            return false;
        }
    }

    public function getListaDeProductos(){
        $result=$this->conexion->execute("select* from getListaDeProductos();");
        return $result;
    }

    public function getListaDeCategorias(){
        $result=$this->conexion->execute("select nombre from Categoria;");
        return $result;
    }

    public function getCantidadDeTuplas(){
        $result=$this->conexion->execute("select count(*) from Insumo;");
        return pg_result($result,0,0);
    }

    public function getListaAlmacenes(){
        return $this->conexion->execute("select nombre from almacen;");
    }
}

?>

    

