<?php
include "../../model/Conexion.php";
    class NotaEgreso{
        public $nroNotaEgreso;
        public $fecha;
        public $tipo;
        public $nombre_personal;
        public $conexion;

        public function __construct($nroNotaEgreso, $fecha , $nombre_personal ){
            $this->nroNotaEgreso=$nroNotaEgreso;
            $this->fecha = $fecha;
            $this->tipo = 'E';
            $this->nombre_personal = $nombre_personal;
            $this->conexion = new Conexion();
        }
        public function insertarNotaEgreso(){
            //$this->conexion->execute("insert into servicio(id_servicio,nombre) values ($this->id_servicio,'$this->nombre');");
            $this->conexion->execute("insert into Nota() values ();");
        }
        public function getListaNotaEgreso(){
            $result = $this->conexion->execute("SELECT insumo.cod_insumo ,nombre_insumo, cantidad_insumo FROM  insumo, insumo_almacen, almacen,nota, detalle_nota
                                                    WHERE insumo.cod_insumo = insumo_almacen.cod_insumo and insumo_almacen.cod_almacen = almacen.cod_almacen
                                                           and almacen.cod_almacen = nota.cod_almacen and nota.nro_nota = detalle_nota.nro_nota and detalle_nota.nombre_insumo = insumo.nombre
                                                    and nota.tipo  = 'E' and detalle_nota.nro_nota=1;");
            return $result;
        }
        public function getStockNota(){
            $result = $this->conexion->execute("SELECT stock FROM  insumo, insumo_almacen, almacen,nota, detalle_nota
                                                    WHERE insumo.cod_insumo = insumo_almacen.cod_insumo and insumo_almacen.cod_almacen = almacen.cod_almacen
                                                           and almacen.cod_almacen = nota.cod_almacen and nota.nro_nota = detalle_nota.nro_nota and detalle_nota.nombre_insumo = insumo.nombre
                                                    and nota.tipo  = 'E' and detalle_nota.nro_nota=1;");
            return $result;
        }
        public function getUltimaNota(){
            $result = $this->conexion->execute("SELECT count(*) from nota;");
            return pg_result($result,0,0);
        }
        public function getNewNota(){
            return $this->getUltimaNota()+1;
        }


 }
?>
