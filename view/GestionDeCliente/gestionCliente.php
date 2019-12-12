    <?php
        include "../../view/theme/AdminLTE/Additional/head.php";
    ?>
    <!-- the fixed layout is not compatible with sidebar-mini -->
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Cliente
                <!-- <small>Blank example to the fixed layout</small> -->
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido -->
        <section class="content">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">Gestion de Clientes</h3>
                    <div class="box-tools pull-right">
                        <a href="../../index.php" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </div>
                </div>
                <!-- Inicia tu codigo aqui -->                    
                <form role="form" action="../../controller/clienteController.php" method="post" >
                    <!--  Lugar de butons y label y textbox  -->
                    <div class="box-body">
                        <div class="col-lg-4">
                            <label>Nombre del cliente</label>
                            <div class="input-group margin-bottom-sm"> 
                                <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                                <input type="text" name = "nombre_cliente" class="form-control" required>
                            </div>        
                        </div>
                        <div class="col-lg-2">
                            <label>Telefono </label>
                            <div class="input-group margin-bottom-sm"> 
                                <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                                <input type="text" name = "telefono_cliente"class="form-control" required>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <label>Telefono(2)</label>
                            <div class="input-group margin-bottom-sm"> 
                                <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                                <input type="text" name = "telefono2_cliente" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>NIT / C.I.</label>
                            <div class="input-group margin-bottom-sm"> 
                                <span class="input-group-addon"><i class="fa fa-id-card-o fa-fw" aria-hidden="true"></i></span>
                                <input type="text" class="form-control"name ="nit_cliente" placeholder="CI, solo si es persona" required>
                            </div>
                        </div>                       
                    </div>
                    <div class="box-body">
                        <div class="col-lg-3">
                            <label>Correo electronico</label>
                            <div class="input-group margin-bottom-sm"> 
                                <span class="input-group-addon"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i></span>
                                <input type="email" name ="correo_cliente"class="form-control" >
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <label>Direccion</label>
                            <div class="input-group margin-bottom-sm"> 
                                <span class="input-group-addon">
                                    <i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>
                                </span>
                                <input type="text" name="direccion_cliente" class="form-control" required >
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <label>Tipo de cliente:</label>
                            <p><input type="radio" name="tipo" value="P">Persona</p>
                            <p><input type="radio" name="tipo" value="E">Empresa</p>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="col-lg-3">                 
                            <button type="submit" name ="agregar_cliente" class="btn btn-block btn-success" style="border-radius: 15px;" title="Agregar Servicio">Agregar cliente <i class="fa fa-fw fa-user-plus"></i></button>
                        </div>
                    </div>
                </form>
                    <!--  Lugar de butons y label y textbox  -->   
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Clientes de la Empresa Jezoar</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-hover" id="tabla1">
                                <thead class="box-info">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Direccion</th>
                                    <th>Tipo</th>
                                    <th>Telefono</th>
                                    <th>Nit/CI</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                require "../../controller/clienteController.php";
                                $printer=getTableCliente();
                                echo $printer;
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
    <?php
        include "../../view/theme/AdminLTE/Additional/scripts.php";
    ?>