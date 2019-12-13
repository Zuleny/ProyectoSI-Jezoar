<?php
include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Contratos registrados
            <!-- <small>Blank example to the fixed layout</small> -->
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido de mi Vista -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Administrar Contrato</h3>
                <div class="box-tools pull-right">
                    <a href="../../index.php" class="btn btn-primary" title="Volver a menu">
                        <span class="glyphicon glyphicon-home"></span></a>

                </div>
            </div>
            <!-- Inicia tu codigo aqui -->
            <div class="box-body">
                <table class="table table-bordered table-hover" id="tabla1">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Fecha Inicial</th>
                        <th>Fecha Final</th>
                        <th>Tipo</th>
                        <th>Codigo Presentacion</th>
                        <th>Acciones </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require "../../controller/contratoController.php";
                    $resultado = getListaContratos();
                    $nroFilas = pg_num_rows($resultado);
                    for ($fila=0; $fila < $nroFilas; $fila++) {
                        // if (pg_result($resultado,$fila,4) == 'C') {
                        echo "<tr><td>".pg_result($resultado,$fila,0)."</td>";
                        echo   "<td>".pg_result($resultado,$fila,1)."</td>";
                        echo   "<td>".pg_result($resultado,$fila,2) ."</td>";
                        echo   "<td>".pg_result($resultado,$fila,4) ."</td>";
                        echo   "<td>".pg_result($resultado,$fila,5) ."</td>";
                        if (pg_result($resultado,$fila,3) == 'P') {
                            echo   "<td> Propuesta</td>";
                        }
                        if (pg_result($resultado,$fila,3) == 'C') {
                            echo   "<td> Cotizacion</td>";
                        }
                        echo   "<td>".pg_result($resultado,$fila,6) ."</td>";
                        echo '<td> 
                                                    <div class="btn-group">                                                        
                                                        <a href="editarcontrato.php?codigo_contrato='.pg_result($resultado,0,0).'">
                                                            <button type="button" class="btn bg-purple btn-xs" title="Editar contrato">
                                                                <i class="fa fa-fw fa-edit"></i>
                                                            </button>
                                                        </a>
                                                        <a href="../../controller/contratoController.php?codigo_contrato_Eliminar='.pg_result($resultado,0,0).'">
                                                            <button type="button" class="btn bg-red btn-xs" title="Eliminar contrato">
                                                                <i class="fa fa-fw fa-trash-o"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>';
                        echo "</tr>";
                        //}
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class = col-lg-10 >
                <h4>Desea registrar un contrato? </h4>

                <a href="../../view/gestionDeCotizacion/gestionCotizacion.php" id="etiqueta2">Ir a Cotizacion</a><br>

                <div class="col-md-3">
                    <a href="../../view/gestionDePropuesta/gestionPropuesta.php"  id="etiqueta1">           .  Ir a Propuesta </a>
                </div>
            </div>
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