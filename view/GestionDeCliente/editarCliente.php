    <head>
        <?php
        include "../../view/theme/AdminLTE/Additional/head.php";
        ?>
    </head>
    <!-- the fixed layout is not compatible with sidebar-mini -->
    <body class="hold-transition skin-blue fixed sidebar-mini">
        <div class="wrapper">
            <?php
                include "../../view/theme/AdminLTE/Additional/header.php";
                include "../../view/theme/AdminLTE/Additional/aside.php";
            ?>
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
                    <?php
                        require "../../controller/clienteController.php";
                        $resultado =  getDatosEditarCliente($_GET['cod']);
                    ?>
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Editar informacion del cliente:  <?php echo pg_result($resultado,0,0)?> </h3>
                            <div class="box-tools pull-right">

                                <a href="../view/index.php" class="btn btn-primary" title="Volver Atras">
                                    <span class="glyphicon glyphicon-home"></span></a>
                            </div>
                        </div>
                        <!-- Inicia tu codigo aqui -->
                        <form role="form" action="../../controller/clienteController.php" method="get" >
                            <!--  Lugar de butons y label y textbox  -->
                            <div class="box-body">
                                <div class="col-lg-4">
                                    <label>Nombre del cliente</label>
                                    <div class="input-group margin-bottom-sm">
                                        <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name = "nombre_cliente" class="form-control" value="<?php echo pg_result($resultado,0,0) ?>" >
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <label>Telefono </label>
                                    <div class="input-group margin-bottom-sm">
                                        <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name = "telefono_cliente"class="form-control" value="<?php echo pg_result($resultado,0,5) ?>">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <?php
                                    $cantidadTel = pg_num_rows($resultado);
                                    if($cantidadTel >1){
                                    echo'                                  
                                    <label>Telefono(2)</label>
                                    <div class="input-group margin-bottom-sm">
                                        <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>                                        
                                              <div>
                                                 <input type="text" name = "telefono2_cliente" class="form-control" value="'.pg_result($resultado,1,5).'">
                                                 </div>
                                    </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="col-lg-4">
                                    <label>Correo electronico</label>
                                    <div class="input-group margin-bottom-sm">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name ="correo_cliente"class="form-control" value="<?php echo pg_result($resultado,0,2) ?>" >
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label>Nit / C.I.</label>
                                    <div class="input-group margin-bottom-sm">
                                        <span class="input-group-addon"><i class="fa fa-id-card-o fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name ="nit_cliente"  value="<?php echo pg_result($resultado,0,4) ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="col-lg-5">
                                    <label>Direccion</label>
                                    <div class="input-group margin-bottom-sm">
                                        <span class="input-group-addon"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name="direccion_cliente" class="form-control" value="<?php echo pg_result($resultado,0,1) ?>">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label>Tipo de cliente:</label>
                                    <?php 
                                        if(pg_result($resultado,0,3)=='E'){
                                            echo '<p><input type="radio" name="tipo" value="P">Persona</p>
                                                  <p><input type="radio" name="tipo" checked value="E">Empresa</p>';
                                        }else{
                                            echo '<p><input type="radio" name="tipo" checked value="P">Persona</p>
                                                  <p><input type="radio" name="tipo" selected value="E">Empresa</p>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="col-lg-3">
                                    <button type="submit" name ="cod" value= "<?php echo pg_result($resultado,0,6)?>" class="btn btn-block btn-success" style="border-radius: 15px;" title="Registrar cambiod de cliente">Registrar cambios <i class="fa fa-fw fa-save"></i></button>
                                </div>
                                <div class="col-lg-3">
                                    <a href="gestionCliente.php">
                                        <button type="button" style="border-radius: 15px;" class="btn btn-block btn-danger" title="Cancelar Cambios">Cancelar Cambios
                                            <i class="fa fa-fw fa-times"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--  Lugar de butons y label y textbox  -->
                    <div>
                        <a href="https://www.facebook.com/Jezoar-228770924276961/" target="_blank"class="btn btn-block btn-social btn-facebook">
                            <i class="fa fa-facebook"></i>
                            Página de Facebook de Jezoar
                        </a>
                    </div>
                    <!-- Termina tu codigo aqui -->
                 </section>
            </div>
        </div>
        <?php
            include "../../view/theme/AdminLTE/Additional/scripts.php";
        ?>
    </body>
