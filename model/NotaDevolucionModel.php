<?php
require 'Conexion.php';

class NotaDevolucion{

    //Atributos
    private $nroNota;
    private $fecha;
    private $idPersonal;
    private $codAlmacen;
    private $insumos;
    private $conexion;

    /**
     * Constructor
     * $fecha datetype of date ej="13-01-2015"
     * $nombrePersonal: nombre del personal
     * $nombreAlmacen: nombre del Almacen
    */
    public function __construct($fecha = "01-01-2001", $nombrePersonal = "" , $nombreAlmacen = ""){
        $this->conexion = new Conexion();
        $this->nroNota = $this->getNewNroNota();
        $this->fecha = date('Y-m-d',strtotime($fecha));
        $this->idPersonal = $this->getIdPersonal($nombrePersonal);
        $this->codAlmacen = $this->getCodAlmacen($nombreAlmacen);
        $this->insumos = array();
    }

    /**
     * Devuelve el Numero de Nota (Atributo de la Clase)
     */
    public function getNroNota(){
        return $this->nroNota;
    }

    /**
     * Devuelve el Atributo Conexion(Conexion de la BD)
     */
    public function getConexion(){
        return $this->conexion;
    }

    /**
     * Devuelve el Ultimo Nro Nota Registrada
     */
    private function getLastNroNota(){
        $result = $this->conexion->execute("SELECT nro_nota FROM nota ORDER BY nro_nota DESC LIMIT 1;");
        return pg_result($result, 0, 0);
    }

    /**
     * Devuelve el nuevo numero de Nota a Asignar 
     */
    private function getNewNroNota(){
        return $this->getLastNroNota() + 1;
    }

    /**
     * Devuelve el Nuevo Id Personal de un personal a traves de su Nombre
     */
    private function getIdPersonal($nombrePersonal){
        if ($nombrePersonal != "") {
            $result = $this->conexion->execute("SELECT id_personal FROM personal WHERE nombre = '$nombrePersonal';");
            return pg_result($result, 0, 0);
        }else{
            return "";
        }
    }

    /**
     * Devuleve el Codigo de un Almacen a traves de su nombre 
     */
    private function getCodAlmacen($nombreAlmacen){
        if ($nombreAlmacen != "") {
            $result = $this->conexion->execute("SELECT cod_almacen FROM almacen WHERE nombre = '$nombreAlmacen';");
            return pg_result($result, 0, 0);
        }else{
            return "";
        }
    }

    /**
     * Devuelve una lista de Notas de Devolucion con sus Detalles
     */
    public function getListaDeNotasDeDevolucion(){
        $result = $this->conexion->execute("SELECT * FROM getListadenotasdedevolucion();");
        return $result;
    }

    /**
     * Devuelve una Lista de nombres de Personal 
     */
    public function getListaPersonal(){
        $result = $this->conexion->execute("SELECT nombre FROM personal;");
        return $result;
    }

    /**
     * Devuelve una Lista de nombres de Almacenes
     */
    public function getListaAlmacenes(){
        $result = $this->conexion->execute("SELECT nombre FROM almacen;");
        return $result;
    }   

    /**
     * Registrar una Nota de Devolucion al Sistema
     */
    public function insertNotaDevolucion(){
        try {
            $this->conexion->execute("INSERT INTO nota(nro_nota, fecha, tipo, cod_almacen, id_personal) 
                                      VALUES (".$this->nroNota.",
                                              '".$this->fecha."',
                                                'D',
                                               ".$this->codAlmacen.",
                                               ".$this->idPersonal.");");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Elimina una Nota devolucion desde sus detalles y la nota a eliminar
     */
    public function deleteNotaDevolucion($nroNota){
        try {
            $this->conexion->execute("DELETE FROM detalle_nota WHERE nro_nota=$nroNota;
                                      DELETE FROM nota WHERE nro_nota=$nroNota;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Devuelve  una lista de nombres de Insumos para registrar en una Nota de Devolucion $nroNotaDetalle
     */
    public function getInsumos($nroNotaDetalle){
        return $this->conexion->execute("SELECT i.nombre
                                         FROM nota as n, almacen as a, insumo_almacen as ia, insumo as i 
                                         WHERE n.cod_almacen=a.cod_almacen and 
                                                ia.cod_almacen=a.cod_almacen and 
                                                ia.cod_insumo=i.cod_insumo and 
                                                n.nro_nota=$nroNotaDetalle
                                          ORDER BY i.nombre;");
    }

    /**
     *  Devuelve una lista de Insumos registrados en una Nota de Devolucion
     */
    public function getListaInsumosDeNotaDevolucion($nroNotaDetalle){
        return $this->conexion->execute("SELECT id_detalle, nombre_insumo, cantidad_insumo 
                                         FROM detalle_nota 
                                         WHERE nro_nota=$nroNotaDetalle
                                         ORDER BY id_detalle;");
    }

    /**
     * Devuelve el ultimo id_detalle de una nota Devolucion
     */
    private function getIdDetalle($nroNota){
        $result = $this->conexion->execute("SELECT id_detalle 
                                            FROM detalle_nota 
                                            WHERE nro_nota=$nroNota 
                                            ORDER BY id_detalle desc 
                                            LIMIT 1;
        ");
        return pg_result($result, 0, 0)+1;
    }

    /**
     * Registrar Insumosa una Nota de Devolucion con su detalle (stock) 
     */
    public function registrarInsumo($insumo, $stock, $nroNota){
        try {
            $idDetalle = $this->getIdDetalle($nroNota);
            $this->conexion->execute("INSERT INTO detalle_nota(nro_nota, id_detalle, nombre_insumo, cantidad_insumo) 
                                      VALUES ($nroNota, $idDetalle,'$insumo', $stock);");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Eliminar un Detalle Insumo
     */
    public function deleteDetalleInsumo($nroNota, $idDetalle){
        try {
            $this->conexion->execute("DELETE FROM detalle_nota WHERE nro_nota=$nroNota and id_detalle=$idDetalle;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    /**
     * Obtiene Datos Principales de Una Nota de Devolucion a Modificar
     */
    public function getDatosNotaDevolucionEditar($nro_nota){
        return $this->conexion->execute("SELECT p.nombre, n.fecha, a.nombre 
                                         FROM nota as n, personal as p, almacen as a
                                         WHERE n.cod_almacen=a.cod_almacen and 
                                                p.id_personal=n.id_personal and 
                                                n.nro_nota=$nro_nota;");
    }

    /**
     * Modificar una Nota De devolucion (Numero de Nota)
     */
    public function updateNotaDevolucion($nroNota, $personalEditar, $fechaEditar, $almacenEditar){
        try {
            $this->conexion->execute("UPDATE nota set fecha='$fechaEditar', cod_almacen=getcodalmacenonname('$almacenEditar'), id_personal=getidpersonal('$personalEditar') WHERE nro_nota=$nroNota;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}

?>