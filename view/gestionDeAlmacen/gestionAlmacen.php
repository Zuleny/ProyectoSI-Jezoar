    <?php
        include "../../view/theme/AdminLTE/Additional/head.php";
    ?>
    <div>
<!-- the fixed layout is not compatible with sidebar-mini -->
        <div class="content-wrapper">
            <!-- Titulo de la cabecera -->
            <section class="content-header">
                <h1>
                    Almacen
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
            </section>
            <!-- Fin de la cabecera -->
            <!-- contenido -->
            <section class="content">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Almacen</h3>
                        <div class="box-tools pull-right">
                            <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                        </div>
                    </div>
                   <!-- Inicia tu codigo aqui -->          
                    <form role="form" action="../../controller/almacenController.php" method="post">
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box-body">

                            <div class="col-lg-6">
                                <label>Nombre de Almacen</label>
                                <input type="text" class="form-control" name="Almacen" placeholder="nombre del almacen" method="post">
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-6">
                                <label>Direccion</label>
                                <input type="text" class="form-control" name="Dir" placeholder="Direccion del Almacen">
                            </div>
                            <div class="box-tools pull-right">
                                <br>
                                <button type="submit" class="btn btn-block btn-success" name="InsertarAlmacen" title="Agregar Almacen">Agregar Registro 
                                    <i class="fa fa-fw fa-"></i>
                                </button>
                            </div>     
                        </div>

                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">Almacenes de la Empresa Jezoar</h3>
                            </div>
                            <div class="box-body"> <!--style="overflow:scroll"-->
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>codigo Almacen</th>
                                            <th>Nombre</th>
                                            <th>Direccion</th>
                                            <th>Actualizar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            require "../../controller/almacenController.php";
                                            $lista=getListaDeAlmacen();
                                            echo $lista;                                       
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                    <div class="box-footer">
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