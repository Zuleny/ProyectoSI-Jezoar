<?php
    try {
        $usuario = "postgres";
        $password = "216042021";
        $conn = new PDO('pgsql:host=localhost;port=5432;dbname=jezoar',$usuario,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "conexion exitosa";
        $query=$conn->prepare("insert into Bitacora(nombre_usuario,descripcion,fecha) values ('ruddyq','delete a la BD otra vez',now());");
        $query->execute();
        echo " consulta realizada con exito";
    } catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
    }
?>