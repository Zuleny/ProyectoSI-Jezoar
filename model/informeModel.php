<?php
require 'Conexion.php';
class Informe
{
    public $cod_informe;
    public $nombre_cliente;
    public $fechaActual;
    public $descripcion;
    public $cod_cotizacion;
    public $image;
    public $conexion;

    public function __construct($nameCliente="Yerba Buena",$descripcion="claro" )
    {
        $this->conexion = new Conexion();

        $this->cod_informe = $this->getNewCode()+1;
        $fechaPhp=getdate();
        $this->fechaActual =$fechaPhp['year'].'-'.$fechaPhp['mon'].'-'.$fechaPhp['mday'];
        $this->cod_cliente= $this->getCodigoDeCliente($nameCliente);
        $this->descripcion= "$descripcion";
        $this->nombre_cliente="$nameCliente";
        $this->cod_cotizacion= $this->getCodCotizacion($nameCliente);
        $this->image="miau";
    }

    public function getCodigoDeCliente(){
            $result = $this->conexion->execute("SELECT cod_cliente FROM cliente;");
            return $result;
    }

    public function getCodCotizacion($nombreCliente){

            $result = $this->conexion->execute("select cliente.cod_cliente from cliente,presentacion, cotizacion where cliente.cod_cliente=presentacion.cod_cliente_presentacion and
                                                                       tipo_presentacion='C'and estado='Aceptado' and
                                                                       nombre = '$nombreCliente';");


        return pg_result($result,0,0);
    }
    public function listaClente(){
        $result = $this->conexion->execute("select nombre from Cliente,presentacion where cod_cliente=cod_cliente_presentacion and tipo_presentacion='C' and estado='Aceptado';");
        return $result;
    }
    public function getNewCode(){
        $result = $this->conexion->execute("select count(*) from informe;");
        return pg_result($result,0,0);
    }
    public function registrarInforme($image1,$image2){

        $this->conexion->execute("insert into informe(cod_informe, fecha, descripcion, cod_presentacion_cotizacion, imagebefore, imageafter) values ($this->cod_informe,'$this->fechaActual','$this->descripcion',$this->cod_cotizacion,'$image1','$image2');");
        return true;
    }
    public function getImage($dataURI){
        $img = explode(',',$dataURI,2);
        $pic = 'data://text/plain;base64,'.$img[1];
        $type = explode("/", explode(':', substr($dataURI, 0, strpos($dataURI, ';')))[1])[1]; // get the image type
        if ($type=="png"||$type=="jpeg"||$type=="gif") return array($pic, $type);
        return false;
    }

}

?>
