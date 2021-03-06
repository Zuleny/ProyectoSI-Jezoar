<?php
include "Conexion.php";
class Proveedor{
    public $codProveedor;
    public $nombre_empresa;
    public $email;
    public $direccion;
    public $telefono;
    public $nombre_proveedor;
    public $Conexion;
    public function __construct($codProveedor,$empresaProv,$emailProv,$dirProv,$telProv,$nameProv){ 
        $this->Conexion=new Conexion();
        $this->codProveedor=$codProveedor;
        $this->nombre_empresa=$empresaProv;
        $this->email=$emailProv;
        $this->direccion=$dirProv;
        $this->telefono=$telProv;
        $this->nombre_proveedor=$nameProv;
    }
    public function insertarProveedor(){
        try{
            $this->Conexion->execute("insert into Proveedor(cod_proveedor,nombre_empresa,email,direccion,telefono,nombre_proveedor) values($this->codProveedor,'$this->nombre_empresa','$this->email','$this->direccion',$this->telefono,'$this->nombre_proveedor');");
            return true;
        }catch (\Throwable $th){
            return false;
        }
    }
    public function getListaProveedor(){
        return $this->Conexion->getArrayAssoc("SELECT cod_proveedor,nombre_empresa,email,direccion,telefono,nombre_proveedor FROM Proveedor");
    }
    
    public function getCantidadProveedor(){
        $result = $this->Conexion->execute("select count(*) from Proveedor;");
        return pg_result($result,0,0);
    }
    
    public function actualizarProveedor($codproveedor,$empresaproveedor,$emailproveedor,$direccionproveedor,$telefonoproveedor,$nombreproveedor){
        try{
            $this->Conexion->execute("UPDATE Proveedor SET nombre_empresa='$empresaproveedor', email='$emailproveedor',direccion='$direccionproveedor',telefono='$telefonoproveedor',nombre_proveedor='$nombreproveedor' where cod_proveedor=$codproveedor;");
            return true;
        }catch (\Throwable $th){
            return false;
        }   
    }
}
?>