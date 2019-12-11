<?php
require "../model/LoginModel.php";
define('ARRAY_OF_PACKAGES', 
    $arrayOfPackages = array(
        '<li class="treeview">
        <a href="#">
            <i class="fa fa-dashboard"></i> <span>Servicios de Limpieza</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">' ,
        '<li class="treeview">
        <a href="#">
            <i class="fa fa-fw fa-thumb-tack"></i>
            <span>Almacen</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">' ,
        '<li class="treeview">
        <a href="#">
            <i class="fa fa-fw fa-users"></i>
            <span>Usuario</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">' ,
        '<li class="treeview">
        <a href="#">
            <i class="fa fa-fw fa-shopping-cart"></i>
            <span>Insumos</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">'
    )
);

/**
 * *******************************************************************************************************************************************************
 ********************************************************************ATENCION***************************************************************************** 
 **********************************************************-----------CANDADO---------********************************************************************
 *********************************************************************************************************************************************************
 *  Si el candado esta abierto(TRUE), podran trabajar con el sistema de JEZOAR-HEROKU*********************************************************************
 *  Si el candado es cerrado(FALSO), podran trabajar con las direcciones de LOCALHOST*********************************************************************
 ************************************************************-----------QUEDAN ADVERTIDOS---------********************************************************
 */
$jezoarLocalhost = 'http://localhost/ProyectoSI-Jezoar/';
$jezoarHeroku = 'http://jezoar.herokuapp.com/';
if (false) {
    $addres = $jezoarHeroku;
}else{
    $addres = $jezoarLocalhost;
}
define('ARRAY_OF_PROCESS_LINKS', 
$arrayOfProcessLinks = array(
    1 => '<li><a  href="'.$addres.'view/gestionDePropuesta/gestionPropuesta.php"><i class="fa fa-circle-o"></i> Gestionar Propuestas</a></li>'                                ,
    2 => '<li><a  href="'.$addres.'view/gestionDeCotizacion/gestionCotizacion.php"><i class="fa fa-circle-o"></i> Gestionar Cotizacion</a></li>'                              ,
    3 => '<li><a  href="'.$addres.'view/gestionDeInforme/gestionInformePrincipal.php"><i class="fa fa-circle-o"></i> Gestionar Informes</a></li>'                                      ,
    4 => '<li><a  href="'.$addres.'view/gestionDeContrato/gestionContrato.php"><i class="fa fa-circle-o"></i> Administrar Contratos</a></li>'                                 ,
    5 => '<li><a  href="'.$addres.'view/gestionDeServicio/gestionServicio.php"><i class="fa fa-circle-o"></i> Gestionar Servicios</a></li>'                                   ,
    6 => '<li><a  href="'.$addres.'view/GestionDeCliente/gestionCliente.php"><i class="fa fa-circle-o"></i> Gestionar Clientes</a></li>'                                      ,
    7 => '<li><a  href="'.$addres.'view/gestionDeProveedor/gestionProveedor.php"><i class="fa fa-circle-o"></i> Gestionar Proveedores</a></li>'                               ,
    8 => '<li><a  href="'.$addres.'view/gestionDeAlmacen/gestionAlmacen.php"><i class="fa fa-circle-o"></i>Gestionar Almacen</a></li>'                                        ,
    9 => '<li><a  href="'.$addres.'view/gestionDeNotaDeIngreso/gestionNotaIngreso.php"><i class="fa fa-circle-o"></i>Gestionar Notas de Ingreso</a></li>'                     , 
    10 => '<li><a href="'.$addres.'view/GestionDeNotasEgreso/gestionarNotaDeEgreso.php"><i class="fa fa-circle-o"></i>Gestionar Notas de Egreso</a></li>'                     ,
    11 => '<li><a href="'.$addres.'view/GestionDeNotasDevolucion/gestionNotasDevolucion.php"><i class="fa fa-circle-o"></i>Gestionar Notas de Devolucion</a></li>'            ,    
    12 => '<li><a href="'.$addres.'view/gestionDeUsuario/gestionUsuario.php"><i class="fa fa-circle-o"></i>Gestionar  Usuarios</a></li>'                                      ,
    13 => '<li><a href="'.$addres.'view/GestionDeRol/gestionRol.php"><i class="fa fa-circle-o"></i>Gestionar  Rol</a></li>'                                                   ,
    14 => '<li><a href="'.$addres.'view/GestionDePermiso/gestionPermiso.php"><i class="fa fa-circle-o"></i>Gestionar Permiso</a></li>'                                        ,
    15 => '<li><a href="'.$addres.'view/gestionDeBitacora/administrarBitacora.php"><i class="fa fa-circle-o"></i>Administrar Bitacora</a></li>'                               ,
    16 => '<li><a href="'.$addres.'view/gestionDePersonal/gestionDePersonal.php"><i class="fa fa-circle-o"></i>Gestionar Personal</a></li>'                                   ,    
    17 => '<li><a href="'.$addres.'view/gestionDeProducto/gestionProducto.php"><i class="fa fa-circle-o"></i>Gestionar Productos</a></li>'                                    ,
    18 => '<li><a href="'.$addres.'view/gestionDeHerramienta/gestionHerramienta.php"><i class="fa fa-circle-o"></i>Gestionar Herramientas</a></li>'                           ,
    19 => '<li><a href="'.$addres.'view/gestionDeCategoria/gestionCategoria.php"><i class="fa fa-circle-o"></i>Categoria de Productos</a></li>'                               ,
    20 => '<li><a href="'.$addres.'view/GestionarResporteInvProducto/listaAlmacen.php"><i class="fa fa-circle-o"></i>Reporte de Productos</a></li>'                     ,
    21 => '<li><a href="'.$addres.'view/GestionarReporteInventarioHermamienta/ListaAlmacenes.php"><i class="fa fa-circle-o"></i>Reportes de Herramientas</a></li>'
)
);

function getListOfProcessInduvidual($listaPermisos, $valorInicial, $valorFinal){
    $array = array();
    $k = 0;
    for ($i=0; $i < count($listaPermisos); $i++) { 
        if ( $valorInicial <= $listaPermisos[$i] && $listaPermisos[$i] <= $valorFinal ) {
            $array[$k] = $listaPermisos[$i];
            $k++;
        }
    }
    return $array;
}

function getStringOfProcessIndividual($arrayProcessValidates){
    $string = "";
    for ($i=0; $i < count($arrayProcessValidates) ; $i++) { 
        $string .= ARRAY_OF_PROCESS_LINKS[$arrayProcessValidates[$i]];
    }
    return $string;
}

function getListProcess($listaPermisos){
    $stringOfProcessList = "";
    $arrayOfServices = getListOfProcessInduvidual($listaPermisos,1,6);
    if (count($arrayOfServices) > 0) {
        $stringOfProcessList .= ARRAY_OF_PACKAGES[0];
        $stringOfProcessList .= getStringOfProcessIndividual($arrayOfServices);
        $stringOfProcessList .= '</ul> </li>';
    }
    $arrayOfAlmacen = getListOfProcessInduvidual($listaPermisos,7,11);
    if (count($arrayOfAlmacen) > 0) {
        $stringOfProcessList .= ARRAY_OF_PACKAGES[1];
        $stringOfProcessList .= getStringOfProcessIndividual($arrayOfAlmacen);
        $stringOfProcessList .= '</ul> </li>';
    }
    $arrayOfUsuario = getListOfProcessInduvidual($listaPermisos,12,16);
    if (count($arrayOfUsuario) > 0) {
        $stringOfProcessList .= ARRAY_OF_PACKAGES[2];
        $stringOfProcessList .= getStringOfProcessIndividual($arrayOfUsuario);
        $stringOfProcessList .= '</ul> </li>';
    }
    $arrayOfInsumo = getListOfProcessInduvidual($listaPermisos,17,21);
    if (count($arrayOfInsumo) > 0) {
        $stringOfProcessList .= ARRAY_OF_PACKAGES[3];
        $stringOfProcessList .= getStringOfProcessIndividual($arrayOfInsumo);
        $stringOfProcessList .= '</ul> </li>';
    }
    return $stringOfProcessList;
}
echo 'INicias aqui <br>';
if ( isset($_GET['username']) && isset($_GET['password']) ) {
    echo 'login iniciando... <br>';
    $username = $_GET['username'];
    $password = $_GET['password'];
    echo $_GET['username'];
    echo '<br>';
    echo $_GET['password'];
    $login = new Login(strtolower($username),sha1($password));
    if($login->existeUser()){
        session_start();
        $_SESSION['user'] = strtolower($username);
        $_SESSION['cod_usuario'] = $login->getCodigoUsuario();
        $listaDePermisos = $login->getListaPermisos(strtolower($username));
        $fecha_hora = date('j-n-Y G:i:s', time());
        $username = strtolower($username);
        $login->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Inicio de Sesión de $username', '$fecha_hora');");
        $_SESSION['listPermisos'] = getListProcess($listaDePermisos);
        echo 'deberias iniciar <br>';
        header('Location: ../index.php');
    }else{
        echo 'no login rechazado<br>';
       header('Location: ../view/login.php');
    }
}else if ( isset($_GET['user']) ) {
    $username=$_GET['user'];
    $login=new Login($username,"");
    $fecha_hora = date('j-n-Y G:i:s', time());
    $login->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                VALUES ('$username', 'Cierre de Sesión de $username', '$fecha_hora');");
    header('Location: ../view/login.php');
}
echo 'lastima <br>';
?>