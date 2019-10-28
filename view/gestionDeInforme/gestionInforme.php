<<<<<<< HEAD
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
                            <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                        </div>s
=======
<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
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
                    <h3 class="box-title">Detalles de una obra terminada</h3>
                    <div class="box-tools pull-right">
                            <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a
>>>>>>> cc71b7f84442df0cbad9d23a425e3e1ca258823a
                    </div>
                   <!-- Inicia tu codigo aqui -->                    
                    <form role="form" action="../../controller/clienteController.php" method="post" >
                        <!--  Lugar de butons y label y textbox  -->

                        <div class="box-body">
                            <div class="col-lg-5">
                                <label>Nombre de cliente</label>
                                <div class="input-group margin-bottom-sm"> 
<<<<<<< HEAD
                                    <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name = "nombre_cliente" >
=======
                                    <span class="input-group-addon"><i class="fa fa-archive fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name = "codigo_informe" placeholder="Solo numero">
>>>>>>> cc71b7f84442df0cbad9d23a425e3e1ca258823a
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
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-4">
                                <label>Correo electronico</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name ="correo_cliente"class="form-control" >
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label>Nit / C.I.</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-id-card-o fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control"name ="nit_cliente" placeholder="CI, solo si es persona">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label>Telefono del cliente(2)</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name = "telefono2_cliente" class="form-control">
                                </div>
                            </div>    

                        </div>

                        <div class="box-body">
                            <div class="col-lg-7">
                                <label>Direccion</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name="direccion_cliente" class="form-control" >
                                </div>
                            </div>                         
                            
                        </div>

                        <div class="box-body">
                            <div class="col-lg-2">  
                            <label>Tipo de cliente:</label>
                            <br>
                                <p><input type="radio" name="tipo" value="P">Persona</p>
                                <p><input type="radio" name="tipo" value="E">Empresa</p>
                            </div>
                        </div>                
                        <div class="box-body">   
                            <div class="col-lg-2" >                                
                                <button type="submit" name ="agregar_cliente" class="btn btn-block btn-primary" title="Agregar Servicio">Agregar cliente <i class="fa fa-fw fa-user-plus"></i></button>
                            </div>
                        </div>
                    </div>  
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">Clientes de la Empresa Jezoar</h3>
                            </div>
                            
                        </div>
                    </form>
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