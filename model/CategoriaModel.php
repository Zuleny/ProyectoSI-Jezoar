<?php
require "Conexion.php";

class Categoria {
    public $codCategoria;
    public $nombreCategoria;
    public $conexion;

    public function __construct($codigoCat,$nombreCat){
        $this->codCategoria=$codigoCat;
        $this->nombreCategoria=$nombreCat;
        $this->conexion=new Conexion();
    }
    /**
     * Devuelve la lista de Categorias de Productos 
     */
    public function getListCategorias(){
        return $this->conexion->execute("select * from Categoria;");
    }

    public function insertarCategoria(){
        try {
            $this->conexion->execute("insert into Categoria(cod_categoria,nombre) values ($this->codCategoria,'$this->nombreCategoria');");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    } 
}
?>