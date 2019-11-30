<?php
include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Gestionar contratos
            <!-- <small>Blank example to the fixed layout</small> -->
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido de mi Vista -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"></h3>
                <div class="box-tools pull-right">

                    <button type="button" class="btn btn-primary" title="Volver Atras">
                        <i class="fa fa-fw fa-arrow-circle-left"></i>
                    </button>

                    <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                        <span class="glyphicon glyphicon-home"></span></a>

                </div>
            </div>
            <!-- Inicia tu codigo aqui -->
            <form role="form" action="../../controller/contratoController.php" method="post">
                <!--  Lugar de butons y label y textbox  -->

                <div class="box-body">
                    <div class="col-lg-4">
                        <label>Nombre de cliente</label>
                        <select class="form-control" name="nombreCliente" >
                            <?php
                            require "../../controller/contratoController.php";
                            $lista=getClienteContrato();
                            echo $lista;
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label>Fecha inicial</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" class="form-control" name="fecha_inicial">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Fecha final</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" class="form-control" name="fecha_final">
                        </div>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-lg-2">
                        <br>
                        <button type="submit" name ="verPresentacion" style="border-radius: 15px;" class="btn btn-block btn-primary">Guardar contrato  <i class="fa fa-fw fa-save"></i></button>
                    </div>
                </div>
            </form>

        </div>
    </section>



    <!-- Termina tu codigo aqui -->
</div>
<!-- fin de contenido de mi Vista -->
</div>



<?php
include "../../view/theme/AdminLTE/Additional/scripts.php";
?>
<script>

</script>
