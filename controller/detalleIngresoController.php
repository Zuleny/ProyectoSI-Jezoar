<?php 
   //inserttar
   if(isset($_POST["nombreInsumo"])&&
    isset($_POST["cantidadInsumo"])&& isset($_POST["precioUnitario"])){
      $nombreInsumo=$_POST["nombreInsumo"];
      $cantidadInsumo=$_POST["cantidadInsumo"];
      $precioUnitario=$_POST["precioUnitario"];
      require "../model/NotaIngresoModel.php";
      $notaIngreso=new NotaIngreso("","","");
      $b=$notaIngreso->insertarDetalleIngreso($nombreInsumo,$cantidadInsumo,$precioUnitario,$nroIngreso);
      if(!$b){
          echo "Detalle No Registrado";
      }
      header('Location: ../view/gestionDeNotaDeIngreso/gestionDetalleIngreso.php');
   }

   function getListaInsumos(){
      require "../../model/NotaIngresoModel.php";
      $notaIngreso1=new NotaIngreso("","","");
      $result2=$notaIngreso1->getListaInsumos();
      $lista="";
      $nroFilas=pg_num_rows($result2);
      for ($nroTupla=0; $nroTupla < $nroFilas; $nroTupla++){ 
            $lista.='<option>'.pg_result($result2,$nroTupla,0).'</option>';
      }
      return $lista;
   }




?>