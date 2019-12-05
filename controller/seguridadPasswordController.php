<?php

use PHPMailer\PHPMailer\PHPMailer;

function enviarEmail($emailToSend, $mensaje, $personal){
    require '../public/assets/PHPMailer/PHPMailer.php';
    require '../public/assets/PHPMailer/Exception.php';
    require '../public/assets/PHPMailer/SMTP.php';
    try {
        $mail = new PHPMailer(true);
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
        $menssageEmail = "<p>
                            Buenos dias integrante del equipo Jezoar: $personal, enviamos este mensaje de 
                            seguridad para la restauración de su usuario en el sistema Jezoar. Por ello necesitamos toda su atención,
                            <br>
                            Código de verificación para la restauracion de usuario para el personal: $personal
                            <br>
                            <h1>Codigo de verificacion <b>$mensaje</b>.<br></h1>
                            Que tengas un Buen dia, Te desea Jezoar!!!.
                          </p>";
        $mail->Body = $menssageEmail;
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
            $nombre = strtolower($_POST['nombrePersonalOvidado']);
            $cargoB = strtolower($_POST['cargoPersonalOvidado']);
            $hoy = getdate();
            $fecha_hora = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'].' '.$hoy['hours'].':'.$hoy['minutes'].':'.$hoy['seconds'];
            $name = 'Anónimo';
            $personalSinPasswd->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                                     VALUES ('$name','Solicitud de Restauracion de Usuario para $nombre con Cargo $cargoB.', '$fecha_hora');");
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
            $nombre = strtolower($_GET['nombre']);
            $hoy = getdate();
            $fecha_hora = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'].' '.$hoy['hours'].':'.$hoy['minutes'].':'.$hoy['seconds'];
            $name = 'Anónimo';
            $user->getConexion()->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                                     VALUES ('$name','Verificacion de Usuario(Respuesta de Seguridad) para $nombre', '$fecha_hora');");
            header("Location: ../view/gestionDeUsuario/solicitarEmail.php?nombrePersonal=$nombre");
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
                $hoy = getdate();
                $personal = $_POST['nombrPersonal'];
                $fecha_hora = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'].' '.$hoy['hours'].':'.$hoy['minutes'].':'.$hoy['seconds'];
                $name = 'Anónimo';
                $user->getConexion()->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                                            VALUES ('$name','Actualizacion de Password por Codigo de Seguridad para $personal.', '$fecha_hora');");

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
}else if ( isset($_POST['email']) ) {
    if ($_POST['email']=="") {
        header('Location: ../view/Exceptions/errorExterno.php');
    }
    session_start();
    $mensaje = dechex(rand(0000000,9999999));
    if (enviarEmail($_POST['email'], $mensaje, $_POST['nombrPersonal'])) {
        $personal = $_POST['nombrPersonal'];
        $_SESSION['verifCode'] = $mensaje;

        $emailB = $_POST['email'];

        require '../model/UsuarioModel.php';
        $user = new Usuario();
        $hoy = getdate();
        $fecha_hora = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'].' '.$hoy['hours'].':'.$hoy['minutes'].':'.$hoy['seconds'];
        $name = 'Anónimo';
        $user->getConexion()->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                                    VALUES ('$name','Envío de Código de Seguridad a: $emailB para el personal: $personal.', '$fecha_hora');");

        header('Location: ../view/gestionDeUsuario/codigodeVerificacion.php?nombrePersonal='.$personal);
    }else{
        $emailUsuario = $_POST['email'];
        die("Hubo un error al enviar el email, error en el email $emailUsuario");
    }
}else if ( isset($_POST['codigoVerif']) ) {
    if ( $_POST['codigoVerif']>0 ) {
        session_start();
        if ($_POST['codigoVerif']==$_SESSION['verifCode']) {

            require '../model/UsuarioModel.php';
            $user = new Usuario();
            $hoy = getdate();
            $personal = $_POST['nombrPersonal'];
            $fecha_hora = $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'].' '.$hoy['hours'].':'.$hoy['minutes'].':'.$hoy['seconds'];
            $name = 'Anónimo';
            $user->getConexion()->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                                        VALUES ('$name','Confirmacion de Código de Seguridad para el personal: $personal.', '$fecha_hora');");

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