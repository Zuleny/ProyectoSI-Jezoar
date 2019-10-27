<?php
require "Conexion.php";
class NotaIngreso{
    private $nroIngreso;
    private $fechaIngreso;
    private $nombreRecibe;
    private $codAlmacen;
    private $codProveedor;
    private $conexion;
    public function __construct($nombreRecibe,$nombreAlmacen,$nombreProveedor){
        $this->conexion=new Conexion();
         
        $this->nroIngreso=$this->getNroIngreso()+1;
        $fechaHora=getdate();
        $this->fechaIngreso=$fechaHora['year'].'-'.$fechaHora['mon'].'-'.$fechaHora['mday'];
        $this->nombreRecibe =$nombreRecibe;
        $this->codAlmacen=$this->getCodAlmacen($nombreAlmacen);
        $this->codProveedor=$this->getCodProveedor($nombreProveedor);
    }

    public function insertarNotaIngreso(){
        try{
            $this->conexion->execute("insert into nota_ingreso values($this->nroIngreso,'$this->fechaIngreso','$this->nombreRecibe',$this->codAlmacen,$this->codProveedor);");
            return true;
        }catch(\Throwable $th){
            return false;
        }
    }
    //Auxiliares

    
    public function getListaAlmacen(){
        $result=$this->conexion->execute("select nombre from almacen;");
        return $result;
    }

    public function getListaProveedor(){
        $result=$this->conexion->execute("select nombre_proveedor from proveedor;");
        return $result;
    }

    public function getNroIngreso(){
        $result=$this->conexion->execute("SELECT COALESCE(MAX(nro_ingreso),0) from nota_ingreso;");
        return pg_result($result,0,0);
    }

    public function getCodAlmacen($nombreAlmacen){
        $result=$this->conexion->execute("SELECT COALESCE(cod_almacen,1) from almacen where nombre='$nombreAlmacen';");
        return pg_result($result,0,0);
    }

    public function getCodProveedor($nombreProveedor){
        $result=$this->conexion->execute("SELECT COALESCE(cod_proveedor,1) from proveedor where nombre_proveedor='$nombreProveedor';");
        return pg_result($result,0,0);
    }

    public function getListaNotasIngresos(){
        return $this->conexion->execute("SELECT nro_ingreso, fecha_ingreso, nombre_recibe FROM nota_ingreso;");
    }
    //Auxiliares para detalle Ingreso
    public function insertarDetalleIngreso($nombreInsumo,$cantidad,$precioUnitario){
        try{
            $nroIngreso=$this->getNroIngreso();
            $idIngreso=$this->getIdIngreso($nroIngreso)+1;
            echo $idIngreso;
            $this->conexion->execute("insert into detalle_ingreso values($idIngreso,'$nombreInsumo',$cantidad,$precioUnitario,$nroIngreso);");
            return true;
        }catch(\Throwable $th){
            return false;
        }
    }
    
    public function getIdIngreso($nroIngreso){
        $result=$this->conexion->execute("SELECT COALESCE(MAX(id_ingreso),0) from detalle_ingreso where nro_ingreso=$nroIngreso;"); 
        return pg_result($result,0,0);
    }

    public function getListaNroIngresos(){
        $result=$this->conexion->execute("select nro_ingreso from nota_ingreso;");
        return $result;
    }

    public function getListaInsumos(){
        $result=$this->conexion->execute("select nombre from insumo;");
        return $result;
    }

    

}
?>