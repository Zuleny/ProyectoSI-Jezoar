<?php

if (isset($_POST['nombre_categor'])) {
    if ($_POST['nombre_categor']!="") {
        $nombreCategoria = $_POST['nombre_categor'];
        require "../model/CategoriaModel.php";
        $categoria = new Categoria(0,$nombreCategoria);
        $categoria->codCategoria=$categoria->getNewCodigoCategoria();
        $result = $categoria->insertarCategoria();
        header('Location: ../view/gestionDeCategoria/gestionCategoria.php');
    }else{
        header('Location: ../view/Exceptions/exceptions.php');
    }
}else if (isset($_POST['nombreCategoria']) && isset($_POST['idCategoria'])) {
    if ($_POST['nombreCategoria']!="") {
        require '../model/CategoriaModel.php';
        $categoria = new Categoria();
        if ($categoria->updateCategoria($_POST['idCategoria'], $_POST['nombreCategoria'])) {
            header('Location: ../view/gestionDeCategoria/gestionCategoria.php');
        }else{
            header('Location: ../view/Exceptions/exceptions.php');    
        }
    }else{
        header('Location: ../view/Exceptions/exceptions.php');
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
                                                <button type="button" class="btn bg-purple btn-sm" title="Editar">
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