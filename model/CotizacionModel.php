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


    public function __construct($codCotizacion = -1 , $fecha = "01/01/2001" , $estado = "", $precioTotal ="0", $nombreCliente = "", $cantDias = 0, $tipoServicio = "",$material =""){
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
            $this->conexion->execute("insert into Presentacion(cod_presentacion,fecha,estado,precio_total,cod_cliente_presentacion,tipo_presentacion) values ($this->codCotizacion,'$this->fecha','$this->estado',$this->precioTotal,$this->codCliente,'C');");
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
        return $this->conexion->execute("SELECT cod_presentacion,fecha,estado,precio_total,getNombreCliente(cod_cliente_presentacion),cant_dias,tipo_servicio,material FROM presentacion,cotizacion WHERE cod_presentacion=cod_presentacion_cotizacion and tipo_presentacion='C';");
    }

    public function getCantidadCotizaciones(){
        $result = $this->conexion->execute("select count(*) from Presentacion;");
        return pg_result($result,0,0);
    }

    public function getListaAsignacionServicio($codCotizacion){
        return $this->conexion->execute("SELECT servicio.id_servicio, nombre, detalle 
                                         FROM servicio,detalle_servicio 
                                         WHERE servicio.id_servicio=detalle_servicio.id_servicio and 
                                                servicio.id_servicio not in (SELECT id_servicio 
                                                                            FROM presentacion_servicio 
                                                                            WHERE cod_presentacion=$codCotizacion);" );
    }

    private function esCotizacion($codPresentacion){
        $result = $this->conexion->execute("SELECT tipo_presentacion 
                                            FROM presentacion 
                                            WHERE cod_presentacion=$codPresentacion;");
        if (pg_result($result,0,0)==='C') {
            return true;
        }else{
            return false;
        }
    }

    private function registrarServicioYDetalles($codCotizacion, $idServicio, $areaTrabajo, $cantidadPersonal, $precioUnitario){
        try {
            $this->conexion->execute("INSERT INTO presentacion_servicio(cod_presentacion, id_servicio, area_trabajo, cant_personal, precio_unitario) 
                                  VALUES ($codCotizacion, $idServicio, '$areaTrabajo', $cantidadPersonal, $precioUnitario);");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function asignarServicios($codigoCotizacion, $listaIdServicios, $listaAreasTrabajo, $listaCantidadPersonas, $listaPreciosUnitarios ){
        if ($this->esCotizacion($codigoCotizacion)) {
            $lenght = count($listaAreasTrabajo);
            for ($dato=0; $dato < $lenght; $dato++) { 
                if (! $this->registrarServicioYDetalles($codigoCotizacion, 
                                                      $listaIdServicios[$dato], 
                                                      $listaAreasTrabajo[$dato], 
                                                      $listaCantidadPersonas[$dato], 
                                                      $listaPreciosUnitarios[$dato])) {
                    die("error en registrar datos");
                }
            }
            return true;
        }else{
            return false;
        }
    }

    public function getDatosDeCotizacion($codCotizacion){
        $result = $this->conexion->execute("SELECT c.nombre, p.fecha, p.estado, p.precio_total 
                                            FROM presentacion as p, cliente as c 
                                            WHERE p.cod_cliente_presentacion=c.cod_cliente and 
                                                  tipo_presentacion='C' and p.cod_presentacion=$codCotizacion;");
        if (pg_num_rows($result)>0) {
            return array(pg_result($result, 0, 0), pg_result($result,0, 1), pg_result($result, 0, 2), pg_result($result, 0, 3));  
        }else{
            die("error de Cotizacion");
        }
    }

    public function getListaServiciosDeCotizacion($codCotizacion){
        return $this->conexion->execute("SELECT s.id_servicio, s.nombre, ds.detalle, ps.area_trabajo, ps.cant_personal, ps.precio_unitario 
                                        FROM presentacion_servicio as ps, servicio as s, detalle_servicio as ds 
                                        WHERE ps.id_servicio=s.id_servicio and 
                                                s.id_servicio=ds.id_servicio and 
                                                ps.cod_presentacion=$codCotizacion;");
    }
}
?>