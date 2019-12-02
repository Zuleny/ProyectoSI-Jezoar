<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
    //require_once '../../vendor/autoload.php';
?>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Informe
                <!-- <small>Blank example to the fixed layout</small> -->
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido de mi Vista -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Detalles de la culminacion de una obra terminada</h3>
                    <div class="box-tools pull-right">
                            <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                        </div>
                    </div>
                   <!-- Inicia tu codigo aqui -->                    
                    <form role="form" action="../../controller/informeController.php" method="post" enctype="multipart/form-data" >
                        <!--  Lugar de butons y label y textbox  -->

                        <div class="box-body">
                            <div class="col-lg-5">
                                <label>Nombre de cliente</label>
                                <select class="form-control" name="nombreCliente">
                                    <?php
                                    require "../../controller/informeController.php";
                                    $result=getClienteInforme();
                                    //\FB::log($result);
                                    echo $result;
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Imagen  del "ANTES"</label>
                                        <div class="input-group">
                                            <input type="hidden" name="image2" id="image22" >
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file btn-primary" >
                                                        Agregar imagen <input type="file" id="imgInp" name="imageInforme"/>
                                                    </span>
                                                </span>
                                        </div><br>
                                        <img id='img-upload' height="250px" width="250px" />
                                    </div>
                                 </div>
                            <!-- Segunda imagen-->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Imagen  del "DESPUES"</label>
                                    <div class="input-group">
                                        <input type="hidden" name="image3" id="imageAfter" >
                                        <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file btn-primary">
                                                        Agregar imagen <input type="file" id="imgInp2" name="imageInforme2"/>
                                                    </span>
                                                </span>
                                    </div><br>
                                    <img id='img-upload2' height="250px" width="250px" />
                                </div>
                            </div>

                        </div>

                        <div class="box-body">
                            <div class="col-lg-9">
                                <label>Descripcion del informe</label>
                                <textarea class="form-control" rows="5" name = "descripcion"></textarea>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="col-lg-2" >                                
                                <button type="submit" name ="agregar_pdf" class="btn btn-block btn-primary" title="Agregar Servicio">Crear informe <i class="fa fa-fw fa-file-pdf-o"></i></button>
                            </div>
                        </div>

                </form>
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">Informes presentados</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered table-hover" id="tabla1">
                                    <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Cliente</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $result = getListaInforme();
                                    $countTuplas=pg_num_rows($result);
                                    $printer='';
                                    $datosParaPDF = visualizarDatosParaPDF();
                                    for ($tupla=0; $tupla < $countTuplas; $tupla++) {
                                        $printer=$printer.'<tr> <td>'.pg_result($result,$tupla,0).'</td>';
                                        $printer=$printer.      '<td>'.pg_result($result,$tupla,1).'</td>';
                                        $printer=$printer.      '<td>'.pg_result($result,$tupla,2).'</td>';
                                        $printer=$printer.'     <td> <div class="btn-group">
                                        <a href="../../controller/informeController.php?cod='.pg_result($result,$tupla,0).'">
                                            <button type="button" class="btn bg-red btn-sm btn-xs" title="Eliminar">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </a>   
                                        <a href="../../view/gestionDeInforme/informe.php?cliente='.pg_result($datosParaPDF,$tupla,0).'&des='.pg_result($datosParaPDF,$tupla,1).'">
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
                            </div>
                            
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