   <?php
   require "../../model/AlmacenModel.php";

   $almacen=new Almacen("","","");
   $result=[];
   $result=$almacen->getListaAlmacen();

   echo json_encode($result)."\n";
   ?>