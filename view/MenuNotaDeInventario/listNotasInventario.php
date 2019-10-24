<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Notas de Inventarios
                <small>Gestión de Almacén</small>
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido de mi Vista -->
        <section class="content">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Notas de Inventarios</h3>
                    <div class="box-tools pull-right">
                        <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Menú Inicio">
                        <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                </div>
                <br>
                <!-- Inicia tu codigo aqui -->                    
                <div class="box-group">
                    <!-- Boton NOTA INGRESO -->
                    <div class="col-md-3 col-lg-4 col-12">
                        <a href="#">
                            <div class="info-box bg-purple-gradient ">
                                <span class="info-box-icon ">
                                    <i class="fa fa-bookmark-o"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Gestionar Notas</span>
                                    <span class="info-box-text">de Ingreso</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%">
                                        </div>
                                    </div>
                                    <span class="progress-description">
                                        Gestión de Almacén
                                    </span>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- FIN Boton NOTA INGRESO -->
                    <!-- Boton NOTA EGRESO -->
                    <div class="col-md-3 col-lg-4 col-12">
                        <a href="#">
                            <div class="info-box bg-blue-gradient">
                                <span class="info-box-icon ">
                                    <i class="fa fa-bookmark-o"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Gestionar Notas</span>
                                    <span class="info-box-text">de Egreso</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%">
                                        </div>
                                    </div>
                                    <span class="progress-description">
                                        Gestión de Almacén
                                    </span>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- FIN Boton NOTA EGRESO -->
                    <!-- Boton NOTA DEVOLUCION -->
                    <div class="col-md-3 col-lg-4 col-12">
                        <a href="../GestionDeNotasDevolucion/gestionNotasDevolucion.php">
                            <div class="info-box bg-yellow-gradient">
                                <span class="info-box-icon ">
                                    <i class="fa fa-bookmark-o" style="color: black;"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text" style="color: black;">Gestionar Notas</span>
                                    <span class="info-box-text" style="color: black;">de Devolución</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 100%; background-color: black;">
                                        </div>
                                    </div>
                                    <span class="progress-description" style="color: black;">
                                        Gestión de Almacén
                                    </span>
                                    
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- FIN Boton NOTA DEVOLUCION -->
                </div>
                <!-- Fin Codigo Aqui -->
                <div class="box-footer">
                    <a href="https://www.facebook.com/Jezoar-228770924276961/" target="_blank"class="btn btn-block btn-social btn-facebook">
                        <i class="fa fa-facebook"></i>
                        Página de Facebook de Jezoar
                    </a>
                </div>
                <!-- Termina tu codigo aqui -->
            </div>
        </section>
        <!-- fin de contenido de mi Vista -->
    </div>
    <script src="../../public/assets/updateServicio.js"></script>
<?php
    include "../../view/theme/AdminLTE/Additional/scripts.php";
?>