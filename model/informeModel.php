<?php
require 'Conexion.php';
class Informe{
    public $cod_informe;
    public $fechaActual;
    public $descripcion;
    public $conexion;

    public function __construct($descripcion="calidad" )
    {
        $this->conexion = new Conexion();
        $this->cod_informe = $this->getNewCode()+1;
        $fechaPhp=getdate();
        $this->fechaActual =$fechaPhp['year'].'-'.$fechaPhp['mon'].'-'.$fechaPhp['mday'];
        $this->descripcion= $descripcion;

    }
    public function getNewCode(){
        $result = $this->conexion->execute("select max(cod_informe) from informe;");
        return pg_result($result,0,0);
    }
    public function registrarInforme($codCotizacion,$image1,$image2){
        try{
            $this->conexion->execute("insert into informe(cod_informe, fecha, descripcion, cod_presentacion_cotizacion, imageafter, imagebefore) values ($this->cod_informe,'$this->fechaActual','$this->descripcion',$codCotizacion,'$image1','$image2');");
            return true;
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
        return $result = $this->conexion->execute("select cod_informe, nombre, informe.fecha,imageafter, imagebefore from cliente,informe, presentacion where cod_cliente=cod_cliente_presentacion and cod_presentacion=informe.cod_presentacion_cotizacion order by cod_informe;");
    }
    public function deleteInforme($cod){
        return $this->conexion->execute("delete from informe where cod_informe=$cod");
    }
    public function visualizarDatosParaPDF($codInforme){
        return $result = $this->conexion->execute("select * from informe where cod_informe=$codInforme;");

    }
    public function getNombreClientePorcodigoCotizacion($codCotizacion){
        $result = $this->conexion->execute("select nombre from cotizacion,presentacion,cliente where cod_cliente=cod_cliente_presentacion and cod_presentacion=cod_presentacion_cotizacion and cod_presentacion_cotizacion=$codCotizacion;");
        return pg_result($result,0,0);
    }
    public function getNombreClientePorCodInforme($codInforme){
        $result = $this->conexion->execute("select nombre,direccion from cliente, presentacion, cotizacion,informe where cod_informe=$codInforme and cod_cliente = presentacion.cod_cliente_presentacion and presentacion.cod_presentacion = cotizacion.cod_presentacion_cotizacion
        and cotizacion.cod_presentacion_cotizacion = informe.cod_presentacion_cotizacion;");
        return pg_result($result,0,0);
    }
}

?>
