<?php 
   //inserttar
   if(isset($_POST["nroIngreso"]) && isset($_POST["nombreInsumo"])&&
    isset($_POST["cantidadInsumo"])&& isset($_POST["precioUnitario"])){
      $nroIngreso=$_POST["nroIngreso"];
      $nombreInsumo=$_POST["nombreInsumo"];
      $cantidadInsumo=$_POST["cantidadInsumo"];
      $precioUnitario=$_POST["precioUnitario"];
      require "../model/NotaIngresoModel.php";
      $notaIngreso=new NotaIngreso();
      $b=$notaIngreso->insertarDetalleIngreso($nroIngreso,$nombreInsumo,$cantidadInsumo,$precioUnitario);
      if($b){
          session_start();
          $fecha_hora = date('j-n-Y G:i:s', time());
          $username = $_SESSION['user'];
          $notaIngreso->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Inserción del insumo $nombreInsumo en Nota de Devolución Nro. $nroIngreso', '$fecha_hora');");
          header("Location: ../view/gestionDeNotaDeIngreso/gestionDetalleIngreso.php?nro_ingreso=$nroIngreso");
      }else{
          $errorMessage = "<b>Error en proceso de Registro del detalle de Nota de Ingreso</b>";
          header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
      }

   }

   function getListaInsumos(){
      require "../../model/NotaIngresoModel.php";
      $notaIngreso1=new NotaIngreso();
      $result2=$notaIngreso1->getListaInsumos();
      $lista="";
      $nroFilas=pg_num_rows($result2);
      for ($nroTupla=0; $nroTupla < $nroFilas; $nroTupla++){ 
            $lista.='<option>'.pg_result($result2,$nroTupla,0).'</option>';
      }
      return $lista;
   }






?>