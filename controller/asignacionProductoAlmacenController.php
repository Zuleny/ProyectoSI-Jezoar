<?php
if(isset($_POST["insumos"])&& isset($_POST["stocks"])){
    $insumos=$_POST["insumos"];
    //$almacen=$_POST["nombreAlmacen"];
    $stocks1=$_POST["stocks"];
    $stocks=[];
    $j=0;
    for($i=0;$i<count($stocks1);$i++){
       if($stocks1[$i]!=""){
           $stocks[$j]=$stocks1[$i];
           $j=$j+1;
       }
    }
    $insumos1=implode($insumos,", ");
    require "../model/productoModel.php";
    $cod_almacen=$_POST["cod_almacen"];
    $producto =new Producto("","",0,"","");
    $b=$producto->insertarInsumo_Almacen($insumos,$cod_almacen,$stocks);
    if($b){
        session_start();
        setlocale(LC_ALL, "es_ES");
        date_default_timezone_set('America/La_Paz');
        setlocale(LC_CTYPE, 'en_US');
        $fecha_hora = date('j-n-Y G:i:s',gmmktime());
        $username = $_SESSION['user'];
        $producto->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Asignacion de insumos con Codigo: $insumos1 al almacen: $cod_almacen', '$fecha_hora');");
        header("Location: ../view/gestionDeAlmacen/asignacionProductoAlmacen.php?cod_almacen=$cod_almacen");
    }else{
        echo "Error al insertar Insumos";
        $errorMessage = "<b>Error en proceso de Asignacion de productos a almacen</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
    }

}

function getListaInsumo(){
    require "../../model/productoModel.php";
    $cod_almacen=$_GET["cod_almacen"];
    $producto1 =new Producto("","",0,"","");
    $result=$producto1->getListaInsumo($cod_almacen);
    $nroFilas=pg_num_rows($result);
    $s="";
    for ($tupla=0; $tupla <$nroFilas ; $tupla++) { 
         $s.='<tr> 
              <td>'.pg_result($result,$tupla,0).'</<td>';
         $s.='<td>'.pg_result($result,$tupla,1).'</td>';
         if (pg_result($result,$tupla,2)=='P') {
            $s.=  '<td><span class="label label-danger">Producto</span></td>';
         }else{
            $s.=  '<td><span class="label label-primary">Herramienta</span></td>';
         }
         $s.='<td><div class="input-group">
                    <span class="input-group-addon">
                     <input type="checkbox" name=insumos[] value="'.pg_result($result,$tupla,0).'">
                    </span>
                    <input type="number" min="0" name="stocks[]" class="form-control">
              </div></td>
              </tr>';
    }
    return $s;
}



?>