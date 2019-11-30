   <?php
   require "../../model/PropuestaModel.php";
   $propuesta=new Propuesta();
   $result=[];
   $result=$propuesta->getListaPropuesta();
   echo json_encode($result)."\n";
   ?>