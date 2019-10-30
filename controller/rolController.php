<?php
function gestionRol() {
    require_once '../../model/RolModel.php';
    $printer="";
    $rol=new Rol(0,"prueba");
    $result=$rol->getListaRoles();
    $countTuplas=pg_num_rows($result);
    for ($tupla=0; $tupla < $countTuplas; $tupla++) { 
        $printer=$printer.'<tr> <td>'.pg_result($result,$tupla,0).'</td>';
        $printer=$printer.'<td>'.pg_result($result,$tupla,1).'</td>';
        $printer=$printer.'<td> <div class="btn-group">
                                <button type="button" class="btn bg-purple btn-sm" title="Editar">
                                    <i class="fa fa-edit"></i>
                                </button>
                                </div>
                        </td>
                    </tr>';
    }
    return $printer;
}

if (isset($_POST['descripcionRol'])) {
    if ($_POST['descripcionRol']!="") {
        require_once '../model/RolModel.php';
        $descripcion=$_POST['descripcionRol'];
        $rol=new Rol(0,$descripcion);
        $rol->codRol=$rol->getNewCodigoRol();
        $rol->insertNewRol();
        header('Location: ../view/GestionDeRol/gestionRol.php');
    }else{
        header('Location: ../view/Exceptions/exceptions.php');
    }
}

?>