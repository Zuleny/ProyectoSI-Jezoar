<?php
function enviarEmail($emailToSend, $mensaje, $personal){
    require '../public/assets/PHPMailer/PHPMailer.php';
    require '../public/assets/PHPMailer/Exception.php';
    require '../public/assets/PHPMailer/SMTP.php';
    try {
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host='smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'ac8794572@gmail.com';
        $mail->Password = 'crespo@123';
        $mail->SMTPSecure = 'TLS';

        $mail->Port = 587;

        $mail->setFrom($emailToSend,'Sistema Jezoar');
        $mail->addAddress($emailToSend);

        $mail->isHTML(true);
        $mail->Subject = "Restauracion de Usuario jezoar";
        $mail->Body = "Codigo de verificación para la restauracion de usuario para:".$personal."<br>Codigo de verificacion <b>".$mensaje."</b>";
        if ($mail->send()){
            return true;
        }else{
            return false;
        }
    } catch (\Throwable $th) {
        return false;
    }
}

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
            header("Location: http://localhost/ProyectoSI-Jezoar/view/gestionDeUsuario/solicitarEmail.php?nombrePersonal=$user");
        }else{
            die("Respuesta incorrecta. Estamos llamando a la policia, corre!!");
        }
    }else{
        header('Location: ../view/Exceptions/errorExterno.php');
    }
}else if ( isset($_POST['newPassword']) && isset($_POST['retypePassword']) && isset($_POST['nombrPersonal'])) {
    if ( $_POST['newPassword']!="" && $_POST['retypePassword']!="" && $_POST['nombrPersonal']!="" && strlen($_POST['newPassword'])>5 && strlen($_POST['retypePassword'])>5) {
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
}else if (isset($_POST['email']) && $_POST['email']!="") {
    $mensaje = rand(000000,999999);
    if (enviarEmail($_POST['email'], $mensaje, $_POST['nombrPersonal'])) {
        $personal = $_POST['nombrPersonal'];
        session_start();
        $_SESSION['verifCode'] = $mensaje;
        header('Location: ../view/gestionDeUsuario/codigodeVerificacion.php?nombrePersonal='.$personal);
    }else{
        $emailUsuario = $_POST['email'];
        die("Hubo un error al enviar el email, error en el email $emailUsuario");
    }
}else if ( isset($_POST['codigoVerif']) ) {
    if ( $_POST['codigoVerif']>0 ) {
        session_start();
        if ($_POST['codigoVerif']==$_SESSION['verifCode']) {
            header("Location: http://localhost/ProyectoSI-Jezoar/view/gestionDeUsuario/nuevoPassword.php?nombrePersonal=".$_POST['nombrPersonal']);
        }else{
            echo "Codigo de Verificacion Ingresada: ".$_POST['codigoVerif'].'<br>';
            echo "Codigo de Verificacion enviada por correo: ".$_SESSION['verifCode'].'<br>';
            die("Error, el código de verificación no coincide");          
        }
    }else{
        header('Location: ../view/Exceptions/errorExterno.php');
    }
}


?>