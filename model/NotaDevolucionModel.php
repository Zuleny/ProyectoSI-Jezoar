<?php
require 'Conexion.php';

class InsumoDevolucion{
    private $insumo;
    private $stock;

    public function __construct(){
        $this->insumo = "";
        $this->stock = 0;
    }

    public function setInsumo($insumo){
        $this->insumo=$insumo;
    }

    public function setSock($stockInsumo){
        if ($stockInsumo>-1) {
            $this->stock=$stockInsumo;
        }
    }

    public function getInsumo(){
        return $this->insumo;
    }

    public function getStock(){
        return $this->stock;
    }
    
    /**
     * si stock < 0 => stock=0 , stock pertenece a los Numeros Naturales
     */
    public function setDatos($insumo, $stock){
        $this->stock = ($stock>-1) ? $stock : 0;
        $this->insumo = $insumo;
    }

}

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

    public function getIdPersonal($nombrePersonal){
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
}

?>