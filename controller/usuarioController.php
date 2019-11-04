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
}else if ( isset($_POST['codUsuarioEditar']) && isset($_POST['nombreEditar']) && isset($_POST['passwordEditar']) && isset($_POST['nombrePEditar']) && isset($_POST['pregEditar']) && isset($_POST['respEditar']) ) {
    if ( $_POST['codUsuarioEditar']!="" && $_POST['nombreEditar']!="" && $_POST['passwordEditar']!="" && $_POST['nombrePEditar']!="" && $_POST['pregEditar']!="" && $_POST['respEditar']!="" ) {
        $nombreUser = strtolower($_POST['nombreEditar']);
        $passwordUser = sha1($_POST['passwordEditar']);
        $question = $_POST['pregEditar'];
        $answer = $_POST['respEditar'];
        $nombrePersonal = $_POST['nombrePEditar'];
        require "../model/UsuarioModel.php";
        $user = new Usuario();
        if ($user->updateUsuario($_POST['codUsuarioEditar'] ,$nombreUser, $passwordUser, $question, $answer, $nombrePersonal)) {
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
        $printer.=      '<td> 
                            <div class="btn-group">
                                <a href="editarUsuarios.php?codUser='.pg_result($result,$tupla,0).'">
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

function getListaBitacora() {
    $user = new Usuario();
    return $user->getBitacoraUsers();
}

function getActividadesUsuarioBitacora($usuario) {
    require '../../model/UsuarioModel.php';
    $user = new Usuario();
    return $user->getBitacoraUser($usuario);
}

function getDatosUsuarioEditar( $codUsuario ) {
    $user = new Usuario();
    return $user->getDatosUsuarioEditar($codUsuario);
}

?>