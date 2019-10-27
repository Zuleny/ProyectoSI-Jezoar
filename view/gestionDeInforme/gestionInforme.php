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