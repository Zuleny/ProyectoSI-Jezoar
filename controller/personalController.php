<?php
   if(isset($_POST["txtNombrePersonal"]) && 
   isset($_POST["listaTipoDePersonal"]) &&
   isset($_POST["listaDeCargo"])){
   $nombrePersonal=strtolower($_POST["txtNombrePersonal"]);
   $tipoDePersonal=$_POST["listaTipoDePersonal"];
   $cargo=$_POST["listaDeCargo"];
   require "../model/personalModel.php";
   $personal=new Personal($nombrePersonal,$tipoDePersonal,$cargo);
   $b=$personal->insertarPersonal();
   if(!$b){
      echo "Personal no registrado";
   }
   header('Location: ../view/gestionDePersonal/gestionDePersonal.php');
}

function getListaTipoDePersonal(){
   require "../../model/personalModel.php"; 
   $personal1=new Personal("","","");
   $result=$personal1->getListaTipoDePersonal();
   $lista="";
   $nroFilas=pg_num_rows($result);
   if ($nroFilas>0) {
       for ($nroTupla=0; $nroTupla < $nroFilas; $nroTupla++){ 
           $lista.='<option>'.pg_result($result,$nroTupla,0).'</option>';
       }
   }
   return $lista;
}

function getListaCargoDePersonal(){
  
  $personal2=new Personal("","","");
  $result=$personal2->getListaCargoDePersonal();
  $nroFilas=pg_num_rows($result);
  $lista="";
  if ($nroFilas>0) {
    for ($tupla=0; $tupla < $nroFilas; $tupla++){ 

        $lista.='<option>'.pg_result($result,$tupla,0).'</option>';
    }
  }
 return $lista;
}
function getListaDePersonal(){
  
   $personal3=new Personal("","","");
   $result=$personal3->getListaDePersonal();
   $nroFilas=pg_num_rows($result);
   $printer="";
   if ($nroFilas>0) {
      for ($tupla=0; $tupla < $nroFilas; $tupla++){ 

           $printer.='<tr> <td >'.pg_result($result,$tupla,0).'</td>';
           $printer.='<td >'.pg_result($result,$tupla,1).'</td>';
           $printer.='<td >'.pg_result($result,$tupla,2).'</td>';
           $printer.='<td >'.pg_result($result,$tupla,3).'</td>';
           $printer.='<td > <div class="btn-group">                                               
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