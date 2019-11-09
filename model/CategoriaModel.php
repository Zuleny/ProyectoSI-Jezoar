<?php
require "Conexion.php";

class Categoria {
    public $codCategoria;
    public $nombreCategoria;
    public $conexion;

    public function __construct($codigoCat=0, $nombreCat=""){
        $this->codCategoria=$codigoCat;
        $this->nombreCategoria=$nombreCat;
        $this->conexion=new Conexion();
    }
    /**
     * Devuelve la lista de Categorias de Productos 
     */
    public function getListCategorias(){
        return $this->conexion->execute("SELECT * FROM Categoria ORDER BY cod_categoria;");
    }

    public function insertarCategoria(){
        try {
            $this->conexion->execute("INSERT INTO Categoria(cod_categoria,nombre) VALUES ($this->codCategoria,'$this->nombreCategoria');");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    } 

    public function getCantidadCategorias(){
        $result=$this->conexion->execute("SELECT COUNT(*) FROM categoria;");
        return pg_result($result,0,0);
    }

    public function getNewCodigoCategoria(){
        return $this->getCantidadCategorias()+1;
    }

    public function getNameCategoria( $idCategoria ){
        $result = $this->conexion->execute("SELECT nombre FROM categoria WHERE cod_categoria=$idCategoria;");
        return pg_result($result,0,0);
    }

    public function updateCategoria($codCategoria, $nombreCategoria){
        try {
            $this->conexion->execute("UPDATE categoria SET nombre='$nombreCategoria' WHERE cod_categoria=$codCategoria;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
?>