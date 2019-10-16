<?php

if (isset($_POST['fecha']) && isset($_POST['estadoP']) && isset($_POST['nombreCliente']) && isset($_POST['precio']) && isset($_POST['dias']) && isset($_POST['Servicio']) && isset($_POST['estadoM'])) {
    $fecha = $_POST['fecha'];
    $estado = $_POST['estadoP'];
    $nombreCliente = $_POST['nombreCliente'];
    $precioTotal = $_POST['precio'];
    $cantDias = $_POST['dias'];
    $tipoServicio = $_POST['Servicio'];
    $material = $_POST['estadoM'];
    require "../model/CotizacionModel.php";
    $user = new Cotizacion(0,$fecha,$estado,$precioTotal,$nombreCliente,$cantDias,$tipoServicio,$material);
    $user->codCotizacion = $user->getCantidadCotizaciones()+1;
    if (!$user->insertarCotizacion()) {
        echo "Error No se pudo registrar la nueva cotizacion
                vuelva a interntarlo";
    }
    header('Location: ../view/gestionDeCotizacion/gestionCotizacion.php');
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

function getListaDeCotizaciones(){
    $usuario1= new Cotizacion(0,"","","","","","","");
    $result=$usuario1->getListaCotizaciones();
    $nroFilas=pg_num_rows($result);
    $printer="";
    for ($tupla=0; $tupla <$nroFilas ; $tupla++) { 
        $printer.='<tr> <td>'.pg_result($result,$tupla,0).'</td>';
        $printer.=      '<td>'.pg_result($result,$tupla,1).'</td>';
        $printer.=      '<td>'.pg_result($result,$tupla,2).'</td>';
        $printer.=      '<td>'.pg_result($result,$tupla,3).'</td>';
        $printer.=      '<td>'.pg_result($result,$tupla,4).'</td>';
        $printer.=      '<td>'.pg_result($result,$tupla,5).'</td>';
        $printer.=      '<td>'.pg_result($result,$tupla,6).'</td>';
        $printer.=      '<td>'.pg_result($result,$tupla,7).'</td>';
        $printer.=      '<td> <div class="btn-group">
                                            <button type="button" class="btn btn-warning btn-sm" title="Actualizar">
                                                <i class="fa fa-fw fa-refresh"></i>
                                            </button>
                                            &nbsp
                                            <button type="button" class="btn bg-purple btn-sm" title="Editar">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                      </div>
                                 </td>
                          </tr>';
    }
    return $printer;
}

?>