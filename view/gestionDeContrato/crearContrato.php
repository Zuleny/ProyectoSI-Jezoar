<?php
include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Contrato de servicios para el cliente <?php
            require "../../controller/contratoController.php";
            echo $result=nombreDeCliente($_GET['cod_presentacion']);
            ?>
            <!-- <small>Blank example to the fixed layout</small> -->
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido de mi Vista -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Administracion de Contrato
                    <?php
                        $tieneContrato = tieneContrato($_GET['cod_presentacion']);
                        if (!$tieneContrato) {
                            echo ' <span class="label label-danger">No Existe Contrato</span>';
                        }else{
                            echo ' <span class="label label-success">Contrato Vigente</span>';
                            $listaDeFechas = getFechas($_GET['cod_presentacion']);
                        }
                    ?>
                </h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-primary" onclick="history.back();" title="Volver Atras">
                        <i class="fa fa-fw fa-arrow-circle-left"></i>
                    </button>
                    <a href="../view/index.php" class="btn btn-primary" title="Volver a menu">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->
            <form role="form" action="../../controller/contratoController.php" method="post">
                <!--  Lugar de butons y label y textbox  -->
                <div class="box-body">
                    <div class="col-lg-4">
                        <p>
                            <b>Nota de Advertencia</b><br>
                            usuario <b><?php echo $_SESSION['user'] ?></b>, si la presentacion (Propuesta o Cotización) no tiene contrato, 
                            usted puede generar uno; pero si ya tiene un  contrato usted podra modificar las fechas de inicio y fin si lo desea. 
                            Pero si usted quiere evitar problemas solo presione atras, <b>gracias</b>. 
                        </p>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-block btn-success" onclick="Desactivar();">Fecha Inicial<i class="fa fa-fw fa-check"></i></button>
                        </div>
                        <div class="col-md-6">
                            <button type="button" class="btn btn-block btn-success" onclick="Desactivar1();">Fecha Final<i class="fa fa-fw fa-check"></i></button>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Fecha inicial</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <?php
                                if (!isset($listaDeFechas)) {
                                    echo '<input type="date" class="form-control" name="fecha_inicial">';
                                }else{
                                    echo '<input type="date" class="form-control" id="fechaIC" disabled name="fecha_inicial" value="'.$listaDeFechas[0].'">';
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Fecha final</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <?php
                                if (!isset($listaDeFechas)) {
                                    echo '<input type="date" class="form-control" name="fecha_final">';
                                }else{
                                    echo '<input type="date" class="form-control" id="fechaFC" disabled name="fecha_inicial" value="'.$listaDeFechas[1].'">';
                                }
                            ?>
                        </div>
                    </div>
                    <input type="hidden" name="codPresentacion" value="<?php echo $_GET['cod_presentacion']; ?>">
                    <input type="hidden" name="contratos" value="<?php echo $tieneContrato; ?>">
                    <div class="col-lg-2 pull-right">
                        <br>
                        <button type="submit" name ="cod_presentacion" style="border-radius: 15px;" class="btn btn-block btn-primary">Crear Contrato  <i class="fa fa-fw fa-file-pdf-o"></i></button>
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

<script type="text/javascript">
    function Desactivar(){
        document.getElementById('fechaIC').disabled = !document.getElementById('fechaIC').disabled;
        document.getElementById('fechaIS').disabled = !document.getElementById('fechaIS').disabled;
    }
    function Desactivar1(){
        document.getElementById('fechaFC').disabled = !document.getElementById('fechaFC').disabled;
        document.getElementById('fechaFS').disabled = !document.getElementById('fechaFS').disabled;
    }
</script>