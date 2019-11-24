   <?php
   require "../../model/ProveedorModel.php";

   $proveedor=new Proveedor("","","","","","");
   $result=[];
   $result=$proveedor->getListaProveedor();

   echo json_encode($result)."\n";
   ?>