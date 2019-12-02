<?php

if (  isset($_POST['registrar'])  ) {
    if ($_POST['fecha']!="" && $_POST['estadoP']!="" && $_POST['nombreCliente']!="" 
            && $_POST['precio']!="" && $_POST['dias']!="" && $_POST['servicio']!="" && $_POST['estadoM']!="" && $_POST['descripcionServicio']) {
        session_start();
        require "../model/CotizacionModel.php";
        $user = new Cotizacion(0,$_POST['fecha'], $_POST['estadoP'], $_POST['precio'], $_POST['nombreCliente'], $_POST['dias'], $_POST['servicio'], $_POST['estadoM'], $_POST['descripcionServicio']);
        $user->codCotizacion = $user->getNewCodCotizacion();
        if (!$user->insertarCotizacion()) {
            $errorMessage = "<b>Error en proceso de Registro de la cotizacion</b>";
            header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
        }else{
            $fecha_hora = date('j-n-Y G:i:s', time());
            $username = $_SESSION['user'];
            $user->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Registro de Cotizacion nro. $user->codCotizacion', '$fecha_hora');");
            header('Location: ../view/gestionDeCotizacion/gestionCotizacion.php');
        }
    }else{
        $errorMessage = "<b>Datos A Registrar son invalidos OJO</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
    }
}else if (  isset($_GET['asignarServicioCotizacion'])  ) {
    require '../model/CotizacionModel.php';
    session_start();
    if ( isset($_GET['servicio']) &&  isset($_GET['areaTrabajo']) && isset($_GET['cantPersonas']) && isset($_GET['precioUnitario'])) {
        if ( $_GET['servicio']!="" && $_GET['areaTrabajo']!="" && $_GET['cantPersonas']>0 && $_GET['precioUnitario']>-1 ) {
            $cotizacion = new Cotizacion();
            if (  $cotizacion->asignarServicios($_GET['codCotizacion'], $_GET['servicio'], $_GET['areaTrabajo'], $_GET['cantPersonas'], $_GET['precioUnitario'])  ) {
                $codigo = $_GET['codCotizacion'];
                $fechaPhp = getDate();
                $fecha_hora = $fechaPhp['year'].'-'.$fechaPhp['mon'].'-'.$fechaPhp['mday'].' '.$fechaPhp['hours'].':'.$fechaPhp['minutes'].':'.$fechaPhp['seconds'];
                $username = $_SESSION['user'];
                $cotizacion->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                        VALUES ('$username', 'Asignando servicios a cotizacion nro. $codigo', '$fecha_hora');");
                header("Location: ../view/gestionDeCotizacion/asignarServicioCotizacion.php?codigo=".$codigo);
            }else{
                $errorMessage = "<b>Problemas en la Asignacion de Servicios a Cotización.</b>";
                header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
            }
        }else{
            $errorMessage = "<b>Valores Invalidos en los campos de Asignacion de Servicios.</b>";
            header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
        }
    }else{
        header('Location: ../view/Exceptions/exceptions.php?');
    }
}else if (  isset($_POST['modificarCotizacion'])  ) {
    if ($_POST['fechaE']!="" && $_POST['estadoPE']!="" && $_POST['nombreClienteE']!="" 
            && $_POST['precioE']!="" && $_POST['diasE']!="" && $_POST['servicioE']!="" && $_POST['estadoME']!="" && $_POST['descripcionServicioE']) {
            require '../model/CotizacionModel.php';
            session_start();
            $cotizacion = new Cotizacion();
            if ($cotizacion->updateCotizacion($_POST['codigo'], $_POST['fechaE'], $_POST['nombreClienteE'], $_POST['diasE'], $_POST['servicioE'], $_POST['estadoME'], $_POST['estadoPE'], $_POST['descripcionServicioE'])) {
                $fecha_hora = date('j-n-Y G:i:s', time());
                $username = $_SESSION['user'];
                $nroCotizacion = $_POST['codigo'];
                $cotizacion->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                        VALUES ('$username', 'Modificando cotizacion nro. $nroCotizacion', '$fecha_hora');");
                header('Location: ../view/gestionDeCotizacion/gestionCotizacion.php');
            }else{
                $errorMessage = "<b>Error en la Modificacion de la Cotizacion.</b>";
                header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
            }
    } else {
        $errorMessage = "<b>Error en la Modificacion de la Cotizacion, Campos Invalidos.</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
    }
}else if (isset($_GET['codigoCotizacionEliminar'])) {
    echo $_GET['codigoCotizacionEliminar'];
    require '../model/CotizacionModel.php';
    $cotizacion = new Cotizacion();
    if ($cotizacion->deleteCotizacion($_GET['codigoCotizacionEliminar'])) {
        header('Location: ../view/gestionDeCotizacion/gestionCotizacion.php');
    }else{
        $errorMessage = "<b>Error en la Eliminacion de la Cotizacion.</b>";
        header('Location: ../view/Exceptions/exceptions.php?errorMessage='.$errorMessage);
    }
}

function getListaCliente(){
    require "../../model/CotizacionModel.php";
    $cotizacion= new Cotizacion(0,"","","","","","","");
    $result=$cotizacion->getListCliente();
    $nroFilas=pg_num_rows($result);
    $printer="";
    for ($tupla=0; $tupla <$nroFilas ; $tupla++) { 
        $printer.='<option value="'.pg_result($result,$tupla,0).'">'.pg_result($result,$tupla,0).'</option>';
    }
    return $printer;
}

function getListaClienteEditar(){
    $cotizacion= new Cotizacion(0,"","","","","","","");
    $result=$cotizacion->getListCliente();
    $nroFilas=pg_num_rows($result);
    $printer="";
    for ($tupla=0; $tupla <$nroFilas ; $tupla++) { 
        $printer.='<option value="'.pg_result($result,$tupla,0).'">'.pg_result($result,$tupla,0).'</option>';
    }
    return $printer;
}

function getListaDeCotizaciones(){
    $usuario1= new Cotizacion(0,"","","","","","","");
    $result=$usuario1->getListaCotizaciones();
    $nroFilas=pg_num_rows($result);
    $printer="";
    for ($tupla=0; $tupla <$nroFilas ; $tupla++) { 
        $printer.='<tr> <td>'.pg_result($result,$tupla,0).'</td>';
        $printer.=      '<td>'.date('d F Y',strtotime(pg_result($result,$tupla,1))).'</td>';
        if (pg_result($result,$tupla,2)=="Denegado") {
            $printer.=  '<td><span class="label label-danger">Denegado</span></td>';
        }else if (pg_result($result,$tupla,2)=="Aceptado") {
            $printer.=  '<td><span class="label label-success">Aceptado</span></td>';
        }else{
            $printer.=  '<td><span class="label label-warning">En Espera</span></td>';
        }
        $printer.=      '<td>'.pg_result($result,$tupla,3).' Bs. </td>';
        $printer.=      '<td>'.pg_result($result,$tupla,4).'</td>';
        $printer.=      '<td>'.pg_result($result,$tupla,5).'</td>';
        $printer.=      '<td>'.pg_result($result,$tupla,6).'</td>';
        if (pg_result($result,$tupla,7)==='S') {
            $printer.=  '<td><i class="fa fa-fw fa-check"></i></td>';
        }else{
            $printer.=  '<td><i class="fa fa-fw fa-remove"></i></td>';
        }
        $printer.=      '<td>'.pg_result($result,$tupla,8).'</td>';
        $printer.=      '<td> <div class="btn-group">
                                <a href="asignarServicioCotizacion.php?codigo='.pg_result($result,$tupla,0).'">
                                    <button type="button" class="btn bg-blue btn-xs btn-sm" title="Asignar Servicios">
                                        <i class="fa fa-fw fa-cubes"></i>
                                    </button>
                                </a>
                                <a href ="editarCotizacion.php?codigo='.pg_result($result,$tupla,0).'">
                                    <button type="button" class="btn bg-purple btn-xs btn-sm" title="Editar Cotización">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                                <a href="../gestionDeInforme/gestionInforme.php?codCotizacion='.pg_result($result,$tupla,0).'">
                                    <button type="button" class="btn bg-green btn-xs btn-sm" title="Gestionar Informe">
                                        <i class="fa fa-fw fa-file-text-o"></i>
                                    </button>
                                </a>
                                <a href="../gestionDeContrato/gestionContrato.php?cod_presetacionC='.pg_result($result,$tupla,0).'">
                                    <button type="button" style="border-radius: 3px;" class="btn bg-orange btn-flat btn-sm btn-xs" title="Registrar contrato">
                                        <i class="fa fa-fw fa-list-alt"></i>
                                    </button>
                                </a>
                                <a href="../../controller/cotizacionController.php?codigoCotizacionEliminar='.pg_result($result,$tupla,0).'">
                                    <button type="button" class="btn bg-red btn-xs btn-sm" title="Eliminar Cotizacion">
                                        <i class="fa fa-fw fa-trash-o"></i>
                                    </button>
                                </a>                                
                              </div>
                        </td>
                    </tr>';
    }
    return $printer;
}

function getListaAsignacionServicioCotizacion($codCotizacion){
    require '../../model/CotizacionModel.php';
    $cotizacion = new Cotizacion();
    return $cotizacion->getListaAsignacionServicio($codCotizacion);
}

function getDatos($codCotizacion){
    require '../../model/CotizacionModel.php';
    $cotizacion = new Cotizacion();
    return $cotizacion->getDatosDeCotizacion($codCotizacion);
}

function getListaServiciosCotizacion($codCotizacion){
    $cotizacion = new Cotizacion();
    return $cotizacion->getListaServiciosDeCotizacion($codCotizacion);
}

function getDatosEditarCotizacion($codCotizacion) {
    $cotizacion = new Cotizacion();
    return $cotizacion->getDatosCotizacionEditar($codCotizacion);
}

function getListaServiciosOfrecerCotizacion($codCotizacion){
    $cotizacion = new Cotizacion();
    return $cotizacion->getListaServiciosOfrecer($codCotizacion);
}

?>
