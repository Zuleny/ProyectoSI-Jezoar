<?php
require 'Conexion.php';
class Informe{
    public $cod_informe;
    public $fechaActual;
    //public $cod_cliente;
    public $descripcion;
    public $cod_cotizacion;
    public $conexion;

    public function __construct($nameCliente="Yerba Buena",$descripcion="claro" )
    {
        $this->conexion = new Conexion();
        $this->cod_informe = $this->getNewCode()+1;
        $fechaPhp=getdate();
        $this->fechaActual =$fechaPhp['year'].'-'.$fechaPhp['mon'].'-'.$fechaPhp['mday'];
        //$this->cod_cliente= $this->getCodigoDeCliente($nameCliente);
        $this->descripcion= "$descripcion";
        $this->cod_cotizacion= $this->getCodCotizacion($nameCliente);
    }

    public function getCodigoDeCliente($nameCliente){
            $result = $this->conexion->execute("SELECT cod_cliente FROM cliente where nombre='$nameCliente';");
            return $result;
    }

    public function getCodCotizacion($nombreCliente){
            $result = $this->conexion->execute("select cliente.cod_cliente from cliente,presentacion, cotizacion where cliente.cod_cliente=presentacion.cod_cliente_presentacion and
                                                                       tipo_presentacion='C'and estado='Aceptado' and nombre = '$nombreCliente';");

            return pg_result($result,0,0);
    }
    public function listaCliente(){
        $result = $this->conexion->execute("select nombre from Cliente,presentacion where cod_cliente=cod_cliente_presentacion and tipo_presentacion='C' and estado='Aceptado';");
        return $result;
    }
    public function getNewCode(){
        $result = $this->conexion->execute("select count(*) from informe;");
        return pg_result($result,0,0);
    }
    public function registrarInforme($image1,$image2){
        try{
            $this->conexion->execute("insert into informe(cod_informe, fecha, descripcion, cod_presentacion_cotizacion, imagebefore, imageafter) values ($this->cod_informe,'$this->fechaActual','$this->descripcion',$this->cod_cotizacion,'$image1','$image2');");
            return false;
        }catch (\Throwable $th) {
            return false;
        }
    }
    public function getImage($dataURI){
        $img = explode(',',$dataURI,2);
        $pic = 'data://text/plain;base64,'.$img[1];
        $type = explode("/", explode(':', substr($dataURI, 0, strpos($dataURI, ';')))[1])[1]; // get the image type
        if ($type=="png"||$type=="jpeg"||$type=="gif") return array($pic, $type);
        return false;
    }
    public function getListInforme(){
        return $result = $this->conexion->execute("select cod_informe, nombre, informe.fecha from cliente,informe, presentacion where cod_cliente=cod_cliente_presentacion and cod_presentacion=informe.cod_presentacion_cotizacion order by cod_informe;");
    }
    public function deleteInforme($cod){
        return $this->conexion->execute("delete from informe where cod_informe=$cod");
    }
    public function visualizarDatosParaPDF(){
        return $result = $this->conexion->execute("select nombre,descripcion from cliente,informe, presentacion where cod_cliente=cod_cliente_presentacion and cod_presentacion=informe.cod_presentacion_cotizacion order by cod_informe;");

    }

}

?>
