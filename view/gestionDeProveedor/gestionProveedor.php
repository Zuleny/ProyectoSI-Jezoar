    <?php
        include "../../view/theme/AdminLTE/Additional/head.php";
    ?>
        <div class="content-wrapper">
            <!-- Titulo de la cabecera -->
            <section class="content-header">
                <h1>
                    Proveedor
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
            </section>
            <!-- Fin de la cabecera -->
            <!-- contenido -->
            <section class="content">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Gestion de Proveedor</h3>
                        <div class="box-tools pull-right">
                                    <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                                    <span class="glyphicon glyphicon-home"></span></a>
                        </div>
                    </div>
                   <!-- Inicia tu codigo aqui -->          
                    <form role="form" action="../../controller/proveedorController.php" method="post">
                        <!--  Lugar de butons y label y textbox  -->
                            <div class="box-body col-lg-12">
                                <div class="col-md-6">
                                    <label>Empresa</label>
                                    <input type="text" class="form-control" name="empresaProv" placeholder="Empresa para la que trabaja"method="post">
                                </div>
                                <div class="col-md-6">
                                    <label>Correo electrónico</label>
                                    <input type="email" class="form-control" name="emailProv" placeholder="Ej.: usuario@servidor.com">
                                </div>
                            </div>
                            <div class="box-body col-lg-12">
                                <div class="col-md-6">
                                    <label>Direccion</label>
                                    <input type="text" class="form-control" name="dirProv" placeholder="Direccion">
                                </div>
                                <div class="col-md-6">
                                    <label>Telefono</label>
                                    <input type="text" class="form-control" name="telProv" placeholder="Telefono de la empresa">
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="col-lg-6">
                                    <label>Nombre del Proveedor</label>
                                    <input type="text" class="form-control" name="nameProv" placeholder="nombre del proveedor">
                                </div>
                            </div>
                    </form>
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">Proveedores de la Empresa Jezoar</h3>
                            </div>
                            <div class="box-body"style="overflow:scroll">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Codigo Proveedor </th>
                                            <th>Empresa</th>
                                            <th>Correo electrónico</th>
                                            <th>Direccion</th>
                                            <th>Telefono</th>
                                            <th>Nombre</th>
                                            <th>Actualizar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            require "../../controller/proveedorController.php";
                                            $lista=getListaDeProveedor();
                                            echo $lista;  
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