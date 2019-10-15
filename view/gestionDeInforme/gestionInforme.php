<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
<<<<<<< HEAD
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
                        <button type="button" class="btn btn-primary" title="Volver Atras">
                            <i class="fa fa-fw fa-arrow-circle-left"></i>
                        </button>
                    </div>
                </div>
                <!-- Inicia tu codigo aqui -->                    
                <form role="form" action="../../controller/servicioController.php" method="post">
                    <!--  Lugar de butons y label y textbox  -->
                    <div class="box-body">
                            <div class="col-lg-2">
                                <label>Codigo de informe</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-archive fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name = "codigo_informe" placeholder="Solo numero">
=======
<div class="content-wrapper">
<!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>Informe<small>Detalles de una obra terminada </small>
        <div class="box-tools pull-right">
            <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
            <span class="glyphicon glyphicon-home"></span></a>
        </div>
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido -->
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <div class="row">
                    <br>
                    <div class="container">                         
                        <div class=" row bg-primary col-lg-2">
                            <label for="codigo del informe" style="margin: 8px 7px 7px" >Codigo del informe:</label>
                        </div> 
                        <div class="col-sm-2">
                            <input type="text" class="form-control input-lg2" id="text_codInforme" placeholder="Solo numérico" >
                            &nbsp;&nbsp;
                        </div>
                        <div class="container"> 
                            <div class=" row bg-success col-lg-1"style="margin-left: 40px">
                                <label for="codigo del informe"  style="margin: 8px 7px 7px">Fecha:</label>
                            </div> 
                            <div class="col-sm-2">
                                <input type="text" class="form-control input-md-2" id="text_codInforme" placeholder="Fecha actual">
                            </div> 
                            <div class="container"> 
                                <div class=" row bg-danger  col-lg-3"style="margin-left: 40px">
                                    <label for="codigo de presentacion"  style="margin: 8px 7px 7px" >Codigo de presentación:</label>
                                </div> 
                                <div class="col-lg-2">
                                    <input type="text" class="form-control input-md-2" id="text_codInforme" placeholder="Codigo del documento">
                                </div> 
                            </div>
                            <div class="row">
                                <div class="container" >                       
                                    <div class=" row bg-primary col-lg-2">
                                        <label for="nombre cliente" style="margin: 8px 7px 7px" >Nombre del cliente:</label>
                                    </div> 
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control input-lg-3" id="nombreliente">
                                    </div>
>>>>>>> 3093d113345399b3a826f2a9dbec7f536fff19e8
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label>Fecha</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name = "fecha_actual" class="form-control" placeholder="Fecha actual">
                                </div>        
                            </div>
                            <div class="col-lg-2">
                                <label>Codigo de presentacion</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-file fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name = "codigo_presentacion"class="form-control">
                                </div>
                            </div>
                    </div>
                        
                        <div class="box-body">
                            <div class="col-lg-5">
                                <label>Nombre de cliente</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name ="nombre_cliente"class="form-control" >
                                </div>
                            </div>                                                   

                        </div>

                        <div class="box-body">   
                            <div class="col-lg-10" >                                
                                <label>Detalle del informe</label>                                                                    
                                    <textarea class="form-control" rows="5" name ="Detalle_informe"></textarea>
                            </div>                            
                        </div>
                        <div class="box-body">   
                            <div class="col-lg-2" >                                
                                <button type="submit" name ="guardarPDF" class="btn btn-block btn-primary">Guardar PDF <i class="fa fa-fw fa-file-pdf-o"></i></button>
                            </div>
                        </div>
                        
                        <div class="box-body">
                            <div class="col-lg-5"> 
                                <label>ANTES: </label>                               
                                <button type="submit" name ="guardarPDF" class="btn btn-block btn-primary">Agregar imagen <i class="fa fa-fw fa-picture-o"></i></button>
                            </div>
                            <div class="col-lg-5"> 
                                <label>DESPUES: </label>                               
                                <button type="submit" name ="guardarPDF" class="btn btn-block btn-primary">Agregar imagen <i class="fa fa-fw fa-picture-o"></i></button>
                            </div>
                        </div>
                            
                            
                        </div>


                            

                                     
                    
                </form>
                
                <!-- Termina tu codigo aqui -->
            </div>
        </section>
        <!-- fin de contenido de mi Vista -->
    </div>



<?php
    include "../../view/theme/AdminLTE/Additional/scripts.php";
?>
<script>
    
</script>