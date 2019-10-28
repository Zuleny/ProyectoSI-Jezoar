<?php
require "Conexion.php";
class Contrato{
    public $codContrato;
    public $codPresentacion;
    public $fechaActual;
    public $fechaInicial;
    public $fechaFinal;
    public $nombreCliente;

    public function __construct($codContra, $actual, $inicial, $final, $cliente){
        $this->codContrato=$codContra;
        $this->fechaActual=$actual;
        $this->fechaInicial=$inicial;
        $this->fechaFinal = $final;
        $this->nombreCliente = $cliente;

        $conexion = new Conexion();
    }

}
?>