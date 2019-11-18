   <?php
   require "../../model/productoModel.php";

   $producto=new Producto("","",0,"","");
   $result=[];
   $result=$producto->getListaDeProductos();

   echo json_encode($result)."\n";
   ?>