<?php
    include_once "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Nota de Egreso
            <small>Gestion de Almacen</small> 
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido de mi Vista -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Gestionar Nota de Egreso</h3>
                <div class="box-tools pull-right">
                    <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Menú Inicio">
                    <span class="glyphicon glyphicon-home"></span></a>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->                    
            <form role="form" action="../../controller/NotasController/notaEgresoController.php" method="post">
                <div class="box-body">
                    <div class="col-lg-4">
                        <label>Nombre Personal Recibe</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="personalEgreso">
                            <?php 
                                require '../../controller/NotasController/notaEgresoController.php';
                                $resultado = getNombresDePersonal();
                                $nroFilas = pg_num_rows($resultado);
                                for ($fila=0; $fila < $nroFilas; $fila++) { 
                                    echo '<option value="'.pg_result($resultado,$fila,0).'">'.pg_result($resultado,$fila,0).'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label>Fecha de Devolución</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="date" class="form-control pull-right" name="fechaEgreso">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label>Almacen Perteneciente</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="almacenEgreso">
                            <?php 
                                $resultado = getNombreAlmacenes();
                                $nroFilas = pg_num_rows($resultado);
                                for ($fila=0; $fila < $nroFilas; $fila++) { 
                                    echo '<option value="'.pg_result($resultado,$fila,0).'">'.pg_result($resultado,$fila,0).'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-block btn-success" title="Agregar ">Crear Nota de Egreso   
                            <i class="fa fa-fw fa-file-o"></i>
                        </button>
                    </div>
                </div>
            </form>
            <!--  Lugar de la Table  -->
            <form action="" method="get">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Lista de Notas de Egreso Registradas</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover" id="tabla1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Personal</th>
                                    <th>fecha</th>
                                    <th>Almacen</th>
                                    <th>Tipo de Nota</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $resultado = getListaNotasDevolucion();
                                    $nroFilas = pg_num_rows($resultado);
                                    for ($fila=0; $fila < $nroFilas; $fila++) { 
                                        if (pg_result($resultado,$fila,4) == 'E') {
                                            echo "<tr>
                                                    <td>".pg_result($resultado,$fila,0)."</td>";
                                            echo   "<td>".pg_result($resultado,$fila,1)."</td>";
                                            echo   "<td>". date('d F Y',strtotime(pg_result($resultado,$fila,2))) ."</td>";
                                            echo   "<td>".pg_result($resultado,$fila,3)."</td>";
                                            echo "<td> Egreso </td>";
                                            echo '<td> 
                                                    <div class="btn-group">
                                                        <a href="gestionDetalleNotaEgreso.php?nroNotaDetalle='.pg_result($resultado,$fila,0).'">
                                                            <button type="button" class="btn btn-xs bg-light-blue btn-sm" title="Asignar Insumos">
                                                                <i class="fa fa-fw fa-cubes"></i>
                                                            </button>
                                                        </a>
                                                        <a href="../../controller/NotasController/notaEgresoController.php?nota='.pg_result($resultado,$fila,0).'">
                                                            <button type="button" class="btn bg-red btn-xs" title="Eliminar Nota">
                                                                <i class="fa fa-fw fa-trash-o"></i>
                                                            </button>
                                                        </a>
                                                    </div>
                                                </td>';
                                            echo "</tr>";
                                        }
                                    }
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
    <!-- fin de contenido de mi Vista -->
</div>
<?php
    include "../../view/theme/AdminLTE/Additional/scripts.php";
?>