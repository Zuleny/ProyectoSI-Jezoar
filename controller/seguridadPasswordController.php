<?php
if (isset($_POST['nombrePersonalOvidado']) && isset($_POST['cargoPersonalOvidado'])) {
    if ($_POST['nombrePersonalOvidado']!="" && $_POST['cargoPersonalOvidado']!="") {
        require '../model/personalModel.php';
        $personalSinPasswd = new Personal();
        if ($personalSinPasswd->existePersonalUsuario(strtolower($_POST['nombrePersonalOvidado']), strtolower($_POST['cargoPersonalOvidado']))) {
            $resultado = $personalSinPasswd->getQuestionPersonalUsuario(strtolower($_POST['nombrePersonalOvidado']));
            $nombre = $_POST['nombrePersonalOvidado'];
            header("Location: http://localhost/ProyectoSI-Jezoar/view/gestionDeUsuario/verificacionDeUsuarioLogin.php?question=$resultado&nombpersonal=$nombre");
        }else{
            header('Location: ../view/Exceptions/errorExterno.php');
        }
    }else{
        header('Location: ../view/Exceptions/errorExterno.php');
    }
}else if (isset($_GET['respuestaPersonalOvidado']) && isset($_GET['nombre'])) {
    if ($_GET['nombre']!="" && $_GET['respuestaPersonalOvidado']!="") {
        require '../model/UsuarioModel.php';
        $user = new Usuario();
        if ($user->verificarUsuarioSeguridad(strtolower($_GET['nombre']), strtolower($_GET['respuestaPersonalOvidado']))) {
            $user = strtolower($_GET['nombre']);
            header("Location: http://localhost/ProyectoSI-Jezoar/view/gestionDeUsuario/nuevoPassword.php?nombrePersonal=$user");
        }else{
            die("Respuesta incorrecta. Estamos llamando a la policia, corre!!");
        }
    }else{
        header('Location: ../view/Exceptions/errorExterno.php');
    }
}else if ( isset($_POST['newPassword']) && isset($_POST['retypePassword']) && isset($_POST['nombrPersonal']) && isset($_POST['email']) ) {
    if ( $_POST['newPassword']!="" && $_POST['retypePassword']!="" && $_POST['nombrPersonal']!="" && $_POST['email']!="" ) {
        require '../model/UsuarioModel.php';
        $user = new Usuario();
        if (sha1($_POST['newPassword'])===sha1($_POST['retypePassword'])) {
            if ($user->updatePasswordUser($_POST['nombrPersonal'], $_POST['newPassword'])) {
                header('Location: ../view/login.php');
            }else{
                die("Escriba bien los datos por favor....");
            }
        }else{
            die("error, la contraseña no coincide...");
        }
    }else{
        header('Location: ../view/Exceptions/errorExterno.php');
    }
}


?>