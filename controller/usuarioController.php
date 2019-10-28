<?php

if (isset($_POST['nombreUser']) && isset($_POST['passwordUser']) && isset($_POST['nombrePersonal'])) {
    $nombreUser = $_POST['nombreUser'];
    $passwordUser = $_POST['passwordUser'];
    $nombrePersonal = $_POST['nombrePersonal'];
    require "../model/UsuarioModel.php";
    $user = new Usuario(0,$nombreUser,$passwordUser,$nombrePersonal);
    $user->codUsuario = $user->getCantidadUsuarios()+1;
    if (!$user->insertarUsuario()) {
        echo "Error No se pudo registrar al nuevo usuario
                vuelva a interntarlo";
    }
    header('Location: ../view/gestionDeUsuario/gestionUsuario.php');
}

function getListaPersonal(){
    require "../../model/UsuarioModel.php";
    $usuario= new Usuario(0,"","","");
    $result=$usuario->getListPersonal();
    $nroFilas=pg_num_rows($result);
    $printer="";
    for ($tupla=0; $tupla <$nroFilas ; $tupla++) { 
        $printer.='<option value="'.pg_result($result,$tupla,0).'">'.pg_result($result,$tupla,0).'</option>';
    }
    return $printer;
}

function getListaDeUsuarios(){
    $usuario1= new Usuario(0,"","","");
    $result=$usuario1->getListaUsuarios();
    $nroFilas=pg_num_rows($result);
    $printer="";
    for ($tupla=0; $tupla <$nroFilas ; $tupla++) { 
        $printer.='<tr> <td>'.pg_result($result,$tupla,0).'</td>';
        $printer.=      '<td>'.pg_result($result,$tupla,1).'</td>';
        $printer.=      '<td>'.pg_result($result,$tupla,2).'</td>';
        $printer.=      '<td> <div class="btn-group">
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