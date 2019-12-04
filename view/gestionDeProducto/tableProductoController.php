<?php

    $codproducto = $_POST['codproducto'];
    $nombreinsumo = $_POST['nombreinsumo'];
    $descripcioninsumo = $_POST['descripcioninsumo'];
    $marcaproducto=$_POST['marcaproducto'];
    $categoriaproducto=$_POST['categoriaproducto'];
    $precioproducto=$_POST['precioproducto'];
    $opcion=$_POST['opcion'];

    require "../../model/productoModel.php";
    $producto=new Producto($nombreinsumo,$marcaproducto,$precioproducto,$descripcioninsumo,$categoriaproducto);
    $b=$producto->actualizarProducto($codproducto,$nombreinsumo,$descripcioninsumo,$marcaproducto,$categoriaproducto,$precioproducto);
    if(!$b) {
        echo json_encode("Error: No actualizado");
    }else{
        session_start();
        $fecha_hora = date('j-n-Y G:i:s', time());
        $username = $_SESSION['user'];
        $producto->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Actualizacion de Producto Cod. $codproducto', '$fecha_hora');");
        echo  json_encode("Actualizado Correctamente");
    }




?>
