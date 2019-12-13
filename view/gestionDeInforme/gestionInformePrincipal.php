<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
    //require_once '../../vendor/autoload.php';
?>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Informes presentados
                <!-- <small>Blank example to the fixed layout</small> -->
            </h1>
        </section>        
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                    <div class="box-tools pull-right">
                            <a href="../../index.php" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                        </div>
                    </div>              
            
                        <!--  Lugar de butons y label y textbox  -->
                       
                            <div class="box-body">
                                <table class="table table-bordered table-hover" id="tabla1">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Cliente</th>
                                        <th>Fecha</th>
                                        <th>Codigo Presentacion</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require "../../controller/informeController.php";
                                    $result = getListaInforme();
                                    $countTuplas=pg_num_rows($result);
                                    $printer='';
                                    $datosParaPDF = visualizarDatosParaPDF();
                                    for ($tupla=0; $tupla < $countTuplas; $tupla++) {
                                        $printer=$printer.'<tr> <td>'.pg_result($result,$tupla,0).'</td>';
                                        $printer=$printer.      '<td>'.pg_result($result,$tupla,1).'</td>';
                                        $printer=$printer.      '<td>'.pg_result($result,$tupla,2).'</td>';
                                        $printer=$printer.      '<td>'.pg_result($result,$tupla,5).'</td>';
                                        $printer=$printer.'     <td> <div class="btn-group">
                                        <a href="../../controller/informeController.php?cod='.pg_result($result,$tupla,0).'">
                                            <button type="button" class="btn bg-red btn-sm btn-xs" title="Eliminar">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </a>   
                                        <a href="../../view/gestionDeInforme/informe.php?cod_ver='.pg_result($result,$tupla,0).'">
                                                                    <button type="button" class="btn bg-primary btn-sm btn-xs" title="Ver PDF">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>                                 
                                       
                                     </div>
                                </td>
                            </tr>';
                                    }
                                    echo $printer;
                                    ?>
                                    </tbody>
                                </table>
                                <h5> DESEA REGISTRAR UN INFORME?</h5>
                                 <a href="../../view/gestionDeCotizacion/gestionCotizacion.php" >Ir a Cotizacion</a>

                            </div>
                           
                        

                    <div>
                         <a href="https://www.facebook.com/Jezoar-228770924276961/" target="_blank"class="btn btn-block btn-social btn-facebook">
                            <i class="fa fa-facebook"></i>
                            Página de Facebook de Jezoar
                        </a>
                    </div>
                    <!-- Termina tu codigo aqui -->
                </div>
            </section>
        </div>
    </div>
    <?php
        include "../../view/theme/AdminLTE/Additional/scripts.php";
    ?>
</body>