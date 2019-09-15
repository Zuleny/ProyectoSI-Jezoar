<?php
class Cliente {
    //atributo
    public $cod_cliente;
    public $nombre;
    public $direccion;
    public $email;
    public $tipo;

    public function __construct($codCliente=0, $name="Sin nombre", $address="Nignuno", $email="Nignuno",$tipoCliente) {
        $this->cod_cliente = $codCliente;
        $this->nombre = $name;
        $this->direccion = $address;
        $this->email = $email;
        $this->tipo = $tipoCliente;
    }

    
}
?>