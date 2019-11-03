<?php

if (isset($_POST['nombreUser']) && isset($_POST['passwordUser']) && isset($_POST['nombrePersonal']) && isset($_POST['pregUsuario']) && isset($_POST['respUsuario'])) {
    if ($_POST['nombreUser']!="" && $_POST['passwordUser']!="" && $_POST['nombrePersonal']!="" && $_POST['pregUsuario']!="" && $_POST['respUsuario']!="") {
        $nombreUser = strtolower($_POST['nombreUser']);
        $passwordUser = $_POST['passwordUser'];
        $question = $_POST['pregUsuario'];
        $answer = $_POST['respUsuario'];
        $nombrePersonal = $_POST['nombrePersonal'];
        require "../model/UsuarioModel.php";
        $user = new Usuario(0,$nombreUser,$passwordUser,$question,$answer,$nombrePersonal);
        $user->codUsuario = $user->getCantidadUsuarios()+1;
        if ($user->insertarUsuario()) {
            header('Location: ../view/gestionDeUsuario/gestionUsuario.php');
        }else{
            header('Location: ../view/Exceptions/exceptions.php');
        }
    }else{
        header('Location: ../view/Exceptions/exceptions.php');
    }
}

function getListaPersonal(){
    require "../../model/UsuarioModel.php";
    $usuario= new Usuario(0,"","","","","");
    $result=$usuario->getListPersonal();
    $nroFilas=pg_num_rows($result);
    $printer="";
    for ($tupla=0; $tupla <$nroFilas ; $tupla++) { 
        $printer.='<option value="'.pg_result($result,$tupla,0).'">'.pg_result($result,$tupla,0).'</option>';
    }
    return $printer;
}

function getUsuarios(){
    require '../../model/UsuarioModel.php';
    $user = new Usuario();
    return $user->getListaUsuarios();
}

function getListaDeUsuarios(){
    $usuario1= new Usuario(0,"","","","","");
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

function getListaBitacora() {
    $user = new Usuario();
    return $user->getBitacoraUsers();
}

function getActividadesUsuarioBitacora($user) {
    require '../../model/UsuarioModel.php';
    $user = new Usuario();
    return $user->getBitacoraUser($user);
}


?>