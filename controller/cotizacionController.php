<?php

if (isset($_POST['fecha']) && isset($_POST['estadoP']) && isset($_POST['nombreCliente']) && isset($_POST['precio']) && 
    isset($_POST['dias']) && isset($_POST['Servicio']) && isset($_POST['estadoM'])) {
    if ($_POST['fecha']!="" && $_POST['estadoP']!="" && $_POST['nombreCliente']!="" 
            && $_POST['precio']!="" && $_POST['dias']!="" && $_POST['Servicio']!="" && $_POST['estadoM']!="") {
        session_start();
        $fecha = $_POST['fecha'];
        $estado = $_POST['estadoP'];
        $nombreCliente = $_POST['nombreCliente'];
        $precioTotal = $_POST['precio'];
        $cantDias = $_POST['dias'];
        $tipoServicio = $_POST['Servicio'];
        $material = $_POST['estadoM'];
        require "../model/CotizacionModel.php";
        $user = new Cotizacion(0,$fecha,$estado,$precioTotal,$nombreCliente,$cantDias,$tipoServicio,$material);
        $user->codCotizacion = $user->getNewCodCotizacion();
        if (!$user->insertarCotizacion()) {
            header('Location: ../view/Exceptions/exceptions.php');
        }else{
            $fecha_hora = date('j-n-Y G:i:s', time());
            $username = $_SESSION['user'];
            $user->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Registro de Cotizacion nro. $user->codCotizacion', '$fecha_hora');");
            header('Location: ../view/gestionDeCotizacion/gestionCotizacion.php');
        }
    }else{
        header('Location: ../view/Exceptions/exceptions.php');
    }
}else if ( isset($_GET['idServicio']) && isset($_GET['areaTrabajo']) && isset($_GET['cantPersonas']) && isset($_GET['precioUnitario'])) {
    require '../model/CotizacionModel.php';
    session_start();
    $listaDeAreasTrabajo = array();
    $listaDeCantidadPersonas = array();
    $listaDePreciosUnitarios = array();
    $cantidad = 0;
    $length = count($_GET['areaTrabajo']);
    for ($dato=0; $dato < $length; $dato++) { 
        if ($_GET['areaTrabajo'][$dato]!="" && $_GET['cantPersonas'][$dato]!="" && $_GET['precioUnitario'][$dato]!="" ){
            $listaDeAreasTrabajo[$cantidad] = $_GET['areaTrabajo'][$dato];
            $listaDeCantidadPersonas[$cantidad] = $_GET['cantPersonas'][$dato];
            $listaDePreciosUnitarios[$cantidad] = $_GET['precioUnitario'][$dato];
            $cantidad++;
        }
    }
    if ( count($_GET['idServicio']) == count($listaDeAreasTrabajo) && 
         count($listaDeAreasTrabajo) == count($listaDeCantidadPersonas) && 
         count($listaDeCantidadPersonas) == count($listaDePreciosUnitarios) ) {
        $cotizacion = new Cotizacion();
        if ($cotizacion->asignarServicios($_GET['codigo'], $_GET['idServicio'], $listaDeAreasTrabajo, $listaDeCantidadPersonas, $listaDePreciosUnitarios)) {
            $codigo = $_GET['codigo'];
            $fecha_hora = date('j-n-Y G:i:s', time());
            $username = $_SESSION['user'];
            $nroCotizacion = $_GET['codigo'];
            $cotizacion->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Asignando servicios a cotizacion nro. $nroCotizacion', '$fecha_hora');");
            header("Location: http://localhost/ProyectoSI-Jezoar/view/gestionDeCotizacion/listaServiciosDeUnaCotizacion.php?codigo=$codigo");
        }else{
            header('Location: ../view/Exceptions/exceptions.php');    
        }
    }else{
        header('Location: ../view/Exceptions/exceptions.php');
    }
}else if (isset($_POST['fechaEditar']) && 
            isset($_POST['nombreClienteEditar']) && 
                isset($_POST['diasEditar']) && 
                    isset($_POST['tipoServicioEditar']) && 
                        isset($_POST['estadoMEditar']) && 
                            isset($_POST['estadoPEditar']) && isset($_POST['codigo']) ) {
    if ( $_POST['fechaEditar']!="" && $_POST['nombreClienteEditar']!="" && $_POST['diasEditar']!="" && $_POST['tipoServicioEditar']!="" && $_POST['estadoMEditar']!="" && $_POST['estadoPEditar']!="" ) {
        require '../model/CotizacionModel.php';
        session_start();
        $cotizacion = new Cotizacion();
        if ($cotizacion->updateCotizacion($_POST['codigo'], $_POST['fechaEditar'], $_POST['nombreClienteEditar'], $_POST['diasEditar'], $_POST['tipoServicioEditar'], $_POST['estadoMEditar'], $_POST['estadoPEditar'])) {
            $fecha_hora = date('j-n-Y G:i:s', time());
            $username = $_SESSION['user'];
            $nroCotizacion = $_POST['codigo'];
            $cotizacion->conexion->execute("INSERT INTO bitacora(nombre_usuario, descripcion, fecha_hora) 
                                    VALUES ('$username', 'Modificando cotizacion nro. $nroCotizacion', '$fecha_hora');");
            header('Location: ../view/gestionDeCotizacion/gestionCotizacion.php');
        }else{
            header('Location: ../view/Exceptions/exceptions.php');    
        }
    } else {
        header('Location: ../view/Exceptions/exceptions.php');    
    }
}else if (isset($_GET['codigoCotizacionEliminar'])) {
    echo $_GET['codigoCotizacionEliminar'];
    require '../model/CotizacionModel.php';
    $cotizacion = new Cotizacion();
    if ($cotizacion->deleteCotizacion($_GET['codigoCotizacionEliminar'])) {
        header('Location: ../view/gestionDeCotizacion/gestionCotizacion.php');
    }else{
        header('Location: ../view/Exceptions/exceptions.php');
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
            $printer.=  '<td><span class="label label-warning">Espera</span></td>';
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
        $printer.=      '<td> <div class="btn-group">
                                <a href="asignarServicioCotizacion.php?codigo='.pg_result($result,$tupla,0).'">
                                    <button type="button" class="btn bg-blue btn-xs btn-sm" title="Asignar Servicios">
                                        <i class="fa fa-fw fa-cubes"></i>
                                    </button>
                                </a>
                                <a href ="editarCotizacion.php?codigo='.pg_result($result,$tupla,0).'">
                                    <button type="button" class="btn bg-purple btn-xs btn-sm" title="Editar">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                </a>
                                <a href="listaServiciosDeUnaCotizacion.php?codigo='.pg_result($result,$tupla,0).'">
                                    <button type="button" class="btn bg-aqua btn-xs btn-sm" title="Ver Lista de Sericios">
                                        <i class="fa fa-fw fa-folder-o"></i>
                                    </button>
                                </a>
                                <a href="../gestionDeInforme/gestionInforme.php">
                                    <button type="button" class="btn bg-green btn-xs btn-sm" title="Gestionar Informe">
                                        <i class="fa fa-fw fa-file-text-o"></i>
                                    </button>
                                </a>
                                <a href="../gestionDeContrato/gestionContrato.php">
                                    <button type="button" style="border-radius: 3px;" class="btn bg-orange btn-flat btn-sm btn-xs" title="Gestionar Contrato">
                                        <i class="fa fa-fw fa-list-alt"></i>
                                    </button>
                                </a>
                                <a href="../../controller/cotizacionController.php?codigoCotizacionEliminar='.pg_result($result,$tupla,0).'">
                                    <button type="button" class="btn bg-red btn-xs btn-sm" title="Ver Lista de Sericios">
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
    require '../../model/CotizacionModel.php';
    $cotizacion = new Cotizacion();
    return $cotizacion->getDatosCotizacionEditar($codCotizacion);
}

?>
