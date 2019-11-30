<?php
include "Conexion.php";
class Herramienta{
    //atributo
    public $codigo;
    public $nombre;
    public $Descripcion;
    public $Estado;

    public $Conexion;
    public function __construct($codigo = -1, $nombre ="",$Descripcion="",$Estado=""){
        $this->codigo=$codigo;
        $this->nombre=$nombre;
        $this->Descripcion=$Descripcion;
        $this->Estado=$Estado;
        $this->Conexion=new Conexion();
    }
    public function insertarHerramienta(){
            $this->Conexion->execute("insert into Insumo(cod_insumo,nombre,descripcion,tipo_insumo) values($this->codigo,'$this->nombre','$this->Descripcion','H');");
            $this->Conexion->execute("insert into Herramienta(cod_insumo_herramienta,estado) values($this->codigo,'$this->Estado');");
            return true;
    }
    
    public function getListaHerramientas(){
        return $this->Conexion->execute("SELECT cod_insumo_herramienta,nombre,descripcion,estado FROM Insumo,Herramienta WHERE cod_insumo=cod_insumo_herramienta;");
    }

    public function getCantidadHerramienta(){
        $result = $this->Conexion->execute("select count(*) from Insumo;");
        return pg_result($result,0,0);
    }

    public function getDatosDeHerramienta($codigo){
        $result = $this->Conexion->execute("SELECT i.nombre,i.descripcion,h.estado
                                            FROM insumo as i, herramienta as h 
                                            WHERE i.cod_insumo=h.cod_insumo_herramienta and 
                                                  i.tipo_insumo='H' and i.cod_insumo=$codigo;");
        if (pg_num_rows($result)>0) {
            return array(pg_result($result, 0, 0), pg_result($result,0, 1), pg_result($result, 0, 2));
        }else{
            die("error de Herramienta");
        }
    }

    public function getDatosHerramientaEditar($codigo) {
        return $this->Conexion->execute("SELECT i.nombre,i.descripcion,h.estado
                                         FROM insumo as i, herramienta as h
                                         WHERE i.cod_insumo=h.cod_insumo_herramienta and h.cod_insumo_herramienta=$codigo;");
    }

    public function updateHerramienta($codigo, $nombre, $descripcion, $estado){
        try {
            $this->Conexion->execute("UPDATE herramienta 
                                      SET estado='$estado'
                                      WHERE cod_insumo_herramienta=$codigo;");

            $this->Conexion->execute("UPDATE insumo
                                      SET nombre='$nombre', descripcion='$descripcion'
                                      WHERE cod_insumo=$codigo;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function deleteHerramienta($codigo) {
        try {
            $this->Conexion->execute("DELETE FROM herramienta WHERE cod_insumo_herramienta= $codigo; 
                                      DELETE FROM insumo WHERE cod_insumo=$codigo;");
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }
}
?>