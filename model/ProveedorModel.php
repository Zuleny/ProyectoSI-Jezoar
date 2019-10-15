<?php
include "Conexion.php";
class Proveedor{
    //atributo
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
    public function getListaDeProveedor(){
        return $this->Conexion->execute("SELECT cod_proveedor,nombre_empresa,email,direccion,telefono,nombre_proveedor FROM Proveedor");
    }
    
    public function getCantidadProveedor(){
        $result = $this->Conexion->execute("select count(*) from Proveedor;");
        return pg_result($result,0,0);
    }
}
?>