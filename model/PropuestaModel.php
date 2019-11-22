<?php
include "Conexion.php";
class Propuesta{
    // Atributos
    public $codPropuesta;
    public $fecha;
    public $codCliente;
    public $cantMeses;
    public $estado;
    public $precioTotal;
    public $conexion;

    /**
     * Constructor
     */
    public function __construct(){
        $this->conexion=new Conexion();
        $this->precioTotal=0;
    }

    /**
     * Registrar nueva Propuesta
     * a la BD tablas: Presentacion, Propuesta
     */
    public function insertarPropuesta($fecha,$nombreCliente,$cantMeses,$estado){
        try {
            $this->codPropuesta=$this->getCodigoPropuesta();
            $this->fecha=$fecha;
            $this->codCliente=$this->getCodCliente($nombreCliente);
            $this->cantMeses=$cantMeses;
            $this->estado=$estado;
            $this->precioTotal=$this->getTotal();

            $this->conexion->execute("insert into Presentacion(cod_presentacion,fecha,estado,precio_total,cod_cliente_presentacion,tipo_presentacion) values ($this->codPropuesta,'$this->fecha','$this->estado',$this->precioTotal,$this->codCliente,'P');");
            $this->conexion->execute("insert into Propuesta(cod_presentacion_propuesta,cant_meses) values ($this->codPropuesta,$this->cantMeses);");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function actualizarPropuesta($codPropuesta,$fecha,$nombreCliente,$cantMeses,$estado){
        try {

            $this->fecha=$fecha;
            $this->codCliente=$this->getCodCliente($nombreCliente);
            $this->cantMeses=$cantMeses;
            $this->estado=$estado;

            $this->conexion->execute("UPDATE Presentacion SET fecha='$this->fecha',cod_cliente_presentacion=$this->codCliente, estado=$this->estado where cod_presentacion=$codPropuesta;");
            $this->conexion->execute("UPDATE Propuesta SET cant_meses=$this->cantMeses where cod_presentacion_propuesta=$codPropuesta;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function eliminarPropuesta($codPropuesta){
        try {
            $this->conexion->execute("DELETE FROM Presentacion where cod_presentacion=$codPropuesta;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getCodigoPropuesta(){
        $result = $this->conexion->execute("SELECT COALESCE(MAX(cod_presentacion),0) 
                                            FROM Presentacion;");
        return (pg_result($result,0,0)+1);
    }

    public function getTotal(){
       return 0;
    }
    /**
     * Devuelve el codigo de Cliente de su nombre Completo (nombre de Personal)
     */
    public function getCodCliente($nombrePersona){
        $result = $this->conexion->execute("select getCodCliente('$nombrePersona');");
        return pg_result($result,0,0);
    }

    /**
     * Devuelve una lista de nombres De Clientes
     */
    public function getListaCliente(){
        return $this->conexion->execute("SELECT nombre FROM Cliente;");
    }

    /**
     * Devuelve una Lista de Propuestas con sus datos Completos
     */
    public function getListaPropuesta(){
        $result= $this->conexion->getArrayAssoc("SELECT cod_presentacion,
                                                fecha,
                                                getNombreCliente(cod_cliente_presentacion),
                                                cant_meses,
                                                estado,
                                                precio_total 
                                         FROM presentacion,propuesta 
                                         WHERE cod_presentacion=cod_presentacion_propuesta and 
                                                tipo_presentacion='P';");
        return $result;
    }


    /**
     * Devuelve la Lista de Asignaciones de Servicio de una Cotizacion a traves de su Codigo
     */
    public function getListaAsignacionServicio($codCotizacion){
        return $this->conexion->execute("SELECT servicio.id_servicio, nombre, detalle 
                                         FROM servicio,detalle_servicio 
                                         WHERE servicio.id_servicio=detalle_servicio.id_servicio and 
                                                servicio.id_servicio NOT IN (SELECT id_servicio 
                                                                            FROM presentacion_servicio 
                                                                            WHERE cod_presentacion=$codCotizacion);" );
    }

    /**
     * Verificar si es Cotizacion a travez de su Codigo
     */
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

    /**
     * Registra un Servicio y sus Detalles a una Cotrizacion
     */
    private function registrarServicioYDetalles($codCotizacion, $idServicio, $areaTrabajo, $cantidadPersonal, $precioUnitario){
        try {
            $this->conexion->execute("INSERT INTO presentacion_servicio(cod_presentacion, id_servicio, area_trabajo, cant_personal, precio_unitario) 
                                      VALUES ($codCotizacion, $idServicio, '$areaTrabajo', $cantidadPersonal, $precioUnitario);");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Asigna una lista de Servicios con sus Detalles a una Cotizacion
     */
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

    /**
     * Devuelve una Lista de Datos Principales de una Cotizacion
     */
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

    /**
     * Devuelve una lista de Servicios Detallados de una Cotizacion
     */
    public function getListaServiciosDeCotizacion($codCotizacion){
        return $this->conexion->execute("SELECT s.id_servicio, s.nombre, ds.detalle, ps.area_trabajo, ps.cant_personal, ps.precio_unitario 
                                        FROM presentacion_servicio as ps, servicio as s, detalle_servicio as ds 
                                        WHERE ps.id_servicio=s.id_servicio and 
                                                s.id_servicio=ds.id_servicio and 
                                                ps.cod_presentacion=$codCotizacion;");
    }

    /**
     * Devuelve Datos actualies de una Cotizacion (Datos importantes para Editar)
     */
    public function getDatosCotizacionEditar($codCotizacion) {
        return $this->conexion->execute("SELECT p.fecha, c.nombre, co.cant_dias, p.precio_total, 
                                                co.tipo_servicio, co.material, p.estado
                                         FROM presentacion as p, cotizacion as co, cliente as c
                                         WHERE p.cod_presentacion = co.cod_presentacion_cotizacion and 
                                                c.cod_cliente=p.cod_cliente_presentacion and co.cod_presentacion_cotizacion=$codCotizacion;");
    }

}
?>