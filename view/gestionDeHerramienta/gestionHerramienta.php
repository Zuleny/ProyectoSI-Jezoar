    <?php
        include "../../view/theme/AdminLTE/Additional/head.php";
    ?>
        <div class="content-wrapper">
            <!-- Titulo de la cabecera -->
            <section class="content-header">
                <h1>
                    Herramienta
                    <small>Gestión de Insumo</small>
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
            </section>
            <!-- Fin de la cabecera -->
            <!-- contenido -->
            <section class="content">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Gestion de Herramienta</h3>
                        <div class="box-tools pull-right">
                            <a href="../../index.php" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                        </div>
                    </div>
                   <!-- Inicia tu codigo aqui -->   
                                    
                    <form role="form"action="../../controller/herramientaController.php" method="post">
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box-body">
                            <div class="col-lg-4">
                                <label>Nombre Herramienta</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-cubes fa-fw" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="nombre" required placeholder="Nombre de la herramienta">
                                </div>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-7">
                                <label>Descripcion</label>
                                <textarea class="form-control" name="descripcion" rows="3" required placeholder="Escriba una breve descripcion"></textarea>
                            </div>  


                        </div>
                        <div class="box-body">
                            <div class="col-lg-7" style="background-color: #D4EFDF;">
                                <label>Estado</label>
                                <br>
                                <div class="col-md-4">
                                    <p><input type="radio" name="estado" value="D" checked> Disponible</p>
                                </div>
                                <div class="col-md-4">
                                    <p><input type="radio" name="estado" value="N"> No Disponible</p>
                                </div>
                                <div class="col-md-4">
                                    <p><input type="radio" name="estado" value="M"> Mantenimiento</p>
                                </div>
                            </div>
                            <div class="col-lg-1"></div>
                            <div class="col-lg-3">
                                <button type="submit" value="Agregar Herramienta" class="btn btn-block btn-success" style="border-radius: 15px;"title="Agregar Herramienta">Agregar Herramienta <i class="fa fa-fw fa-check"></i></button>
                            </div>

                        </div>
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">Herramientas</h3>
                            </div>
                            <div class="box-body" style="overflow:scroll" id="tabla1">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Cod Insumo</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Estado</th>
                                            <th>Actualizar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            require "../../controller/herramientaController.php";
                                            $printer=getListaDeHerramientas();
                                            echo $printer;
                                        ?>
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
