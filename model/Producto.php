<?php
class Producto {
    //atributo
    public $id;
    public $nombre;
    public $precio;
    public $stock;

    public function __construct($id=0, $nombre="Sin nombre", $precio=0, $stock=0) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
    }

    
}
?>