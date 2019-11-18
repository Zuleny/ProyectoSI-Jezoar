   <?php
   require "../../model/NotaIngresoModel.php";

   $nro_ingreso=$_POST['nro_ingreso'];
   $notaIngreso=new NotaIngreso();
   $result=[];
   $result=$notaIngreso->getListaDetalle($nro_ingreso);
   echo json_encode($result)."\n";
   ?>