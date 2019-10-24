<?php
require 'Conexion.php';

class NotaDevolucion{
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

    private function getLastNroNota(){
        $result = $this->conexion->execute("SELECT nro_nota FROM nota ORDER BY nro_nota DESC LIMIT 1;");
        return pg_result($result, 0, 0);
    }

    private function getNewNroNota(){
        return $this->getLastNroNota() + 1;
    }

    private function getIdPersonal($nombrePersonal){
        if ($nombrePersonal != "") {
            $result = $this->conexion->execute("SELECT id_personal FROM personal WHERE nombre = '$nombrePersonal';");
            return pg_result($result, 0, 0);
        }else{
            return "";
        }
    }

    private function getCodAlmacen($nombreAlmacen){
        if ($nombreAlmacen != "") {
            $result = $this->conexion->execute("SELECT cod_almacen FROM almacen WHERE nombre = '$nombreAlmacen';");
            return pg_result($result, 0, 0);
        }else{
            return "";
        }
    }

    public function getListaDeNotasDeDevolucion(){
        $result = $this->conexion->execute("SELECT * FROM getListadenotasdedevolucion();");
        return $result;
    }

    public function getListaPersonal(){
        $result = $this->conexion->execute("SELECT nombre FROM personal;");
        return $result;
    }

    public function getListaAlmacenes(){
        $result = $this->conexion->execute("SELECT nombre FROM almacen;");
        return $result;
    }   

    public function insertNotaDevolucion(){
        try {
            $this->conexion->execute("INSERT INTO nota(nro_nota, fecha, tipo, cod_almacen, id_personal) VALUES (".$this->nroNota.",'".$this->fecha."','D',".$this->codAlmacen.",".$this->idPersonal.");");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function deleteNotaDevolucion($nroNota){
        try {
            $this->conexion->execute("DELETE FROM detalle_nota WHERE nro_nota=$nroNota ;");
            $this->conexion->execute("DELETE FROM nota WHERE nro_nota=$nroNota ;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function getInsumos($nroNotaDetalle){
        return $this->conexion->execute("SELECT i.nombre
                                         FROM nota as n, almacen as a, insumo_almacen as ia, insumo as i 
                                         WHERE n.cod_almacen=a.cod_almacen and 
                                                ia.cod_almacen=a.cod_almacen and 
                                                ia.cod_insumo=i.cod_insumo and 
                                                n.nro_nota=$nroNotaDetalle;");
    }

    public function getListaInsumosDeNotaDevolucion($nroNotaDetalle){
        return $this->conexion->execute("SELECT id_detalle, nombre_insumo, cantidad_insumo 
                                         FROM detalle_nota 
                                         WHERE nro_nota=$nroNotaDetalle;");
    }

    private function getIdDetalle($nroNota){
        $result = $this->conexion->execute("SELECT id_detalle 
                                            FROM detalle_nota 
                                            WHERE nro_nota=$nroNota 
                                            ORDER BY id_detalle desc 
                                            LIMIT 1;
        ");
        return pg_result($result, 0, 0)+1;
    }

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

    public function deleteDetalleInsumo($nroNota, $idDetalle){
        try {
            $this->conexion->execute("DELETE FROM detalle_nota WHERE nro_nota=$nroNota and id_detalle=$idDetalle;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}

?>