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
       $errorMessage = "<b>Error en proceso de Registro de personal</b>";
       header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
   }else{
       session_start();
       $fecha_hora = date('j-n-Y G:i:s', time());
       $username = $_SESSION['user'];
       $personal->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Registro de Personal Cod. $personal->idPersonal', '$fecha_hora');");
       header('Location: ../view/gestionDePersonal/gestionDePersonal.php');
   }

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