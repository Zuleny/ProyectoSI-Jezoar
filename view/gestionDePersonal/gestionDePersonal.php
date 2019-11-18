
    <?php
        include "../../view/theme/AdminLTE/Additional/head.php";
    ?>

<!-- the fixed layout is not compatible with sidebar-mini -->
        
        <div class="content-wrapper">
            <!-- Titulo de la cabecera -->
            <section class="content-header">
                <h1>
                    Personal
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
            </section>
            <!-- Fin de la cabecera -->
            <!-- contenido -->
            <section class="content">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Gestion de Personal</h3>
                        <div class="box-tools pull-right">
                            <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                        </div>
                    </div>
                   <!-- Inicia tu codigo aqui -->                    
                    <form role="form" method="post" action="../../controller/personalController.php">
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box-body">
                            
                            <div class="col-lg-5">
                                <label>Nombre de Personal</label>
                                <input type="text" class="form-control" placeholder="Escriba nombres y apellidos" name="txtNombrePersonal">
                            </div>

                            <div class="col-lg-3">
                             <div class="form-group" data-select2-id="13">
                               <label>Tipo de Personal</label>
                               <select class="form-control select2 select2-hidden-accessible" name="listaTipoDePersonal">
                               <?php
                                      require "../../controller/personalController.php";
                                      $printer=getlistaTipoDePersonal();
                                      echo $printer;      
                                            
                                ?>
                                    
                               </select>
                             </div>
                            </div> 

                            <div class="col-lg-4">
                             <div class="form-group" data-select2-id="13">
                               <label>Cargo</label>
                               <select class="form-control select2 select2-hidden-accessible" name="listaDeCargo">
                               <?php
                                      
                                      $printer=getlistaCargoDePersonal();
                                      echo $printer;      
                                            
                                ?>
                                    
                               </select>
                             </div>
                             </div>
                            
                        </div>
                            
                        
                        <div class="box-body">
                            <div class="col-lg-9"></div>
                            <div class="col-lg-3">
                                <button type="submit" class="btn btn-block btn-success" style="border-radius: 15px;" name="btnInsertarProducto" title="Agregar Servicio">Agregar Registro <i class="fa fa-fw fa-check"></i></button>
                            </div>
                        </div>
                        
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">Lista de Productos</h3>
                            </div>
                            <div class="box-body"  >
                                <table class="display" style="width:100%" id="tabla1">
                                  
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Nombre</th>
                                            <th>Tipo</th>
                                            <th>Cargo</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                  
                                
                                
                                  
                                </table>
                                
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
    <?php
        include "../../view/theme/AdminLTE/Additional/scripts.php";
    ?>