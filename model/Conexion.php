<?php
class Conexion {
    //atributo
    public $conexionDB;
    //metodos
    public function __construct($host="localhost",$port="5432",$nameDB="jezoar",$user="jezoar",$passwd="123456"){
        $this->conexionDB=pg_connect("host=$host dbname=$nameDB port=$port user=$user password=$passwd") or die("Error de conexion Equipo_Jezoar ".pg_last_error());
    }
    //error var $conexionDB no definifda en class
    public function execute($query) {
        $result=pg_query($this->conexionDB,$query);
        if (!$result) {
            die("error en la consulta");
        }
        if (pg_num_rows($result)===0) {
            echo "empty query \n";
            return $result;
        }
        return $result;
    }
}
/*
    $conexion=new Conexion('localhost','5432','jezoar','jezoar','123456');
    if (!$conexion) {
        die("Error ".pg_last_error());
    }else{

    }
*/
?>