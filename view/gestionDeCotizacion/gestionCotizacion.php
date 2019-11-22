<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Cotización
            <small>Gestión de Servicio</small>
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Gestionar Cotización</h3>
                <div class="box-tools pull-right">
                    <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Menú Inicio">
                    <span class="glyphicon glyphicon-home"></span></a>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->                    
            <form role="form" action="../../controller/cotizacionController.php" method="post">
                <!--  Lugar de butons y label y textbox  -->
                <div class="box-body">
                    <div class="col-lg-4">
                        <label>Fecha</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                        <input type="date" class="form-control" name="fecha">
                        </div>
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>Nombre Cliente</label>
                        <select class="form-control" name="nombreCliente" >
                            <?php/*
                                require "../../controller/cotizacionController.php";
                                $lista=getListaCliente();
                                echo $lista;*/
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-1">
                        <br>
                        <a href="../GestionDeCliente/gestionCliente.php">
                            <button class="btn bg-aqua-active" title="Agregar Nuevo Cliente" type="button">
                                <i class="fa fa-fw fa-child"></i>
                            </button>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <label>Cantidad de Dias</label>
                        <input type="number" class="form-control" placeholder="Ingrese Cantidad" name="dias">
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-lg-4">
                        <label>Precio Total</label>
                        <input type="text" class="form-control" step="0.01" placeholder="Precio Total" value="0.0 Bs." disabled>
                        <input type="hidden" name="precio" value="0.0">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="option">Tipo de Servicio</label>
                        <select class="form-control" name="Servicio">
                            <option value="Profunda">Limpieza Profunda</option>
                            <option value="Post-Obra">Limpieza Post-Obra</option>
                            <option value="Oficinas">Limpieza de Oficinas</option>
                        </select>
                    </div>
                    <div class="col-lg-4" style="background-color: #D4EFDF;">
                        <label>Material</label>
                            <br>
                            <div class="col-md-6">
                                <p><input type="radio" name="estadoM" value="S"> Con Material</p>
                            </div>
                            <div class="col-md-6">
                                <p><input type="radio" name="estadoM" value="N"> Sin Material</p>
                            </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-lg-8 form-group" style="background-color: #D4EFDF;">
                        <label>Estado</label>
                        <br>
                            <div class="col-md-4">
                                <p><input type="radio" name="estadoP" value="Aceptado"> Cotización Aceptado</p>
                            </div>
                            <div class="col-md-3">
                                <p><input type="radio" name="estadoP" value="Espera"> En Espera</p>
                            </div>
                            <div class="col-md-4">
                                <p><input type="radio" name="estadoP" value="Denegado"> Cotización Denegado</p>    
                            </div>
                    </div>

                </div>
                <div class="box-body">
                    <div class="col-lg-4">
                        <button type="submit" style="border-radius: 15px;" value="Agregar Cotizacion" class="btn btn-block btn-success" title="Agregar Cotizacion">Agregar Registro <i class="fa fa-fw fa-check"></i></button>
                    </div>


                </div>
            </form>
            <!--  Tabla de Cotizaciones  -->
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Lista de Cotizaciones</h3>
                </div>
                <div class="box-body" style="overflow:scroll">
                    <table class="table table-bordered table-hover" id="tabla1">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Precio</th>
                                <th>Cliente</th>
                                <th>Cantidad Dias</th>
                                <th>Tipo Servicio</th>
                                <th>Material</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $lista=getListaDeCotizaciones();
                                echo $lista;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--  FIN Tabla de Cotizaciones  -->
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