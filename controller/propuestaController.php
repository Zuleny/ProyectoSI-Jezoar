<?php
    if (isset($_POST['Almacen']) && isset($_POST['Dir'])) {
        $nombre=$_POST['Almacen'];
        $Direccion=$_POST['Dir'];
        echo $nombre;
        echo $Direccion;
        require_once '../model/AlmacenModel.php';
        $almacen = new Almacen(0,$nombre,$Direccion);
        $almacen->codAlmacen = $almacen->getCantidadAlmacen()+1;
        echo $almacen->codAlmacen;
        if (!$almacen->insertarAlmacen()) {
            echo "Error No se pudo registrar al nuevo almacen
                    vuelva a interntarlo";
        }
        header('Location: ../view/gestionDeAlmacen/gestionAlmacen.php');
    }    
    
?>