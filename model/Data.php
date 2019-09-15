<?php
    require_once "Conexion.php";
    require_once "Producto.php";
    class Data {
        private $conexion;
        
        public function __construct(){
            $this->conexion = new Conexion('localhost','5432','jezoar','jezoar','123456');
        }

        public function getClientes() {
            $listaDeProductos = array();           //creo una nueva lista
            $query = "select * from clientes;";    //consulta
            $resultado = $this->conexion->execute($query);  //ejecutamos la consulta en la BD
            while ($registro = mysqli_fetch_array($resultado)) { //mientras $registro no este vacio
                $cliente = new Cliente($registro[0], $registro[1], $registro[2], $registro[3], $registro[4]);
                array_push($listaDeProductos, $cliente);   //agrego al arreglo el producto
            }
            return $listaDeProductos;  
        }
    }
?>