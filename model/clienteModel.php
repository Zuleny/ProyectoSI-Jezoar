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

    public function __construct($nombre = "",$direccion = "", $email = "",$tipo = 'E',$telefono = -1 ,$telefono2 = -1,$nit = -1) {
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
    public function registrarCliente(){
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
    public function editarCliente($codCliente,$nombre,$direccion, $email, $tipo,$nit,$telefono1, $telefono2){
        try{
            $this->conexion->execute("update Cliente set  nombre='$nombre',direccion='$direccion', email='$email' where cod_cliente= $codCliente;");
            if($tipo=='E'){
                $this->conexion->execute("update Empresa set  nit=$nit where cod_cliente_empresa= $codCliente;");
            }else{
                $this->conexion->execute("update Persona set  nro_carnet=$nit where cod_cliente_persona= $codCliente;");
            }
            $this->conexion->execute("update Telefono set telefono=$telefono1 where cod_cliente_telefono= $codCliente;");
            if($telefono2 != null){
                $this->conexion->execute("update Telefono set telefono=$telefono2 where cod_cliente_telefono= $codCliente;");
            }
            return true;
        }catch (\Throwable $th){
            return false;
        }
    }
     public function getDatosClienteEditar($codCliente){
        return $result = $this->conexion->execute("SELECT cliente.nombre,
                                                          cliente.direccion,
                                                          cliente.email,
                                                          tipo, 
                                                          getNIT_CI_Cliente(cliente.cod_cliente),
                                                          telefono,
                                                          cod_cliente 
                                                    FROM cliente, telefono 
                                                    WHERE cod_cliente = cod_cliente_telefono AND 
                                                            cod_cliente= $codCliente;");
    }

}
?>