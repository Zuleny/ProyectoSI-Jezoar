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
    public $nit;
    public $conexion;

    public function __construct($cod_cliente, $nombre,$direccion, $email,$tipo,$telefono,$telefono2,$nit) {
        $this->conexion = new Conexion();

        $this->cod_cliente = $cod_cliente;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->direccion = $direccion;        
        $this->tipo = $tipo;
        $this->telefono = $telefono;
        $this->telefono2 = $telefono2;
        $this->nit = $nit;
        }
    public function insertarCliente(){          
            $this->conexion->execute("insert into Cliente(cod_cliente,nombre,direccion,email,tipo) values ($this->cod_cliente,'$this->nombre','$this->direccion','$this->email','$this->tipo');");
            $this->conexion->execute("insert into Telefono(cod_cliente_telefono,telefono) values ($this->cod_cliente,'$this->telefono');");
            if($this->telefono2 != null){
                $this->conexion->execute("insert into Telefono(cod_cliente_telefono,telefono) values ($this->cod_cliente,'$this->telefono2');");
            }
            if($this->tipo == "P"){
                $this->conexion->execute("INSERT INTO persona(cod_cliente_persona, nro_carnet) VALUES ($this->cod_cliente,$this->nit);");
            }
            if($this->tipo == "E"){
                $this->conexion->execute("INSERT INTO empresa(cod_cliente_empresa, nit) VALUES ($this->cod_cliente,$this->nit);");
            }
            return true;
    }
    public function getCantidadCliente(){
        $result= $this->conexion->execute("select count(*) from cliente;");
        return  pg_result($result,0,0);
    }
    public function getNewCodigoCliente(){
        return $this->getCantidadCliente()+1;
    }
    public function getListaDeCliente(){
        $resultado=$this->conexion->execute("SELECT distinct (cliente.cod_cliente), cliente.nombre,cliente.email, cliente.direccion FROM cliente order by cliente.cod_cliente;");
        return $resultado;
    }
    public function getCantidadTelefono($codCliente){
        $result = $this->conexion->execute("SELECT count (telefono.telefono) FROM telefono  WHERE telefono.cod_cliente_telefono= $codCliente;");
        return  pg_result($result,0,0);
    }
    public  function getTelefono($codCliente){
        $result = $this->conexion->execute("SELECT telefono.telefono FROM telefono  WHERE telefono.cod_cliente_telefono= $codCliente;");
        return  $result;
    }
    public function getListCliente(){
        return $this->conexion->execute("SELECT nombre FROM Cliente;");
    }
    public function getDatosClienteEditar($codCliente) {
        return $this->conexion->execute("SELECT cliente.nombre,cliente.email, cliente.direccion 
                                        FROM cliente order by cliente.cod_cliente WHERE cod_cliente=$codCliente;");
    }

}
?>