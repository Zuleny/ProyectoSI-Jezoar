<?php
include "Conexion.php";
class Propuesta{
    // Atributos
    public $codPropuesta;
    public $fecha;
    public $codCliente;
    public $cantMeses;
    public $estado;
    public $descripcionServicio;
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
    public function insertarPropuesta($fecha,$nombreCliente,$cantMeses,$descripcionServicio,$estado){
        try {
            $this->codPropuesta=$this->getCodigoPropuesta();
            $this->fecha=$fecha;
            $this->codCliente=$this->getCodCliente($nombreCliente);
            $this->cantMeses=$cantMeses;
            $this->estado=$estado;
            $this->descripcionServicio=$descripcionServicio;
            $this->precioTotal=$this->getTotal();

            $this->conexion->execute("insert into Presentacion(cod_presentacion,fecha,estado,precio_total,cod_cliente_presentacion,descripcion_servicios,tipo_presentacion) values ($this->codPropuesta,'$this->fecha','$this->estado',$this->precioTotal,$this->codCliente,'$this->descripcionServicio','P');");
            $this->conexion->execute("insert into Propuesta(cod_presentacion_propuesta,cant_meses) values ($this->codPropuesta,$this->cantMeses);");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function actualizarPropuesta($codPropuesta,$fecha,$nombreCliente,$cantMeses,$descripcionServicio,$estado){
        try {

            $this->fecha=$fecha;
            $this->codCliente=$this->getCodCliente($nombreCliente);
            $this->cantMeses=$cantMeses;
            $this->estado=$estado;

            $this->conexion->execute("UPDATE Presentacion SET fecha='$this->fecha',cod_cliente_presentacion=$this->codCliente, descripcion_servicios='$descripcionServicio', estado='$this->estado' where cod_presentacion=$codPropuesta;");
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
                                                descripcion_servicios,
                                                precio_total 
                                         FROM presentacion,propuesta 
                                         WHERE cod_presentacion=cod_presentacion_propuesta and 
                                                tipo_presentacion='P';");
        return $result;
    }
    //Asignacion de Servicios
    /**
     * Registra un Servicio y sus Detalles a una Propuesta
     */
    public function agregarServicio($cod_presentacion,$nombreServicio,$area_trabajo,$cant_personal,$precio_unitario){
        try {
            $id_servicio=$this->getIdServicio($nombreServicio);
            $this->conexion->execute("INSERT INTO presentacion_servicio(cod_presentacion, id_servicio, area_trabajo, cant_personal, precio_unitario) 
                                      VALUES ($cod_presentacion, $id_servicio, '$area_trabajo', $cant_personal, $precio_unitario);");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function actualizarServicio($cod_presentacion,$id_servicio,$area_trabajo,$cant_personal,$precio_unitario){
        try {

            $this->conexion->execute("UPDATE presentacion_servicio set area_trabajo='$area_trabajo', cant_personal='$cant_personal',precio_unitario=$precio_unitario where id_servicio=$id_servicio and cod_presentacion=$cod_presentacion;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function eliminarServicio($cod_presentacion,$id_servicio){
        try {
            $this->conexion->execute("DELETE FROM presentacion_servicio where id_servicio=$id_servicio and cod_presentacion=$cod_presentacion;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    private  function getIdServicio($nombreServicio){
        $result=$this->conexion->execute("select id_servicio from servicio where nombre='$nombreServicio';");
        return pg_result($result,0,0);
    }
    /**
     * Devuelve una lista de Servicios
     */
    public function getListaServicios(){
        return $this->conexion->execute("SELECT nombre from servicio;");
    }


    public function getListaInsumos(){
        return $this->conexion->execute("SELECT nombre from insumo;");
    }
    /**
     * Devuelve la lista de servicios registrados de una determinada propuesta
     */
    public function getListaServicioPropuesta($cod_propuesta){
        $result=$this->conexion->getArrayAssoc("select servicio.id_servicio,servicio.nombre, presentacion_servicio.area_trabajo,presentacion_servicio.cant_personal,presentacion_servicio.precio_unitario from presentacion_servicio,servicio where presentacion_servicio.id_servicio=servicio.id_servicio and cod_presentacion=$cod_propuesta;");
        return $result;
    }


    //Asigancion de insumos

    public function agregarInsumo($cod_presentacion,$nombreInsumo,$cant_insumo){
        try {
            $cod_insumo=$this->getCodInsumo($nombreInsumo);
            $this->conexion->execute("INSERT INTO propuesta_insumo values ($cod_presentacion,$cod_insumo,$cant_insumo);");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function actualizarInsumo($cod_presentacion,$cod_insumo,$cant_insumo){
        try {

            $this->conexion->execute("UPDATE propuesta_insumo set cant_insumo=$cant_insumo where cod_presentacion_propuesta=$cod_presentacion and cod_insumo=$cod_insumo;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function eliminarInsumo($cod_presentacion,$cod_insumo){
        try {
            $this->conexion->execute("DELETE FROM propuesta_insumo where cod_presentacion_propuesta=$cod_presentacion and cod_insumo=$cod_insumo;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
    /**
     * Devuelve la lista de insumos registrados de una determinada propuesta
     */
    public function getListaInsumoPropuesta($cod_propuesta){
        $result=$this->conexion->getArrayAssoc("select insumo.cod_insumo,insumo.nombre,propuesta_insumo.cant_insumo from insumo,propuesta_insumo
                                                       where insumo.cod_insumo=propuesta_insumo.cod_insumo and propuesta_insumo.cod_presentacion_propuesta=$cod_propuesta;");
        return $result;
    }

    public function getCodInsumo($nombreInsumo){
        $result=$this->conexion->execute("select cod_insumo from insumo where nombre='$nombreInsumo';");
        return pg_result($result,0,0);
    }

}
?>