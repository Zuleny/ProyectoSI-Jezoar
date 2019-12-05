<?php

if (isset($_POST['nombre_categor'])) {
    if ($_POST['nombre_categor']!="") {
        $nombreCategoria = $_POST['nombre_categor'];
        require "../model/CategoriaModel.php";
        $categoria = new Categoria(0,$nombreCategoria);
        $categoria->codCategoria=$categoria->getNewCodigoCategoria();
        if ($categoria->insertarCategoria()) {
            session_start();
            $hoy = getdate();
            $fecha_hora = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'].' '.$hoy['hours'].':'.$hoy['minutes'].':'.$hoy['seconds'];
            $name = $_SESSION['user'];
            $codidgo = $categoria->codCategoria;
            $nombre = $categoria->nombreCategoria;
            $categoria->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                                     VALUES ('$name','Registro de Categoria de Producto codigo: $codidgo y nombre $nombre.', '$fecha_hora');");
            header('Location: ../view/gestionDeCategoria/gestionCategoria.php');
        }else{
            $errorMessage = "<b>Problemas al registro de Categoria, Comuniquese con Mantenimiento.</b>";
            header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
        }
    }else{
        $errorMessage = "<b>Nombre de Categoria vacia, tenga mucho cuidado</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
    }
}else if (isset($_POST['nombreCategoria']) && isset($_POST['idCategoria'])) {
    if ($_POST['nombreCategoria']!="") {
        require '../model/CategoriaModel.php';
        $categoria = new Categoria();
        if ($categoria->updateCategoria($_POST['idCategoria'], $_POST['nombreCategoria'])) {
            session_start();
            $hoy = getdate();
            $fecha_hora = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'].' '.$hoy['hours'].':'.$hoy['minutes'].':'.$hoy['seconds'];
            $name = $_SESSION['user'];
            $codidgo = $_POST['idCategoria'];
            $nombre = $_POST['nombreCategoria'];
            $categoria->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                                     VALUES ('$name','Modificacion de Categoria de Producto codigo: $codidgo y nombre $nombre.', '$fecha_hora');");
            header('Location: ../view/gestionDeCategoria/gestionCategoria.php');
        }else{
            $errorMessage = "error en Modificacion de Categoria";
            header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
        }
    }else{
        $errorMessage = "Error al Registrar Categoria Sin Nombre";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
    }
}

function getListaCategoria() {
    require '../../model/CategoriaModel.php';
    $categoria=new Categoria();
    $result=$categoria->getListCategorias();
    $cantTuplas=pg_num_rows($result);
    $printer="";
    for ($Categoria=0; $Categoria < $cantTuplas ; $Categoria++) { 
        $printer=$printer.'<tr> <td>'.pg_result($result,$Categoria,0).'</td>';
        $printer=$printer.      '<td>'.pg_result($result,$Categoria,1).'</td>';
        $printer=$printer.      '<td> <div class="btn-group">
                                            &nbsp
                                            <a href="editarCategoria.php?nameCategory='.pg_result($result,$Categoria,0).'">
                                                <button type="button" class="btn bg-purple btn-sm btn-xs" title="Editar">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                      </div>
                                 </td>
                          </tr>';
    }
    return $printer;
}

function getNombreCategoria($id){
    require '../../model/CategoriaModel.php';
    $categoria = new Categoria();
    return $categoria->getNameCategoria($id);
}

?>