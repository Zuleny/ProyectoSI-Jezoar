<?php
if(isset($_POST["insumos"])&& isset($_POST["nombreAlmacen"])&& isset($_POST["stocks"])){
    $insumos=$_POST["insumos"];
    $almacen=$_POST["nombreAlmacen"];
    $stocks1=$_POST["stocks"];
    $stocks=[];
    $j=0;
    for($i=0;$i<count($stocks1);$i++){
       if($stocks1[$i]!=""){
           $stocks[$j]=$stocks1[$i];
           $j=$j+1;
       }
    }
    $insumos1=implode($insumos);
    require "../model/productoModel.php";
    $producto =new Producto("","",0,"","");
    $b=$producto->insertarInsumo_Almacen($insumos,$almacen,$stocks);
    if($b){
        session_start();
        setlocale(LC_ALL, "es_ES");
        date_default_timezone_set('America/La_Paz');
        setlocale(LC_CTYPE, 'en_US');
        $fecha_hora = date('j-n-Y G:i:s',gmmktime());
        $username = $_SESSION['user'];
        $producto->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Asignacion de insumos Cod. : $insumos1 al almacen: $almacen', '$fecha_hora');");
        header('Location: ../view/gestionDeAlmacen/asignacionProductoAlmacen.php');
    }else{
        echo "Error al insertar Insumos";
        $errorMessage = "<b>Error en proceso de Asignacion de productos a almacen</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
    }

}

function getListaInsumo(){
    require "../../model/productoModel.php"; 
    $producto1 =new Producto("","",0,"","");
    $result=$producto1->getListaInsumo($_POST["nombreAlmacen"]);
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

function getListaAlmacenes(){
    $producto=new Producto("","",0,"","");
    $result=$producto->getListaAlmacenes();
    $lista="";
    $nroFilas=pg_num_rows($result);
    if ($nroFilas>0) {
        for ($nroTupla=0; $nroTupla < $nroFilas; $nroTupla++){ 
            $lista.='<div class="col-lg-6">
                       <option>'.pg_result($result,$nroTupla,0).'</option>
                     </div>';
        }
    }
    return $lista;
}


?>