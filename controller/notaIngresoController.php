<?php
if(isset($_POST["nombreRecibe"]) &&
isset($_POST["listaProveedor"]) && isset($_POST["listaAlmacen"])){
    $nombreRecibe=$_POST["nombreRecibe"];
    $nombreProveedor=$_POST["listaProveedor"];
    $nombreAlmacen=$_POST["listaAlmacen"];
    require "../model/NotaIngresoModel.php";
    $notaIngreso=new NotaIngreso($nombreRecibe,$nombreAlmacen,$nombreProveedor);
    $b=$notaIngreso->insertarNotaIngreso();
    if($b){
        echo '<script language="javascript">alert("Nota De Ingreso Registrada Exitosamente");</script>';
    }else{
        echo '<script language="javascript">alert("Error al Insertar la Nota De Ingreso");</script>';
    }
    header('Location: ../view/gestionDeNotaDeIngreso/gestionDetalleIngreso.php');
}

function getListaProveedor(){
    require "../../model/NotaIngresoModel.php";
    $notaIngreso2=new NotaIngreso("","","");
    $result2=$notaIngreso2->getListaProveedor();
    $rows=pg_num_rows($result2);
    $printer="";
    for($i=0;$i<$rows;$i++){
       $printer.='<option>'.pg_result($result2,$i,0).'</option>'; 
    }
    return $printer;
}

function getListaAlmacen(){
    
    $notaIngreso1=new NotaIngreso("","","");
    $result1=$notaIngreso1->getListaAlmacen();
    $rows=pg_num_rows($result1);
    $printer="";
    for($i=0;$i<$rows;$i++){
       $printer.='<option>'.pg_result($result1,$i,0).'</option>'; 
    }
    return $printer;
}

function getListaNotasIngreso(){ 
    $notaIngreso1=new NotaIngreso("","","");
    $result2=$notaIngreso1->getListaNotasIngresos();
    $rows=pg_num_rows($result2);
    $printer="";
    for($tupla=0;$tupla<$rows;$tupla++){
        $printer.='<tr> <td >'.pg_result($result2,$tupla,0).'</td>';
        $printer.='<td >'.pg_result($result2,$tupla,1).'</td>';
        $printer.='<td >'.pg_result($result2,$tupla,2).'</td>';
       $printer.= '<td> <div class="btn-group">                                               
            <button type="button" class="btn bg-purple btn-xs" data-toggle="modal" data-target="#modal-default "title="Editar">
                <i class="fa fa-edit"></i>
            </button>
        </div>
        </td>
        </tr>';
    }
    return $printer;
}

?>