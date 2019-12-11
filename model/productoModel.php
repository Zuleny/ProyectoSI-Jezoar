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

    public function actualizarProducto($codproducto,$nombreinsumo,$descripcioninsumo,$marcaproducto,$categoriaproducto,$precioproducto){

        try{
            $codCategoria=$this->getCodCategoria($categoriaproducto);
            $result=$this->conexion->execute("UPDATE Insumo SET nombre='$nombreinsumo', descripcion='$descripcioninsumo' where cod_insumo=$codproducto;");
            $result=$this->conexion->execute("UPDATE producto SET precio_unitario=$precioproducto, marca='$marcaproducto' where cod_insumo_producto=$codproducto;");
            $result=$this->conexion->execute("UPDATE Producto_Categoria SET cod_categoria= $codCategoria where cod_insumo_producto=$codproducto;");
            return true;
        }catch (\Throwable $th){
            return false;
        }
    }

    public function getCodCategoria($categoria){
        $result=$this->conexion->execute("select getCodCategoriaDeProducto('$categoria');");
        return pg_result($result,0,0);

    }

    public function getListaDeProductos(){
        $result=$this->conexion->getArrayAssoc("select* from getListaDeProductos();");
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

    public function getListaInsumo($almacen){
        $result=$this->conexion->execute("select cod_almacen from almacen where nombre='$almacen';");
        $codAlmacen=pg_result($result,0,0);
        $result=$this->conexion->execute("select cod_insumo,nombre,tipo_insumo from insumo where cod_insumo not in(select cod_insumo from insumo_almacen where cod_almacen=$codAlmacen);");
        return $result;
    }

    public function insertarInsumo_Almacen($cod_insumo,$almacen,$stock){
        try{
            $cant=count($cod_insumo);
            $result=$this->conexion->execute("select cod_almacen from almacen where nombre='$almacen';");
            $codAlmacen=pg_result($result,0,0);
            echo $codAlmacen;
            for($i=0;$i<$cant;$i++){
               $this->conexion->execute("insert into insumo_almacen values($cod_insumo[$i],$codAlmacen,$stock[$i]);");
               echo $cod_insumo[$i];
               echo $codAlmacen[$i];
               echo $stock[$i];
               echo '<br>';
            }
            return true;
        }catch(\Throwable $th){
            return false;
        }
    }
}

?>

    

