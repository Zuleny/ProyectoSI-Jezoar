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
                            <div class="box-body">
                                <div class="col-lg-4">
                                    <label>Empresa</label>
                                    <input type="text" class="form-control" name="empresaProv" placeholder="Empresa para la que trabaja"method="post">
                                </div>
                                <div class="col-lg-4">
                                    <label>Correo electrónico</label>
                                    <input type="email" class="form-control" name="emailProv" placeholder="Ej.: usuario@servidor.com">
                                </div>
                                <div class="col-lg-2">
                                    <label>Telefono</label>
                                    <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i></span>
                                        <input type="text" name = "telefono_cliente"class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="col-lg-4">
                                    <label>Direccion</label>
                                    <input type="text" class="form-control" name="dirProv" placeholder="Direccion">
                                </div>
                                <div class="col-lg-4">
                                    <label>Nombre del Proveedor</label>
                                    <input type="text" class="form-control" name="nameProv" placeholder="nombre del proveedor">
                                </div>
                                <div class="col-lg-1"></div>
                                <div class="col-lg-3">
                                    <br>
                                    <button type="submit" class="btn btn-block btn-success" style="border-radius: 15px;" name=InsertarAlmacen" title="Agregar Almacen">Agregar Registro
                                    <i class="fa fa-fw fa-check"></i>
                                    </button>
                                </div>
                            </div>
                    </form>
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">Proveedores de la Empresa Jezoar</h3>
                            </div>
                            <div class="box-body"> <!--style="overflow:scroll"-->
                            <div class="box-body" id="tabla1">
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
                                    <div class="modal fade" id="modal-default">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true"></span>
                                                </button>
                                                <h4 class="modal-title">Modificar</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Empresa</label>
                                                    <input type="text" class="form-control" placeholder="EcoPlan" name="empresaProveedor">
                                                    <br>
                                                    <label>Correo electrónico</label>
                                                    <input type="text" class="form-control" placeholder="EcoPlan@" name="correoProveedor">
                                                    <br>
                                                    <label>Direccion</label>
                                                    <input type="text" class="form-control" placeholder="Av. avaroa " name="direccionProveedor">
                                                    <br>
                                                    <label>Telefono</label>
                                                    <input type="text" class="form-control" placeholder="3564578" name="telefonoProveedor">
                                                    <br>
                                                    <label>Nombre</label>
                                                    <input type="text" class="form-control" placeholder="Lizbeth" name="nombreProveedor">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger pull-left" type="button" data-dismiss="modal">Cancelar</button>
                                                <button class="btn btn-success" type="button">Guardar</button>
                                            </div>
                                        </div>
                                    </div>
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