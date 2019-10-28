    <?php
        include "../../view/theme/AdminLTE/Additional/head.php";
    ?>

<!-- the fixed layout is not compatible with sidebar-mini -->
        <div class="content-wrapper">
            <!-- Titulo de la cabecera -->
            <section class="content-header">
                <h1>
                    Bitacora
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
            </section>
            <!-- Fin de la cabecera -->
            <!-- contenido -->
            <section class="content">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Bitacora</h3>
                        <div class="box-tools pull-right">
                            <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                        </div>
                        <br>
                        <div class="box-body">
                            <div class="col-lg-4">
                                <label>Nombre Personal</label>
                                <select class="form-control" name="nombrePersonal" >
                                    <?php
                                        require "../../controller/usuarioController.php";
                                        $lista=getListaPersonal();
                                        echo $lista;
                                    ?>
                                </select>
                            </div>
                            <br>
                            <div class="col-lg-3" >
                                <button type="submit" class="btn btn-block btn-success" style="border-radius: 15px;" id="button1" name="btnAdministrarBitacora" title="Verificar">Verificar 
                                    <i class="fa fa-fw fa-check"></i></button>
                            </div>
                        </div>

                    </div>
                   <!-- Inicia tu codigo aqui -->          
                    <form role="form" action="../../controller/bitacoraController.php" method="post">
                        <!--  Lugar de butons y label y textbox  -->
                        
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">Bitacora de la Empresa Jezoar</h3>
                            </div>
                            <div class="box-body"  id="tabla1">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Hora-Fecha</th>
                                            <th>Descripcion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                                                      
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
    </div>
    <?php
        include "../../view/theme/AdminLTE/Additional/scripts.php";
    ?>
</body>