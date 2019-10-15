<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
        <div class="content-wrapper">
            <!-- Titulo de la cabecera -->
            <section class="content-header">
                <h1>
                    Cotización
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
            </section>
            <!-- Fin de la cabecera -->
            <!-- contenido -->
            <section class="content">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Gestionar Cotización</h3>
                        <div class="box-tools pull-right">
                            <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                        </div>
                    </div>
                   <!-- Inicia tu codigo aqui -->                    
                    <form role="form" action="../../controller/cotizacionController.php" method="post">
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box-body">
                            <div class="col-lg-4">
                                <label>Fecha</label>
                                <input type="text" class="form-control" placeholder="Ingrese Fecha" name="fecha">
                            </div>
                            <div class="col-lg-4">
                                <label>Precio Total</label>
                                <input type="text" class="form-control" placeholder="Ingrese Precio" name="precio">
                            </div>
                            <div class="col-lg-4">
                                <label>Cantidad de Dias</label>
                                <input type="text" class="form-control" placeholder="Ingrese Cantidad" name="dias">
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="col-lg-5">
                                <label>Estado</label>
                                <br>
                                    <p><input type="radio" name="estadoP" value="Aceptado">Aceptado</p>
                                    <p><input type="radio" name="estadoP" value="Espera">Espera</p>
                                    <p><input type="radio" name="estadoP" value="Denegado">Denegado</p>    
                            </div>
                            <div class="col-lg-5">
                                <label>Material</label>
                                <br>
                                    <p><input type="radio" name="estadoM" value="C">C/Material</p>
                                    <p><input type="radio" name="estadoM" value="S">S/Material</p>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-3">
                                <label for="option">Tipo de Servicio</label>
                                <select class="form-control" name="Servicio">
                                    <option value="Limpieza Profunda">Limpieza Profunda</option>
                                    <option value="Limpieza Post-Obra">Limpieza Post-Obra</option>
                                    <option value="Limpieza de Oficinas">Limpieza de Oficinas</option>
                                </select>
                            </div>
                            <div class="col-lg-5">
                                <label>Nombre Cliente</label>
                                <select class="form-control" name="nombreCliente" >
                                    <?php
                                     require "../../controller/cotizacionController.php";
                                     $lista=getListaCliente();
                                     echo $lista;
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-3">
                            <br>
                                <button type="submit" value="Agregar Cotizacion" class="btn btn-block btn-success" title="Agregar Cotizacion">Agregar Registro <i class="fa fa-fw fa-check"></i></button>
                            </div>
                        </div>
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box box-success">
                            <div class="box-header">
                                <h3 class="box-title">Lista de Cotizaciones</h3>
                            </div>
                            <div class="box-body" style="overflow:scroll">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Fecha</th>
                                            <th>Estado</th>
                                            <th>Precio</th>
                                            <th>Cliente</th>
                                            <th>Cant_Dias</th>
                                            <th>Tipo Servicio</th>
                                            <th>Material</th>
                                            <th>Actualizar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            require "../../controller/cotizacionController.php";
                                            $lista=getListaDeCotizaciones();
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
<?php
    include "../../view/theme/AdminLTE/Additional/scripts.php";
?>