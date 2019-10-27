    <?php
        include "../../view/theme/AdminLTE/Additional/head.php";
    ?>
        <div class="content-wrapper">
            <!-- Titulo de la cabecera -->
            <section class="content-header">
                <h1>
                    Herramientas
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
            </section>
            <!-- Fin de la cabecera -->
            <!-- contenido -->
            <section class="content">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Gestion de Herramientas</h3>
                        <div class="box-tools pull-right">
                            <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                        </div>
                    </div>
                   <!-- Inicia tu codigo aqui -->   
                                    
                    <form role="form"action="../../controller/herramientaController.php" method="get">
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box-body">
                            <div class="col-lg-4">
                                <label>Nombre</label>
                                <input type="text" class="form-control" name="nombre"placeholder="Nombre de la herramienta">
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-7">
                                <label>Descripcion</label>
                                <textarea class="form-control" name="descripcion" rows="4" placeholder="Escriba una breve descripcion"></textarea>                                     
                                <br>
                            </div>
                            <div class="col-lg-5">
                                <label>Estado</label>
                            <br>
                                <p><input type="radio" name="estado" value="M">Mantenimiento</p>
                                <p><input type="radio" name="estado" value="D">Disponible</p>
                                <p><input type="radio" name="estado" value="N">No Disponible</p>
                            </div>
                            <a href="http://localhost/ProyectoSI-Jezoar/view/gestionDeAlmacen/asignacionProductoAlmacen.php" target="_blank" id="etiqueta1">
                            Ir a: Registrar Herramienta en un almacen 
                            </a>
                        </div>
                            <div class="box-body">
                            <div class="col-lg-9"></div>
                                <div class="col-lg-3">
                                    <button type="submit" value="Agregar Herramienta" class="btn btn-block btn-success" style="border-radius: 15px;"title="Agregar Herramienta">Agregar Registro <i class="fa fa-fw fa-check"></i></button>
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
