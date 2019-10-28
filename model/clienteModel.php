<?php
require_once "Conexion.php";
class Cliente{
    public $cod_cliente;
    public $nombre;    
    public $email;
    public $tipo;
    public $telefono;
    public $telefono2;
    public $direccion;
    public $conexion;

    public function __construct($cod_cliente, $nombre,$direccion, $email,$tipo,$telefono,$telefono2) {
        $this->conexion = new Conexion();

        $this->cod_cliente = $cod_cliente;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->direccion = $direccion;        
        $this->tipo = $tipo;
        $this->telefono = $telefono;
        $this->telefono2 = $telefono2;
        }
    public function insertarCliente(){          
            $this->conexion->execute("insert into Cliente(cod_cliente,nombre,direccion,email,tipo) values ($this->cod_cliente,'$this->nombre','$this->direccion','$this->email','$this->tipo');");
            $this->conexion->execute("insert into Telefono(cod_cliente_telefono,telefono) values ($this->cod_cliente,'$this->telefono');");
            $this->conexion->execute("insert into Telefono(cod_cliente_telefono,telefono) values ($this->cod_cliente,'$this->telefono2');");
            return true;
    }
    public function getCantidadCliente(){
        return $this->conexion->execute("select count(*) from cliente;");
    }
    public function getNewCodigoCliente(){
        return $this->getCantidadCliente()+1;
    }
    public function getListaDeCliente(){
        $resultado=$this->conexion->execute("SELECT cliente.cod_cliente,cliente.nombre,cliente.email, cliente.direccion, telefono.telefono, cliente.tipo FROM cliente, telefono
                                                WHERE cliente.cod_cliente=telefono.cod_cliente_telefono ORDER BY cliente.cod_cliente;");
        return $resultado;
    }

}
?>