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
                    <h3 class="box-title">Detalles de la culminacion de una obra para el cliente:
                        <?php
                            require "../../controller/informeController.php";
                            echo  getNombreClientePorcodigoCotizacion($_GET['codCotizacion']);
                        ?>
                    </h3>
                    <div class="box-tools pull-right">
                            <a href="../../index.php" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                        </div>
                    </div>
                   <!-- Inicia tu codigo aqui -->                    
                    <form role="form" action="../../controller/informeController.php" method="post" enctype="multipart/form-data" >
                        <!--  Lugar de butons y label y textbox  -->

                        <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Imagen  del "ANTES"</label>
                                        <div class="input-group">
                                            <input type="hidden" name="image2" id="image22" >
                                                <span class="input-group-btn">
                                                    <span class="btn btn-default btn-file btn-primary" >
                                                        Agregar imagen <input type="file" id="imgInp" name="imageInforme" required/>
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
                                                        Agregar imagen <input type="file" id="imgInp2" name="imageInforme2" required/>
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
                                <textarea class="form-control" rows="5" name = "descripcion" required></textarea>
                            </div>

                        </div>

                        <div class="box-body">
                            <div class="col-lg-2" >                                
                                <button type="submit" name ="codCotizacion"  value="<?php echo $_GET['codCotizacion']?>" class="btn btn-block btn-primary" title="Agregar Servicio">Crear informe <i class="fa fa-fw fa-file-pdf-o"></i></button>
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