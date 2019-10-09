<?php

if (isset($_POST['nombre_categor'])) {
    $nombreCategoria = $_POST['nombre_categor'];
    require "../model/CategoriaModel.php";
    $categoria = new Categoria(0,$nombreCategoria);
    $categoria->codCategoria=$categoria->getNewCodigoCategoria();
    $result = $categoria->insertarCategoria();
    header('Location: ../view/gestionDeCategoria/gestionCategoria.php');
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
                                            <button type="button" class="btn btn-warning btn-sm" title="Actualizar">
                                                <i class="fa fa-fw fa-refresh"></i>
                                            </button>
                                            &nbsp
                                            <button type="button" class="btn bg-purple btn-sm" title="Editar">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                      </div>
                                 </td>
                          </tr>';
    }
    return $printer;
}

?>