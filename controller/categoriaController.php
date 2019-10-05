<?php
require "../model/CategoriaModel.php";

$codCategoria = $_POST['id_servicio'];
$nombreCategoria = $_POST['nombre_categor'];
if (isset($codCategoria) && isset($nombreCategoria)) {
    $categoria = new Categoria($codCategoria,$nombreCategoria);
    $result = $categoria->insertarCategoria();
    header('Location: ../view/gestionDeCategoria/gestionCategoria.php');
}

?>