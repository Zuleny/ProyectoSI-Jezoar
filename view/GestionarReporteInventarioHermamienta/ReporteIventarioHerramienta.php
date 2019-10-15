<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Reportes de inventarios 
                <!-- <small>Blank example to the fixed layout</small> -->
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido de mi Vista -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Herramientas</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-primary" title="Volver Atras">
                            <i class="fa fa-fw fa-arrow-circle-left"></i>
                        </button>
                    </div>
                </div>
                <!-- Inicia tu codigo aqui -->                    
                <form role="form" action="../../controller/servicioController.php" method="post">
                    <!--  Lugar de butons y label y textbox  -->
                    <div class="box-body">
                        <div class="col-lg-3">                                
                                <button type="button" class="btn btn-block btn-primary" >Mostrar herramientas disponibles <i class="fa fa-fw fa-check-square-o"></i></button>
                            </div>
                            <div class="col-lg-3">                                
                                    <button type="button" class="btn btn-block btn-primary">Mostrar herramientas ocupadas <i class="fa fa-fw fa-ban"></i></button>
                            </div>
                            <div class="col-lg-3">                                
                                    <button type="button" class="btn btn-block btn-primary">Mostrar herramientas en mantenimiento <i class="fa fa-fw fa-cog"></i></button>
                            </div>
                            
                        </div> 
                    </div>
                    
                    <!--  Lugar de butons y label y textbox  -->
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Lista de las herramientas</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Cod herramienta</th>
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require '../../controller/herramientaController.php';
                                        $printer=getListaHerramientas();
                                        echo $printer;
                                    ?>
                                </tbody>
                            </table>
                        </".>
                    </div>
                </form>
              
                <!-- Termina tu codigo aqui -->
            </div>
        </section>
        <!-- fin de contenido de mi Vista -->
    </div>
<?php
    include "../../view/theme/AdminLTE/Additional/scripts.php";
?>
<script>
    
</script>