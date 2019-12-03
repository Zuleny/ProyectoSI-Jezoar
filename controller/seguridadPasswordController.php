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
        $mail->Body = '<!DOCTYPE html>
        <html lang="es_ES">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        </head>
        <body>
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Código de Verificación Usuario Jezoar</h3>
                </div>
                <div class="box-group">
                    <img src="jezoar.herokuapp.com/documentation/jezoar.png" alt="MDN" style="vertical-align: baseline;">
                    <p>Buenos dias integrante del equipo Jezoar: '.$personal.', enviamos este mensaje de 
                        seguridad para la restauración de su usuario en el sistema Jezoar. Por ello necesitamos toda su atención,
                        <br>
                        Código de verificación para la restauracion de usuario para el personal: '.$personal.' 
                        <br>
                        Codigo de verificacion <b>'.$mensaje.'</b>.<br>
                        Que tengas un Buen dia, Te desea Jezoar!!!.
                    </p>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        </body>
        </html>';
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
            header("Location: ../view/gestionDeUsuario/verificacionDeUsuarioLogin.php?question=$resultado&nombpersonal=$nombre");
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
            header("Location: ../view/gestionDeUsuario/solicitarEmail.php?nombrePersonal=$user");
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
}else if (isset($_POST['email'])) {
    if ($_POST['email']=="") {
        header('Location: ../view/Exceptions/errorExterno.php');
    }
    $mensaje = dechex(rand(000000,9999999));
    if (enviarEmail($_POST['email'], $mensaje, $_POST['nombrPersonal'])) {
        session_start();
        $personal = $_POST['nombrPersonal'];
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
            header("Location: ../view/gestionDeUsuario/nuevoPassword.php?nombrePersonal=".$_POST['nombrPersonal']);
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