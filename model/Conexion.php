 <?php

class Conexion {
    //atributos
    public $ConexionDB;
    
    /**
     * Constructor
     */
/*
    public function __construct($host="localhost",$port="5432",$nameDB="jezoar",$user="jezoar",$passwd="123456"){
         $this->ConexionDB = pg_connect("host=$host dbname=$nameDB port=$port user=$user password=$passwd") or die("Error de conexion Equipo_Jezoar ".pg_last_error());
    }
    */
    public function __construct($host="ec2-107-22-239-155.compute-1.amazonaws.com",$port="5432",$nameDB="dcmtu74347cn3i",$user="vjupnqjdgkmakv",$passwd="02cc0fbb5e169cbf2410ac807d175097354ba81ab7e29cf03968841e62ce1991"){
        $this->ConexionDB = pg_connect("host=$host dbname=$nameDB port=$port user=$user password=$passwd") or die("Error de conexion Equipo_Jezoar ".pg_last_error());
    }


    /**
     * Metodo que manda a Ejecutar una Consulta
     */
    public function execute($query) {
        
            $result = pg_query($this->ConexionDB,$query);
            if (!$result) {
                return null;
            }else{
                return $result;
            }
    }

    public function getArrayAssoc($query) {
        $result = pg_query($this->ConexionDB,$query);
        if (!$result) {
            die("error en la consulta");
        }else{
            $arr["data"] = [];
            while ($data = pg_fetch_assoc($result)) {
                $arr["data"][]=$data;
            }
        }
        return $arr;
    }

    public function getArray($query) {
        $result = pg_query($this->ConexionDB,$query);
        if (!$result) {
            die("error en la consulta");
        }else{
            $arr = pg_fetch_all($result);
        }
        return $arr;
    }

    public function getArrayNum($query) {
        $result = pg_query($this->ConexionDB,$query);
        if (!$result) {
            die("error en la consulta");
        }else{
            $row=[];
            $arr=array();
            $numberRows=pg_num_rows($result);
            $numberCols=pg_num_fields($result);
            for($i=0;$i<$numberRows;$i++){
                $row = pg_fetch_array($result,$i,PGSQL_ASSOC);
                for($j=0;$j<$numberCols;$j++){
                    $arr[$i][$j]=$row[$j];
                }
            }
        }
        return $arr;
    }
}

   /*$conexion = new Conexion('localhost','5432','jezoar','jezoar','123456');
    if (! $conexion) {
        die("Error ".pg_last_error());
    }else{
    
    }

    $arr=$conexion->getArray("select* from personal;");
    echo json_encode($arr),"\n";
    */
