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

require "../../model/personalModel.php";


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
       
    
     
     
    
    

?>