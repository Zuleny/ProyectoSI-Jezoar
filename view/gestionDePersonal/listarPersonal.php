   <?php
   require "../../model/personalModel.php"; 

   $personal3=new Personal("","","");
   $result=[];
   $result=$personal3->getListaDePersonal();

   echo json_encode($result)."\n";
   ?>