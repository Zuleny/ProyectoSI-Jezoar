<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Gestionar contratos
                <!-- <small>Blank example to the fixed layout</small> -->
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido de mi Vista -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                    <div class="box-tools pull-right">
                        <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                        <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                </div>
                <!-- Inicia tu codigo aqui -->                    
                <form role="form" action="../../controller/servicioController.php" method="post">
                    <!--  Lugar de butons y label y textbox  -->
                    <div class="box-body">
                            <div class="col-lg-2">
                                <label>Codigo de presentacion</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-pencil-scuare-o fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name = "codigo_contrato" placeholder="Solo si desea ver la presentación">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <label>Fecha</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name = "fecha_actual" class="form-control" placeholder="Fecha actual">
                                </div>        
                            </div>
                            <div class="col-lg-3">
                                <label>Fecha inicial</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name = "fecha_inicial" class="form-control" >
                                </div>        
                            </div>
                            <div class="col-lg-3">
                                <label>Fecha final</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-calendar fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name = "fecha_final" class="form-control" >
                                </div>        
                            </div>                            
                    </div>
                        
                        <div class="box-body">
                            <div class="col-lg-5">
                                <label>Nombre de cliente</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                                    <input type="text" name ="nombre_cliente"class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4"> </div>
                            <div class="col-lg-2">  
                                <br>                                                             
                                <button type="submit" name ="verPresentacion" style="border-radius: 15px;" class="btn btn-block btn-primary">Ver presentacion  <i class="fa fa-fw fa-file-pdf-o"></i></button>
                                </div> 
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