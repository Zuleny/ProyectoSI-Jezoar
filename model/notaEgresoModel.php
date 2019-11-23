<?php
require 'Conexion.php';

class NotaEgreso{
    private $nroNotaEgreso;
    private $fecha;
    private $idPersonal;
    private $codAlmacen;
    private $conexion;

    public function __construct($fecha = "01/01/2001", $nombrePersonal = "", $nombreAlmacen = "") {
        $this->conexion = new Conexion();
        $this->nroNotaEgreso = $this->getNuevoNroNota();
        $this->fecha = $fecha;
        $this->idPersonal = $this->getIdPersonal($nombrePersonal);
        $this->codAlmacen = $this->getCodAlmacen($nombreAlmacen);
    }

    private function getCodAlmacen($nombreAlmacen) {
        if ($nombreAlmacen != "") {
            $result = $this->conexion->execute("SELECT cod_almacen FROM almacen WHERE nombre = '$nombreAlmacen';");
            return pg_result($result, 0, 0);
        }else{
            return "";
        }
    }

    public function getConexion(){
        return $this->conexion;
    }

    public function getUltimoNroNota() {
        $result = $this->conexion->execute("SELECT nro_nota FROM nota ORDER BY nro_nota DESC LIMIT 1;");
        return pg_result($result, 0, 0);
    }

    public function getNuevoNroNota() {
        return $this->getUltimoNroNota()+1;
    }

    private function getIdPersonal($nombrePersonal){
        if ($nombrePersonal != "") {
            $result = $this->conexion->execute("SELECT id_personal FROM personal WHERE nombre='$nombrePersonal';");
            return pg_result($result, 0, 0);
        }else{
            return "";
        }
    }

    public function getDatosNotaEgresoEditar($nro_nota){
        return $this->conexion->execute("SELECT p.nombre, n.fecha, a.nombre 
                                         FROM nota as n, personal as p, almacen as a
                                         WHERE n.cod_almacen=a.cod_almacen and 
                                                p.id_personal=n.id_personal and 
                                                n.nro_nota=$nro_nota;");
    }

    public function getListaAlmacenes(){
        $result = $this->conexion->execute("SELECT nombre FROM almacen;");
        return $result;
    }   

    public function getListaPersonal() {
        return $this->conexion->execute("SELECT nombre 
                                            FROM personal 
                                            ORDER BY nombre;");
    }

    public function getNombreAlmacen() {
        return $this->conexion->execute("SELECT nombre 
                                            FROM almacen 
                                            ORDER BY nombre;");
    }

    public function getListaDeNotasEgreso(){
        return $this->conexion->execute("SELECT n.nro_nota, p.nombre, n.fecha, a.nombre, n.tipo 
                                            FROM nota as n,personal as p, almacen as a  
                                            WHERE n.id_personal=p.id_personal and 
                                                n.cod_almacen=a.cod_almacen and 
                                                n.tipo='E' 
                                            ORDER BY n.nro_nota;");
    }

    public function insertNotaEgreso(){
        try {
            $this->conexion->execute("INSERT INTO nota(nro_nota, fecha, tipo, cod_almacen, id_personal) 
                                        VALUES (".$this->nroNotaEgreso.",'".$this->fecha."','E',".$this->codAlmacen.",".$this->idPersonal.");");
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
                                                n.nro_nota=$nroNotaDetalle
                                          ORDER BY i.nombre;");
    }

    public function getListaInsumosDeNotaEgreso($nroNotaDetalle){
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

    public function deleteNotaDevolucion($nroNota){
        try {
            $this->conexion->execute("DELETE FROM detalle_nota WHERE nro_nota=$nroNota;");
            $this->conexion->execute("DELETE FROM nota WHERE nro_nota=$nroNota ;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function updateNotaEgreso($nroNota, $personalEditar, $fechaEditar, $almacenEditar){
        try {
            $this->conexion->execute("UPDATE nota set fecha='$fechaEditar', cod_almacen=getcodalmacenonname('$almacenEditar'), id_personal=getidpersonal('$personalEditar') WHERE nro_nota=$nroNota;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}



?>
