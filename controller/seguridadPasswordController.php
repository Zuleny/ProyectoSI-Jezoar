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
    if ( $_POST['newPassword']!="" && $_POST['retypePassword']!="" && $_POST['nombrPersonal']!="" && strlen($_POST['newPassword'])>5 && strlen($_POST['retypePassword'])>5 && $_POST['email']!="") {
        require '../model/UsuarioModel.php';
        $user = new Usuario();
        if (sha1($_POST['newPassword'])===sha1($_POST['retypePassword'])) {
            if ($user->updatePasswordUser($_POST['nombrPersonal'], $_POST['newPassword'])) {
                require '../public/assets/PHPMailer/PHPMailer.php';
                require '../public/assets/PHPMailer/Exception.php';
                require '../public/assets/PHPMailer/SMTP.php';
                $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
                try{
                    $mail->SMTPDebug = 2;
                    $mail->isSMTP();
                    $mail->Host='smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'ac8794572@gmail.com';
                    $mail->Password = 'crespo@123';
                    $mail->SMTPSecure = 'TLS';
                    
                    $mail->Port = 587;

                    $mail->setFrom($_POST['email'],'Usuario Jezoar');
                    $mail->addAddress($_POST['email']);

                    $mail->isHTML(true);
                    $mail->Subject = "Reasignacion de Contraseña";
                    $mail->Body = "Nueva Contraseña: ".$_POST['retypePassword']." para el personal: ".$_POST['nombrPersonal'];
                    if ($mail->send()){
                        echo "Mensaje ha sido enviado";
                    }else{
                        echo "Mensaje no ha sido enviado".$mail->ErrorInfo;
                    }

                }catch (Exception $ex){
                    echo "Hubo un error al enviar el mesnaje ".$mail->ErrorInfo;
                }
                // header('Location: ../view/login.php');
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