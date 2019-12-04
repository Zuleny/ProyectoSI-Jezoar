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

    public function __construct($nombre,$direccion, $email,$tipo,$telefono,$telefono2,$nit) {
        $this->conexion = new Conexion();
        $this->cod_cliente = $this->getNewCodigoCliente();
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
        $resultado=$this->conexion->execute("SELECT cliente.cod_cliente, cliente.nombre,cliente.email, cliente.direccion,tipo,getNIT_CI_Cliente(cliente.cod_cliente) FROM cliente order by cliente.cod_cliente;");
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
    public function actualizarCliente($codCliente,$nombre,$direccion, $email, $tipo,$nit,$telefono1, $telefono2){
        $this->conexion->execute("update Cliente set cod_cliente=$codCliente, nombre='$nombre',direccion='$direccion', email='$email',tipo= '$tipo';");
        $this->conexion->execute("update Empresa set cod_cliente_empresa=$codCliente, nit=$nit;");
        $this->conexion->execute("update Persona set cod_cliente_persona=$codCliente, nro_carnet=$nit;");
        $this->conexion->execute("update Telefono set cod_cliente_telefono=$codCliente, telefono=$telefono1;");
        $this->conexion->execute("update Telefono set cod_cliente_telefono=$codCliente, telefono=$telefono2;");
        return true;
    }
     public function getDatosClienteEditar($codCliente){
        return $result = $this->conexion->execute("SELECT cliente.nombre,cliente.direccion,cliente.email, tipo, getNIT_CI_Cliente(cliente.cod_cliente),cod_cliente FROM cliente where cod_cliente= $codCliente;");
    }
    public function getNIT_CI_Cliente($codCliente){
         $resutl = $this->conexion->execute("select getNIT_CI_Cliente($codCliente);");
         return pg_result($resutl,0,0);
    }

}
?>