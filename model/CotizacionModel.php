<?php
include "Conexion.php";
class Cotizacion{
    public $codCotizacion;
    public $fecha;
    public $estado;
    public $precioTotal;
    public $codCliente;
    public $cantDias;
    public $tipoServicio;
    public $material;
    public $conexion;
}

    public function __construct($codCotizacion,$fecha,$estado,$precioTotal,$nombreCliente,$cantDias,$tipoServicio,$material){
        $this->conexion = new Conexion();
        $this->codCotizacion = $codCotizacion;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->precioTotal = $precioTotal;
        $this->codCliente = $this->getCodCliente($nombreCliente);
        $this->cantDias = $cantDias;
        $this->tipoServicio = $tipoServicio;
        $this->material = $material;
    }

    public function insertarCotizacion(){
        try {
            $this->conexion->execute("insert into Presentacion(cod_presentacion,fecha,estado,precio_total,cod_cliente_presentacion,tipo_presentacion) values ($this->codCotizacion,'$this->fecha','$this->estado',$this->precio_total,$this->codCliente,'C');");
            $this->conexion->execute("insert into Cotizacion(cod_presentacion_cotizacion,cant_dias,tipo_servicio,material) values ($this->codCotizacion,$this->cantDias,'$this->tipoServicio','$this->material');");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getCodCliente($nombrePersona){
        $result = $this->conexion->execute("select getCodCliente('$nombrePersona');");
        return pg_result($result,0,0);
    }

    public function getListCliente(){
        return $this->conexion->execute("SELECT nombre FROM Cliente;");
    }

    public function getListaCotizaciones(){
        return $this->conexion->execute("SELECT cod_presentacion,fecha,estado,precio_total,getNombreCliente(cod_cliente_presentacion),cant_dias,tipo_servicio,material FROM presentacion,cotizacion WHERE cod_presentacion=cod_presentacion_cotizacion;");
    }

    public function getCantidadCotizaciones(){
        $result = $this->conexion->execute("select count(*) from Cotizacion;");
        return pg_result($result,0,0);
    }
?>