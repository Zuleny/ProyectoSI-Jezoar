<?php
require "Conexion.php";
class Contrato{
    public $codContrato;
    public $fechaInicial;
    public $fechaFinal;
    public $conexion;

    public function __construct($inicial='2019-05-21', $final='2019-12-21'){
        $this->conexion = new Conexion();
        $this->codContrato=$this->nuevoCodContrato()+1;
        $this->fechaInicial=$inicial;
        $this->fechaFinal = $final;
    }
    public function nuevoCodContrato(){
        $result = $this->conexion->execute("select count(*) from contrato;");
        return pg_result($result,0,0);
    }
    public function listaCliente(){
        $result = $this->conexion->execute("select distinct nombre from Cliente,presentacion where cod_cliente=cod_cliente_presentacion and estado='Aceptado';");
        return $result;
    }/*
    public function getCodigoDeCliente($nameCliente){
        $result = $this->conexion->execute("SELECT cod_cliente FROM cliente where nombre='$nameCliente';");
        return $result;
    }
    public function getPresentaciones($codCliente){
        $resut = $this->conexion->execute("select * from presentacion where estado='Aceptado' and cod_cliente_presentacion=$codCliente;");
        return $resut;
    }*/
    public function getLitsContrato(){
        $result = $this->conexion->execute("select cod_contrato, nombre,fecha,tipo_presentacion from contrato,presentacion,cliente where cod_cliente = cod_cliente_presentacion and presentacion.cod_presentacion=contrato.cod_presentacion;;");
        return $result;
    }
    public function registrarContrato($codPresentacion){
        $this->conexion->execute("insert into contrato(cod_contrato, fecha_inicio, fecha_fin, cod_presentacion) values($this->codContrato,'$this->fechaInicial','$this->fechaFinal',$codPresentacion);");
        return true;
    }
    public function getNombreCliente($cod){
        $result= $this->conexion->execute("select nombre from presentacion,cliente where cod_cliente=cod_cliente_presentacion and cod_cliente=$cod;");
        return pg_result($result,0,0);
    }
}
?>