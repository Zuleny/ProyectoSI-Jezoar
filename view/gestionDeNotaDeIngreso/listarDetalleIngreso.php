   <?php
   require "../../model/NotaIngresoModel.php";
   $notaIngreso=new NotaIngreso();
   $result=[];
   $result=$notaIngreso->getListaDetalle();

   echo json_encode($result)."\n";
   ?>