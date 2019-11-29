<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>Error en el Sistema Jezoar</h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido de mi Vista -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Error !Ups¡</h3>
                <div class="box-tools pull-right">
                    <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Menou Inicio">
                    <span class="glyphicon glyphicon-home"></span></a>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->                    
            <section class="content">
                <div class="error-page">
                    <h6 class="headline text-yellow"> Error </h6>
                    <div class="error-content">
                        <h3>
                            <i class="fa fa-warning text-yellow"></i> Ups! Transcurrió un error al realizar una actividad en el sistema <b>Jezoar :c </b>.
                        </h3>
                        <p>
                            Puede haber ocurrido por : <br>
                            <?php 
                                if (isset($_GET['errorMessage'])) {
                                    echo '* '.$_GET['errorMessage'];
                                }
                                echo '<br>* Talves ocurrio al registrar datos inconsistentes, tenga cuidado.<br>
                                        * Algun fallo en relacion al proceso que estaba realizando, si es eso, por favor comuniquese con los desarrolladores. <b>Tome en cuenta que ellos estan aprendiendo. :3</b>  
                                        <a href="../../">Retornar al Inicio</a>';
                            ?>
                        </p>
                    </div>
                    <!-- /.error-content -->
                </div>
                <!-- /.error-page -->
            </section>
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
<?php
    include "../../view/theme/AdminLTE/Additional/scripts.php";
?>