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
                    Contrato
                    <small>Detalles de un contrato </small>
                    <div class="box-tools pull-right">
                            <button type="button" class="btn btn-primary" title="Volver Pag. Atras">
                            <i class="fa fa-fw fa-arrow-circle-left"></i></button>
                        </div>
                </h1>
            </section>
            <!-- Fin de la cabecera -->
            <!-- contenido -->
            
            <section class="content">
            <div class="box">
                    <div class="box-header with-border">
                        <div class="row"> <br>
                            <div class="container">                         
                                <div class=" row bg-primary col-lg-2"><label for="codigo del informe" style="margin: 8px 7px 7px" >Codigo de contrato:</label ></div> 
                                <div class="col-sm-2">
                                <input type="text" class="form-control input-lg2"  id="text_codInforme" placeholder="Solo numérico" >
                                <br><br>
                            </div>                
                            <div class="container"  > 
                                <div class=" row bg-success col-lg-1"style="margin-left: 40px"><label for="codigo del informe"  style="margin: 8px 7px 7px" >Fecha:</label ></div> 
                                <div class="col-sm-3">
                                <input type="text" class="form-control input-md-2" id="text_codInforme" placeholder="Fecha actual">
                            </div>                             
                    </div>
                    <div class="row">
                        <div class="container"  > 
                        <div class=" row bg-success col-lg-2"><label for="codigo del informe" style="margin: 7px 7px 7px" >Fecha de inicio:</label ></div> 
                                    <div class="col-sm-3">
                                    <input type="text" class="form-control input-md-2" id="text_codInforme">
                        </div>
                        <div class="container"  > 
                                    <div class=" row bg-success col-lg-2"style="margin-left: 40px"><label for="codigo del informe"  style="margin: 7px 7px 7px" >Fecha final:</label ></div> 
                                    <div class="col-sm-3">
                                    <input type="text" class="form-control input-md-2" id="text_codInforme" ">
                        </div>
                    </div>
                    <div class="row"><br><br>
                        <div class="container">                         
                                <div class=" row bg-primary col-xs-3"><label for="codigo del informe" style="margin: 7px 7px 7px" >Codigo de presentación: </label ></div> 
                                <div class="col-sm-2">
                                <input type="text" class="form-control input-lg2"  id="text_codInforme" placeholder="Solo numérico" >
                                <br><br>
                        </div>
                        <div class="container" >                       
                                <div class=" row bg-primary col-lg-2"style="margin-left: 40px"><label for="nombre cliente" style="margin: 7px 7px 7px" >Nombre del cliente:</label ></div> 
                                <div class="col-sm-4">
                                <input type="text" class="form-control input-lg-3" id="nombreCliente">
                        </div>
                    </div>  

                </div>                            
                                              
                <div class="row"> <br>                 
                    <div class="container">                                                     
                        <div class=" row col-lg-1" style="margin-right: 70px"><button type="submit" class="btn btn-primary">Ver informe </button></div>                                 
                        <div class=" row col-lg-1" ><button type="submit" class="btn btn-primary">Ver presentacion </button></div> 
                    </div>
                </div>

            </section>
        </div>
    </div>
    <?php
        include "../../view/theme/AdminLTE/Additional/scripts.php";
    ?>
</body>