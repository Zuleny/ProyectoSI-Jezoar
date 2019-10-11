<?php
    require "../../view/theme/AdminLTE/Additional/head.php";
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
                    <form role="form">
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box-body">
                            <div class="col-lg-6">
                                <label>Codigo Presentación</label>
                                <input type="text" class="form-control" placeholder="Ingrese Número">
                            </div>
                            <div class="col-lg-6">
                                <label>Fecha</label>
                                <input type="text" class="form-control" placeholder="Ingrese Fecha">
                            </div>
                        </div>
                        <label>Estado</label>
                        <!--RadioGroup-->
                        <!-- Group of default radios - option 1 -->
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="defaultGroupExample1"
                                name="groupOfDefaultRadios">
                            <label class="custom-control-label" for="defaultGroupExample1">Aceptado</label>
                        </div>
                        <!-- Group of default radios - option 2 -->
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="defaultGroupExample2"
                                name="groupOfDefaultRadios">
                            <label class="custom-control-label" for="defaultGroupExample2">Espera</label>
                        </div>
                        <!-- Group of default radios - option 3 -->
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="defaultGroupExample3"
                            name="groupOfDefaultRadios">
                            <label class="custom-control-label" for="defaultGroupExample3">Denegado</label>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-4">
                                <label>Precio Total</label>
                                <input type="text" class="form-control" placeholder="Ingrese Precio">
                            </div>
                        </div>
                        <div class="box-body">
                                <div class="col-lg-4">
                                    <label>Codigo Cliente</label>
                                    <input type="text" class="form-control" placeholder="Ingrese Codigo">
                                </div>
                        </div>
                        <div class="box-body">
                            <div class="col-lg-4">
                                <label>Cantidad de Dias</label>
                                <input type="text" class="form-control" placeholder="Ingrese Cantidad">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="option">   Tipo de Servicio</label>
                            <select class="form-control" name="" id="option">
                                <option value="">Limpieza Profunda</option>
                                <option value="">Limpieza Post-Obra</option>
                                <option value="">Limpieza de Oficinas</option>
                            </select>
                        </div>
                        <div class="box-body">
                            <div class="row-center">
                                <div class="col-lg-4">
                                    <br>
                                    <button type="button" class="btn btn-block btn-success" title="Agregar Cotizacion">Agregar Registro 
                                        <i class="fa fa-fw fa-check"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Termina tu codigo aqui -->
                </div>
            </section>
        </div>
<?php
    require "../../view/theme/AdminLTE/Additional/scripts.php";
?>