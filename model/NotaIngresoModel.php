<?php
require "Conexion.php";
class NotaIngreso{
    public $nroIngreso;
    private $fechaIngreso;
    private $nombreRecibe;
    private $codAlmacen;
    private $codProveedor;
    public $conexion;
    public function __construct(){
        $this->conexion=new Conexion();
         
        $this->nroIngreso=$this->getNroIngreso()+1;
        $fechaHora=getdate();
        $this->fechaIngreso=$fechaHora['year'].'-'.$fechaHora['mon'].'-'.$fechaHora['mday'];
        $this->nombreRecibe ="";
        $this->codAlmacen=0;
        $this->codProveedor=0;
    }

    public function insertarNotaIngreso($nombreRecibe,$nombreAlmacen,$nombreProveedor){
        try{
            $this->nombreRecibe=$nombreRecibe;
            $this->codAlmacen=$this->getCodAlmacen($nombreAlmacen);
            $this->codProveedor=$this->getCodProveedor($nombreProveedor);
            $this->conexion->execute("insert into nota_ingreso values($this->nroIngreso,'$this->fechaIngreso','$this->nombreRecibe',$this->codAlmacen,$this->codProveedor);");
            return true;
        }catch(\Throwable $th){
            return false;
        }
    }

    public function actualizarNotaIngreso($nro_ingreso,$nombre_recibe){
        try{

            $this->conexion->execute("UPDATE nota_ingreso set nombre_recibe='$nombre_recibe' where nro_ingreso=$nro_ingreso;");
            return true;
        }catch(\Throwable $th){
            return false;
        }
    }

    public function eliminarNotaIngreso($nro_ingreso){
        try{
            $this->conexion->execute("DELETE from nota_ingreso where nro_ingreso=$nro_ingreso;");
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
        $cod=pg_result($result,0,0);
        return $cod;
    }

    public function getCodProveedor($nombreProveedor){
        $result=$this->conexion->execute("SELECT COALESCE(cod_proveedor,1) from proveedor where nombre_proveedor='$nombreProveedor';");
        return pg_result($result,0,0);
    }

    public function getListaNotasIngresos(){
        return $this->conexion->getArrayAssoc("SELECT nro_ingreso, fecha_ingreso, nombre_recibe FROM nota_ingreso;");
    }
    //Auxiliares para detalle Ingreso
    public function insertarDetalleIngreso($nroIngreso,$nombreInsumo,$cantidad,$precioUnitario){
        try{
            $idIngreso=$this->getIdIngreso($nroIngreso)+1;
            $this->conexion->execute("insert into detalle_ingreso values($idIngreso,'$nombreInsumo',$cantidad,$precioUnitario,$nroIngreso);");
            return true;
        }catch(\Throwable $th){
            return false;
        }
    }

    public function actualizarDetalle($nroIngreso,$id_ingreso,$nombre_insumo,$cantidad,$precio){
        try{
            $this->conexion->execute("UPDATE detalle_ingreso SET nombre_insumo='$nombre_insumo',cantidad=$cantidad,precio_unitario=$precio where id_ingreso=$id_ingreso and nro_ingreso=$nroIngreso;");
            return true;
        }catch(\Throwable $th){
            return false;
        }
    }

    public function eliminarDetalleIngreso($nroIngreso,$id_ingreso){
        try{
            $this->conexion->execute("DELETE FROM detalle_ingreso where id_ingreso=$id_ingreso and nro_ingreso=$nroIngreso;");
            return true;
        }catch(\Throwable $th){
            return false;
        }
    }


    
    public function getListaDetalle($nroIngreso){
        return ($this->conexion->getArrayAssoc("SELECT id_ingreso,nombre_insumo,cantidad,precio_unitario from detalle_ingreso where nro_ingreso=$nroIngreso;"));
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