<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Nota de Devolución
                <small>Gestion de Almacén</small>
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido de mi Vista -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Detalle de Nota Nro: 
                        <b><?php echo $_GET['nroNotaDetalle']; ?></b>
                    </h3>
                    <div class="box-tools pull-right">
                        <a href="gestionNotasDevolucion.php" class="btn btn-primary" title="Volver Atras">
                        <span class="fa fa-fw fa-mail-reply"></span></a>
                        <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Menú Inicial">
                        <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                </div>
                <!-- Inicia tu codigo aqui -->                    
                <form role="form" action="../../controller/detalleNotaDevolucionController.php" method="post">
                    <!--  Lugar de butons y label y textbox  -->
                    <div class="box-body">
                        <div class="col-lg-5">
                            <label>Insumo</label>
                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true" name="nombreInsumo">
                            <?php 
                                include '../../controller/detalleNotaDevolucionController.php';
                                $resultado = getListaInsumosAAgregar($_GET['nroNotaDetalle']);
                                $nroFilas = pg_num_rows($resultado);
                                for ($fila=0; $fila < $nroFilas; $fila++) { 
                                    echo '<option value="'.pg_result($resultado,$fila,0).'">'.pg_result($resultado,$fila,0).'</option>';
                                }
                            ?>
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label>Cantidad a Devolver</label>
                            <input type="number" class="form-control" placeholder="Cantidad Insumo" name="stock">
                        </div>
                        <div class="col-lg-3">
                            <input type="hidden" name="nroNota" value="<?php echo $_GET['nroNotaDetalle']?>">
                            <br>
                            <button type="submit" style="border-radius: 15px;" class="btn btn-block btn-success" title="Agregar Servicio">Agregar a la Lista
                                <i class="fa fa-fw fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </form>
                    <div class="box box-success">
                        <div class="box-header">
                            <h3 class="box-title">Lista de Insumos</h3>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered table-hover" id="tabla1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Insumo</th>
                                        <th>Cantidad a Devolver</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $resultado = getListaInsumosDeDetalle($_GET['nroNotaDetalle']);
                                        $nroFilas = pg_num_rows($resultado);
                                        for ($fila=0; $fila < $nroFilas; $fila++) { 
                                            echo "<tr>
                                                    <td>".pg_result($resultado,$fila,0)."</td>";
                                            echo   "<td>".pg_result($resultado,$fila,1)."</td>";
                                            echo   "<td>".pg_result($resultado,$fila,2)."</td>";
                                            echo   '<td> 
                                                        <a href="../../controller/detalleNotaDevolucionController.php?nroNotaDetalle='.$_GET['nroNotaDetalle'].'&idDetalle='.pg_result($resultado,$fila,0).'">
                                                            <div class="btn-group">
                                                                <button type="submit" class="btn bg-red btn-xs" title="Eliminar detalle">
                                                                    <i class="fa fa-fw fa-trash-o"></i>
                                                                </button>
                                                            </div>
                                                        </a>
                                                    </td>';
                                            echo "</tr>";
                                        }
                                    ?>
                                </tbody>
                                <!-- Sub-Form Modal -->
                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title">Modificacion de Servicio</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>#</label>
                                                    <input type="text" class="form-control" placeholder="Nombre del Servicio" name="nombreServicioModifcar">
                                                    <br>
                                                    <label>Nombre</label>
                                                    <input type="text" class="form-control" placeholder="Nombre del Servicio" name="nombreServicioModifcar">
                                                    <br>
                                                    <label>Descripcion</label>
                                                    <input type="text" class="form-control" placeholder="Descripcion del Servicio" name="descripcionServicioModifcar">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-primary">Guardar Modificacion</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                <!-- /.modal-dialog -->
                                </div>
                                <!-- Sub-Form Modal Ended -->
                            </table>
                        </div>
                    </div>
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