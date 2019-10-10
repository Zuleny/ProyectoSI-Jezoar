<?php

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
       echo "Producto no insertado";
    }
    header('Location: ../view/gestionDeProducto/gestionProducto.php');
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

function getListaDeProductos(){
    
    $producto1=new Producto("","",0,"","");
    $result=$producto1->getListaDeProductos();
    $nroFilas=pg_num_rows($result);
    $printer="";
    if ($nroFilas>0) {
        for ($tupla=0; $tupla < $nroFilas; $tupla++){ 

            $printer.='<tr> <td>'.pg_result($result,$tupla,0).'</td>';
            $printer.='<td width="80">'.pg_result($result,$tupla,1).'</td>';
            $printer.='<td width="250">'.pg_result($result,$tupla,2).'</td>';
            $printer.='<td>'.pg_result($result,$tupla,3).'</td>';
            $printer.='<td>'.pg_result($result,$tupla,4).'</td>';
            $printer.='<td>'.pg_result($result,$tupla,5).'</td>';
            $printer.='<td> <div class="btn-group">                                               
            <button type="button" class="btn btn-warning btn-xs" title="Actualizar">
                <i class="fa fa-fw fa-refresh"></i>
            </button>
            <button type="button" class="btn bg-purple btn-xs" title="Editar">
                <i class="fa fa-edit"></i>
            </button></div></td> </tr>';
            
        }
    }
    return $printer;
}


?>