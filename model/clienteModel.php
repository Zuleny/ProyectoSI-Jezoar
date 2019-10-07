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

    public $Conexion;
    

    public function __construct($cod_cliente, $nombre,$direccion, $email,$tipo,$telefono,$telefono2) {
        $this->Conexion = new Conexion();

        $this->cod_cliente = $cod_cliente;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->direccion = $direccion;        
        $this->tipo = $tipo;
        $this->telefono = $telefono;
        $this->telefono2 = $telefono2;
        
   
        }
    public function insertarCliente(){          
            $this->Conexion->execute("insert into Cliente(cod_cliente,nombre,direccion,email,tipo) values
                             ($this->cod_cliente,'$this->nombre','$this->direccion','$this->email','$this->tipo');");
            $this->Conexion->execute("insert into Telefono(cod_cliente_telefono,telefono) values ($this->cod_cliente,'$this->telefono');");
            $this->Conexion->execute("insert into Telefono(cod_cliente_telefono,telefono) values ($this->cod_cliente,'$this->telefono2');");
            return true;
    }
    
    
}
?>