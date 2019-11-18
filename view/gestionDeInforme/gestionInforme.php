<<<<<<< HEAD
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
=======
<!DOCTYPE html>
<html>
<head>
    <?php
        include "../../view/theme/AdminLTE/Additional/head.php";
    ?>
</head>
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php
            include "../../view/theme/AdminLTE/Additional/header.php";
            include "../../view/theme/AdminLTE/Additional/aside.php";
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
            <!-- contenido -->
            <section class="content">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Gestion de informe</h3>
                        <div class="box-tools pull-right">
>>>>>>> 6bc15bea6efcd371acfd2bf4f2be05de0ae1c771
                            <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                        </div>s
                    </div>
                   <!-- Inicia tu codigo aqui -->                    
                    <form role="form" action="../../controller/informeController.php" method="post" enctype="multipart/form-data" >
                        <!--  Lugar de butons y label y textbox  -->

                        <div class="box-body">
                            <div class="col-lg-5">
<<<<<<< HEAD
                                <label>Nombre de Cliente</label>
                                <select class="form-control" name="nombreCliente">
                                    <?php
                                    require "../../controller/informeController.php";
                                    require "../../model/informeModel.php";
                                    $result=getClienteInforme();
                                    echo $result;
                                    ?>
                                </select>
=======
                                <label>Nombre de cliente</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name = "nombre_cliente" >
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label>Fecha</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-calendar -o fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name = "fecha_actual" class="form-control" placeholder="Fecha actual">
                                </div>        
                            </div>
                            <div class="col-lg-2">
                                <label>Codigo presentacion</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-file fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name = "cod_presentacion"class="form-control">
                                </div>
>>>>>>> 6bc15bea6efcd371acfd2bf4f2be05de0ae1c771
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
                            <div class="col-lg-10">
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