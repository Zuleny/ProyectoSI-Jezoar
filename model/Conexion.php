<?php
class Conexion {
    //atributo
    public $conexionDB;
    //metodos
    public function __construct($host,$user,$passwd,$nameDB,$port,$socket){
        $this->conexionDB = mysqli_connect($host,$user,$passwd,$nameDB,$port,$socket);
        if (!$this->conexionDB) {
            die("Error al Conectar la BD: ".mysqli_error($this->conexionDB));
        }
    }
    //error var $conexionDB no definifda en class
    public function execute($query) {
        try {
            return mysqli_query($this->conexionDB, $query);
        } catch (Exception $ex) {
            die('Error en el proceso de la consulta: '.$ex);
        }
    }
}
?>
