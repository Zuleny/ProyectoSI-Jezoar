<?php
include "Conexion.php";
class Cotizacion{
    // Atributos
    public $codCotizacion;
    public $fecha;
    public $estado;
    public $precioTotal;
    public $codCliente;
    public $cantDias;
    public $tipoServicio;
    public $material;
    public $descripcionServicio;
    public $conexion;

    /**
     * Constructor
     */
    public function __construct($codCotizacion = -1 , $fecha = "01/01/2001" , $estado = "", $precioTotal ="0", $nombreCliente = "", $cantDias = 0, $tipoServicio = "",$material ="", $descripcionServicio = ""){
        $this->conexion = new Conexion();
        $this->codCotizacion = $codCotizacion;
        $this->fecha = $fecha;
        $this->estado = $estado;
        $this->precioTotal = $precioTotal;
        $this->codCliente = $this->getCodCliente($nombreCliente);
        $this->cantDias = $cantDias;
        $this->tipoServicio = $tipoServicio;
        $this->material = $material;
        $this->descripcionServicio = $descripcionServicio;
    }

    /**
     * Registrar nueva Cotización
     * a la BD tablas: Presentacion, Cotizacion 
     */
    public function insertarCotizacion(){
        try {
            $this->conexion->execute("INSERT INTO presentacion(cod_presentacion,fecha,estado,precio_total,cod_cliente_presentacion,descripcion_servicios,tipo_presentacion) 
                                        VALUES ($this->codCotizacion,'$this->fecha','$this->estado',$this->precioTotal,$this->codCliente,'$this->descripcionServicio','C');
                                      INSERT INTO cotizacion(cod_presentacion_cotizacion,cant_dias,tipo_servicio,material) 
                                        VALUES ($this->codCotizacion,$this->cantDias,'$this->tipoServicio','$this->material');");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Devuelve el codigo de Cliente de su nombre Completo (nombre de Personal)
     */
    public function getCodCliente($nombrePersona){
        if ($nombrePersona!="") {
            $result = $this->conexion->execute("select getCodCliente('$nombrePersona');");
            return pg_result($result,0,0);
        }else{
            return -1;
        }
    }

    public function getNewCodCotizacion(){
        $result = $this->conexion->execute("SELECT cod_presentacion 
                                         FROM presentacion 
                                         ORDER BY cod_presentacion DESC 
                                         LIMIT 1;");
        return pg_result($result,0,0)+1;
    }
    /**
     * Devuelve una lista de nombres De Clientes
     */
    public function getListCliente(){
        return $this->conexion->execute("SELECT nombre FROM Cliente;");
    }

    /**
     * Devuelve una Lista de Cotizaciones con sus datos Completos
     */
    public function getListaCotizaciones(){
        return $this->conexion->execute("SELECT p.cod_presentacion, 
                                                fecha, 
                                                estado, 
                                                precio_total, 
                                                getnombrecliente(cod_cliente_presentacion),
                                                cant_dias, 
                                                tipo_servicio, 
                                                material, 
                                                descripcion_servicios 
                                         FROM presentacion as p, cotizacion as c 
                                         WHERE p.cod_presentacion=c.cod_presentacion_cotizacion;");
    }

    /**
     * Devuelve la Cantidad de Cotizaciones registradas
     */
    public function getCantidadCotizaciones(){
        $result = $this->conexion->execute("SELECT COUNT(*) 
                                            FROM Presentacion;");
        return pg_result($result,0,0);
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
    public function asignarServicios($codigoCotizacion, $servicio, $areaTrabajo, $cantidadPersonas, $precioUnitario){
        if ($this->esCotizacion($codigoCotizacion)) {
            if ($this->registrarServicioYDetalles($codigoCotizacion, $servicio, $areaTrabajo, $cantidadPersonas, $precioUnitario)) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    /**
     * Devuelve una Lista de Datos Principales de una Cotizacion
     */
    public function getDatosDeCotizacion($codCotizacion){
        $result = $this->conexion->execute("SELECT c.nombre, p.fecha, p.estado, p.precio_total, p.descripcion_servicios
                                            FROM presentacion as p, cliente as c 
                                            WHERE p.cod_cliente_presentacion=c.cod_cliente and 
                                                  tipo_presentacion='C' and p.cod_presentacion=$codCotizacion;");
        if (pg_num_rows($result)>0) {
            return array(pg_result($result, 0, 0), pg_result($result,0, 1), pg_result($result, 0, 2), pg_result($result, 0, 3), pg_result($result, 0, 4));  
        }else{
            die("error de Cotizacion");
        }
    }

    /**
     * Devuelve una lista de Servicios Detallados de una Cotizacion
     */
    public function getListaServiciosDeCotizacion($codCotizacion){
        return $this->conexion->execute("SELECT ps.id_servicio, nombre, area_trabajo, cant_personal, precio_unitario 
                                         FROM presentacion_servicio as ps, servicio as s 
                                         WHERE ps.id_servicio=s.id_servicio and ps.cod_presentacion=$codCotizacion;");
    }

    /**
     * Devuelve Datos actualies de una Cotizacion (Datos importantes para Editar)
     */
    public function getDatosCotizacionEditar($codCotizacion) {
        return $this->conexion->execute("SELECT p.fecha, c.nombre, co.cant_dias, p.precio_total, 
                                                co.tipo_servicio, co.material, p.estado, p.descripcion_servicios
                                         FROM presentacion as p, cotizacion as co, cliente as c
                                         WHERE p.cod_presentacion = co.cod_presentacion_cotizacion and 
                                                c.cod_cliente=p.cod_cliente_presentacion and co.cod_presentacion_cotizacion=$codCotizacion;");
    }

    /**
     * Modificar los atributos Principales de una Cotizacion a traves de su código
     */
    public function updateCotizacion($codigo, $fecha, $nombreCliente, $cantDias, $tipoServicio, $estadoMaterial, $estadoCotizacion, $descripcionServicio){
        try {
            $this->conexion->execute("UPDATE cotizacion 
                                             SET cant_dias=$cantDias, 
                                                 tipo_servicio = '$tipoServicio', 
                                                 material='$estadoMaterial' 
                                             WHERE cod_presentacion_cotizacion=$codigo;
                                      UPDATE presentacion 
                                             SET fecha='$fecha', 
                                                 estado='$estadoCotizacion', 
                                                 cod_cliente_presentacion=getcodcliente('$nombreCliente'), 
                                                 descripcion_servicios='$descripcionServicio'
                                             WHERE cod_presentacion=$codigo;
                                    ");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Eliminar una Cotiazcion Registrada (tablas: presentacion_servicio, contrato, informe, cotizacion, presentacion)
     */
    public function deleteCotizacion($codCotizacion) {
        try {
            $this->conexion->execute("DELETE FROM presentacion_servicio WHERE cod_presentacion=$codCotizacion;
                                      DELETE FROM contrato WHERE cod_presentacion=$codCotizacion;
                                      DELETE FROM informe WHERE cod_presentacion_cotizacion=$codCotizacion;
                                      DELETE FROM cotizacion WHERE cod_presentacion_cotizacion= $codCotizacion; 
                                      DELETE FROM presentacion WHERE cod_presentacion=$codCotizacion;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getListaServiciosOfrecer($codCotizacion){
        return $this->conexion->execute("SELECT * 
                                         FROM servicio 
                                         WHERE id_servicio NOT IN (SELECT id_servicio 
                                                                   FROM presentacion_servicio 
                                                                   WHERE cod_presentacion=$codCotizacion)
                                         ORDER BY nombre;");
    }

    public function eliminarServicioDeCotizacion($codCotizacion, $idServicio){
        try {
            $this->conexion->execute("DELETE FROM presentacion_servicio WHERE cod_presentacion=$codCotizacion AND id_servicio=$idServicio;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getNamesServicio($idServicio){
        try {
            $result = $this->conexion->execute("SELECT nombre FROM servicio WHERE id_servicio=$idServicio;");
            return pg_result($result, 0, 0);
        } catch (\Throwable $th) {
            return null;
        }
    }
}
?>