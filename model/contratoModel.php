<?php
require "Conexion.php";
class Contrato{
    public $codContrato;
    public $fechaInicial;
    public $fechaFinal;
    public $conexion;

    public function __construct($inicial='', $final=''){
        $this->conexion = new Conexion();
        $this->fechaInicial=$inicial;
        $this->fechaFinal = $final;
        $this->codContrato=$this->codContrato()+1;
    }
    public function codContrato(){
        $result = $this->conexion->execute("select max(cod_contrato) from contrato;");
        return pg_result($result,0,0);
    }
    public function listaCliente(){
        $result = $this->conexion->execute("select distinct nombre from Cliente,presentacion where cod_cliente=cod_cliente_presentacion and estado='Aceptado';");
        return $result;
    }/*
    public function getCodigoDeCliente($nameCliente){
        $result = $this->conexion->execute("SELECT cod_cliente FROM cliente where nombre='$nameCliente';");
        return $result;
    }
    public function getPresentaciones($codCliente){
        $resut = $this->conexion->execute("select * from presentacion where estado='Aceptado' and cod_cliente_presentacion=$codCliente;");
        return $resut;
    }*/
    public function getLitsContrato(){
        $result = $this->conexion->execute("select cod_contrato, nombre,fecha,tipo_presentacion,fecha_inicio,fecha_fin, presentacion.cod_presentacion from contrato,presentacion,cliente where cod_cliente = cod_cliente_presentacion and presentacion.cod_presentacion=contrato.cod_presentacion;");
        return $result;
    }
    public function registrarContrato($codPresentacion){
        try{
            $this->conexion->execute("INSERT INTO contrato(cod_contrato, fecha_inicio, fecha_fin, cod_presentacion) values($this->codContrato,'$this->fechaInicial','$this->fechaFinal',$codPresentacion);");
            return true;
        }catch (\Throwable $th){
            return false;
        }
    }
    public function getNombreCliente($cod){
        $result= $this->conexion->execute("select nombre from presentacion,cliente where cod_cliente=cod_cliente_presentacion and cod_presentacion=$cod;");
        return pg_result($result,0,0);
    }
    public function eliminarContrato($cod_contrato){
        try{
            $this->conexion->execute("delete from contrato where cod_contrato=$cod_contrato");
            return true;
        }catch (\Throwable $th){
            return false;
        }
    }
    public function actualizarContrato($cod_contrato,$fecha_inicial, $fecha_final){
        try{
            $this->conexion->execute("update contrato set fecha_inicio=$fecha_inicial,fecha_fin=$fecha_final where cod_contrato = $cod_contrato");
            return true;
        }catch (\Throwable $th){
            return false;
        }
    }
    public function listaParaEditarContrato($cod_contrato){
        return $this->conexion->execute("select cod_contrato,fecha_inicio,fecha_fin from  contrato where cod_contrato=$cod_contrato;");
    }
    public function agregarBitacora($cod_contrato, $cod_presentacion,$tipo){
        session_start();
        $fecha_hora = date('j-n-Y G:i:s', time());
        $username = $_SESSION['user'];
        $cliente = $this->getNombreCliente($cod_presentacion);
        if ($tipo == 'insert') {
            $this->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Se ha insertado el contrato número '.$cod_contrato.' del cliente '.$cliente.'', '$fecha_hora');");
        }else if ($tipo == 'delet'){
            $this->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Se ha eliminado el contrato número '.$cod_contrato.' del cliente '.$cliente.' ', '$fecha_hora');");
        }else if($tipo == 'edit'){
            $this->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Se ha editado el contrato número '.$cod_contrato.' del cliente '.$cliente.'', '$fecha_hora');");
        }
    }
    public function getCodContrato($cod_presentacion){
        $result = $this->conexion->execute("select cod_contrato from contrato where cod_presentacion=$cod_presentacion;");
        return pg_result($result,0,0);
    }
    public function nombreClientePorCodigoContrato($cod_contrato){
        $result = $this->conexion->execute("select nombre from contrato,presentacion,cliente where cod_cliente = cod_cliente_presentacion and presentacion.cod_presentacion=contrato.cod_presentacion and cod_contrato=$cod_contrato;");
        return pg_result($result,0,0);
    }

    public function tenemosSuContrato($codPresentacion){
        $result = $this->conexion->execute("SELECT COUNT(*) FROM contrato WHERE cod_presentacion=$codPresentacion;");
        if (pg_result($result,0,0)==1) {
            return true;
        }else{
            return false;
        }
    }

    public function getFechasPresentacion($codPresentacion){
        $result = $this->conexion->execute("SELECT fecha_inicio, fecha_fin FROM contrato WHERE cod_presentacion = $codPresentacion;");
        return array(pg_result($result,0,0), pg_result($result,0,1));
    }
}
?>