<?php
session_start();
if(isset($_POST["txtNombreProd"]) &&
   isset($_POST["txtMarca"]) && isset($_POST["txtPrecioUnitario"]) &&
   isset($_POST["txtDescripcion"]) && isset($_POST["listaDeCategoria"])){
    
    $nombreProducto = $_POST["txtNombreProd"];
    $marca = $_POST["txtMarca"];
    $precioUnitario = $_POST["txtPrecioUnitario"];
    $descripcion=$_POST["txtDescripcion"];
    $listaDeCategoria=$_POST["listaDeCategoria"];   
    require "../model/productoModel.php";
    $producto = new Producto($nombreProducto,$marca,$precioUnitario,$descripcion,$listaDeCategoria);
    $b=$producto->insertarProducto();
    if(!$b){
        $errorMessage = "<b>Error en proceso de Registro de productos</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
    }else{
        $fecha_hora = date('j-n-Y G:i:s', time());
        $username = $_SESSION['user'];
        $producto->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Registro de Producto Cod. $producto->codigo', '$fecha_hora');");
        header('Location: ../view/gestionDeProducto/gestionProducto.php');
    }


}
function getListaDeCategoria(){
    require "../../model/productoModel.php"; 
    $producto=new Producto("","",0,"","");
    $result=$producto->getListaDeCategorias();
    $lista="";
    $nroFilas=pg_num_rows($result);
    if ($nroFilas>0) {
        for ($nroTupla=0; $nroTupla < $nroFilas; $nroTupla++){ 
            $lista.='<option>'.pg_result($result,$nroTupla,0).'</option>';
        }
    }
    return $lista;
}

function getListaAlmacenes(){
    require "../../model/productoModel.php"; 
    $producto=new Producto("","",0,"","");
    $result=$producto->getListaAlmacenes();
    $lista="";
    $nroFilas=pg_num_rows($result);
    if ($nroFilas>0) {
        for ($nroTupla=0; $nroTupla < $nroFilas; $nroTupla++){ 
            $lista.='<option value="'.pg_result($result,$nroTupla,0).'">'.pg_result($result,$nroTupla,0).'</option>';
        }
    }
    return $lista;
}



?>