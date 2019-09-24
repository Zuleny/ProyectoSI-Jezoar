<?php
class Conexion {
    //atributo
    public $conexionDB;
    //metodos
    public function __construct($host,$port,$nameDB,$user,$passwd){
        $this->conexionDB=pg_connect("host=$host dbname=$nameDB port=$port user=$user password=$passwd") or die("Error de conexion Equipo_Jezoar ".pg_last_error());
    }
    //error var $conexionDB no definifda en class
    public function execute($query) {
        $result=pg_query($this->conexionDB,$sql);
        if (!$result) {
            die("error en la consulta");
        }
        if (pg_num_rows($result)===0) {
            echo "empty query \n";
            return;
        }
        return $result;
    }
}  
/******************Prueba Conexion *****************/ 
/*
     $conexion=new Conexion('localhost','5432','postgres','postgres','216042021');
     if (!$conexion) {
         die("Error ".pg_last_error());
     }
     echo "conexion exitosa \n";
*/
     //$result=$conexion->execute("select nombre from cliente where cod_cliente=1;");
     //echo pg_result($result,0,0);
    
?>
