<?php
    require_once "Conexion.php";
    require_once "Producto.php";
    class Data {
        private $conexion;
        
        public function __construct(){
            $this->conexion = new Conexion('localhost','5432','jezoar','jezoar','123456');
        }

        public function getProductos() {
            $listaDeProductos = array();    //creo nua nueva lista
            $query = "select * from producto;";    //consulta
            $resultado = $this->conexion->execute($query);  //ejecutamos la consulta en la BD
            while ($registro = mysqli_fetch_array($resultado)) { //mientras $registro no este vacio
                $producto = new Producto($registro[0], $registro[1], $registro[2], $registro[3]);
                array_push($listaDeProductos, $producto);   //agrego al arreglo el producto
            }
            return $listaDeProductos;  
        }
        //
    }
?>