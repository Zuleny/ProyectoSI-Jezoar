<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Cliente
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Modificación de Cliente # <? echo $_GET['codigo']; ?> (Nota: Asigne los nuevos datos del Cliente a modificar)</h3>
                <div class="box-tools pull-right">
                    <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Menú Inicio">
                    <span class="glyphicon glyphicon-home"></span></a>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->                    
            <?php
                require '../../controller/clienteController.php';
                $result = getDatosEditarCliente($_GET['codigo']);
            ?>
            <form role="form" action="../../controller/clienteController.php" method="post">
                <!--  Lugar de butons y label y textbox  -->
                <div class="box-body">
                    <div class="col-lg-4">
                        <label> <b>Nombre Cliente:</b> <?php echo pg_result($result,0,1); ?> </label>
                        <select class="form-control" name="nombreClienteEditar" >
                            <?php
                                $lista = getListaClienteEditar();
                                echo $lista;
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-2">
                        <label>Telefono </label>
                        <div class="input-group margin-bottom-sm"> 
                            <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name = "telefonoEditar" value="<?php echo pg_result($result,0,2) ?>">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <label>Telefono(2)</label>
                        <div class="input-group margin-bottom-sm"> 
                            <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name = "telefono2Editar" value="<?php echo pg_result($result,0,3) ?>">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <label>NIT / C.I.</label>
                        <div class="input-group margin-bottom-sm"> 
                            <span class="input-group-addon"><i class="fa fa-id-card-o fa-fw" aria-hidden="true"></i></span>
                            <input type="text" class="form-control"name ="nitEditar" placeholder="CI, solo si es persona" value="<?php echo pg_result($result,0,4) ?>">
                        </div>
                    </div>  
                </div>
                <div class="box-body">
                    <div class="col-lg-3">
                        <label>Correo electronico</label>
                        <div class="input-group margin-bottom-sm"> 
                            <span class="input-group-addon"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i></span>
                            <input type="text" name ="correoEditar"class="form-control" >
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Direccion</label>
                        <div class="input-group margin-bottom-sm"> 
                            <span class="input-group-addon">
                                <i class="fa fa-map-marker fa-fw" aria-hidden="true"></i>
                            </span>
                            <input type="text" name="direccionEditar" class="form-control" >
                        </div>
                    </div>
                    <div class="col-lg-5 form-group" >
                        <?php
                            if(pg_result($result,0,6)=="Persona"){
                                $printer = '<span class="label label-danger">Persona</span>';
                            }else{
                                $printer = '<span class="label label-warning">Empresa</span>';
                            }
                        ?>
                        <label> <b>Tipo de cliente: </b> <?php echo $printer; ?> </label>
                        <br>
                        <div class="col-md-4">
                            <p><input type="radio" name="personaEditar" value="Persona"> Persona </p>
                        </div>
                        <div class="col-md-3">
                            <p><input type="radio" name="empresaEditar" value="Empresa"> Empresa </p>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-lg-4">
                        <div class="col-md-6">
                            <br>
                            <a href="gestionCotizacion.php">
                                <button type="button" style="border-radius: 15px;" class="btn btn-block btn-danger" title="Cancelar Cambios">Cancelar<i class="fa fa-fw fa-times"></i></button>
                            </a>
                        </div>
                        <br>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-block btn-success" style="border-radius: 15px;" title="Agregar Cotizacion">Modificar <i class="fa fa-fw fa-check"></i></button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="box-footer">
                <a href="https://www.facebook.com/Jezoar-228770924276961/" target="_blank"class="btn btn-block btn-social btn-facebook">
                    <i class="fa fa-facebook"></i>
                        Página de Facebook de Jezoar
                </a>
            </div>
        </div>
    </section>
</div>
<?php
    include "../../view/theme/AdminLTE/Additional/scripts.php";
?>