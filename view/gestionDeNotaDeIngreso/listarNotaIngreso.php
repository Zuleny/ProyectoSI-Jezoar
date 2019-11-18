   <?php
   require "../../model/NotaIngresoModel.php";
   $notaIngreso=new NotaIngreso();
   $result=[];
   $result=$notaIngreso->getListaNotasIngresos();

   echo json_encode($result)."\n";
   ?>