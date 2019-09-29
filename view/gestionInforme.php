<!DOCTYPE html>
<html>
<head>
    <?php
        include "theme2/AdminLTE/Additional/head.php";
    ?>
</head>
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php
            include "theme2/AdminLTE/Additional/header.php";
            include "theme2/AdminLTE/Additional/aside.php";
        ?>
        <div class="content-wrapper">
            <!-- Titulo de la cabecera -->
            <section class="content-header">
                <h1>
                    Informe
                    <small>Detalles de una obra terminada </small>
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

                        <div class="row"><br>
                            <div class="container">                         
                                <div class=" row bg-primary col-lg-2"><label for="codigo del informe" style="margin: 8px 7px 7px" >Codigo del informe:</label ></div> 
                                <div class="col-sm-2">
                                <input type="text" class="form-control input-lg2"  id="text_codInforme" placeholder="Solo numérico" >
                                &nbsp;&nbsp;
                            </div>
                
                            <div class="container"  > 
                                <div class=" row bg-success col-lg-1"style="margin-left: 40px"><label for="codigo del informe"  style="margin: 8px 7px 7px" >Fecha:</label ></div> 
                                <div class="col-sm-2">
                                <input type="text" class="form-control input-md-2" id="text_codInforme" placeholder="Fecha actual">
                            </div> 
                            <div class="container"  > 
                                <div class=" row bg-danger  col-lg-3"style="margin-left: 40px"><label for="codigo de presentacion"  style="margin: 8px 7px 7px" >Codigo de presentación:</label ></div> 
                                <div class="col-lg-2">
                                <input type="text" class="form-control input-md-2" id="text_codInforme" placeholder="Codigo del documento">
                                </div> 
                    </div>
                    <div class="row">
                            <div class="container" >                       
                                <div class=" row bg-primary col-lg-2"><label for="nombre cliente" style="margin: 8px 7px 7px" >Nombre del cliente:</label ></div> 
                                <div class="col-sm-4">
                                <input type="text" class="form-control input-lg-3" id="nombreliente">
                            </div>
                    </div>  

                </div>        
                        <div class="row">
                                   <div class="form-group" style="margin:1em">
                                    <label for="disabledTextInput">Detalle de informe</label>
                                    <textarea class="form-control" rows="3" style ="margin: 15px 10px 15px"></textarea>
                                    <button type="submit" class="btn btn-primary">Guardar PDF</button>            
                                </div>                               
                        </div>                        
                        
                        <div class="container-fluid">
                            
                            <div class="row">  
                                <div class="col-xs-5">
                                    <h3>Antes: </h3> 
                                    <img src="img/AntesDespues/Cotoca.png " class="img-responsive">
                                </div>
                                <div class="col-xs-4 ">
                                    <h3> Despues:</h3> 
                                    <img src="img/AntesDespues/Cotoca1.png " class="pull-right img-responsive">
                                </div>
                            </div>
                        </div>

                        <div class="row">          <br>     
                            <div class="container">                         
                            
                                <div class=" row col-lg-1" style="margin-right: 450px"><button type="submit" class="btn btn-sucess">Añadir imagen: </button></div>                                 
                                <div class=" row col-lg-1" ><button type="submit" class="btn btn-sucess">Añadir imagen: </button></div> 
                            </div>

            </section>
        </div>
    </div>
    <?php
        include "theme2/AdminLTE/Additional/scripts.php";
    ?>
</body>