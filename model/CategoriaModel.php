<?php
require "Conexion.php";

class Categoria {
    
    //  Atributos
    public $codCategoria;
    public $nombreCategoria;
    public $conexion;
    /**
     * Constructor
     */
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

    /**
     * Inserta una Categoria a la BD con los atributos asignados
     */
    public function insertarCategoria(){
        try {
            $this->conexion->execute("INSERT INTO Categoria(cod_categoria,nombre) VALUES ($this->codCategoria,'$this->nombreCategoria');");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    } 

    /**
     * Devuelve la Cantidad de categorias
     */
    public function getCantidadCategorias(){
        $result=$this->conexion->execute("SELECT COUNT(*) FROM categoria;");
        return pg_result($result,0,0);
    }

    /**
     * Devuelve el nuevo Codigo Categoria (ultimo codigo +1)
     */
    public function getNewCodigoCategoria(){
        return $this->getCantidadCategorias()+1;
    }

    /**
     *  $idCategoria = Codigo de Categoria
     *  devuelve el nombre de Categoria que esta asignado por $idCategoria
     */
    public function getNameCategoria( $idCategoria ){
        $result = $this->conexion->execute("SELECT nombre FROM categoria WHERE cod_categoria=$idCategoria;");
        return pg_result($result,0,0);
    }

    /**
     * Modificar una Categoria a traves de su Codigo Categoria
     */
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