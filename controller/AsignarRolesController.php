<?php

function getListaUsuario(){
    require_once '../../model/UsuarioModel.php';
    $usuario =new Usuario(-1,"","","","","");
    return $usuario->getListaUsuarios();
}

function getListaRols(){
    require_once '../../model/UsuarioModel.php';
    $usuario =new Usuario(-1,"","","","","");
    return $usuario->getListaroles();
}

if (isset($_POST['nombrePersonal'])) {
    if (isset($_POST['rolesUsuario'])) {
        if ($_POST['nombrePersonal']!="" && count($_POST["rolesUsuario"])>0) {
            require_once '../model/UsuarioModel.php';
            $usuario =new Usuario();
            $nombreUsuario = $_POST['nombrePersonal'];
            $arrayRoles = $_POST["rolesUsuario"];
            $codUsuario = $usuario->getCodUsuario($nombreUsuario);
            foreach ($arrayRoles as $rol) {
                if (! $usuario->asignarRolAUsuario($codUsuario,$rol)) {
                    $errorMessage = "<b>Error en la asignacion de Roles a Usuario, el servicio muere</b>";
                    header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
                }
            }
            session_start();
            $nameUser = $_SESSION['user'];
            $codigo = $_POST['codUsuarioEditar'];
            $fechaPhp = getDate();
            $fecha_hora = $fechaPhp['year'].'-'.$fechaPhp['mon'].'-'.$fechaPhp['mday'].' '.$fechaPhp['hours'].':'.$fechaPhp['minutes'].':'.$fechaPhp['seconds'];
            $usuario->getConexion()->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                        VALUES ('$nameUser', 'Asignacion de nuevos roles a usuario. $nombreUsuario.', '$fecha_hora');");
            header('Location: ../view/gestionDeUsuario/verRolesUsuario.php');
        }else{
            $errorMessage = "<b>Datos inconsistente, Advertencia, reporte con los de mantenimiento, Gracias.</b>";
            header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
        }
    }else{
        $errorMessage = "<b>Seleccione algun Rol porfavor, no puedo registrar datos vacios :'c  .</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);  
    }
}

/*

*/

function getListaRolesUsuario(){
    require_once '../../model/UsuarioModel.php';
    $usuario =new Usuario(-1,"","","","","");
    return $usuario->getListaUsuarioYSusRoles();
}
?>