<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Herramientas
            <!-- <small>Blank example to the fixed layout</small> -->
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Gestion de Herramientas</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-primary" title="Volver Atras">
                    <i class="fa fa-fw fa-arrow-circle-left"></i></button>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->                    
            <form role="form">
                <!--  Lugar de butons y label y textbox  -->
                <div class="box-body">
                    <div class="col-lg-3">
                        <label>Codigo Insumo</label>
                        <input type="text" class="form-control" placeholder="Codigo">
                    </div>
                    <div class="col-lg-4">
                        <label>Nombre</label>
                        <input type="text" class="form-control" placeholder="Nombre del insumo">
                    </div>
                </div>
                <div class="box-body">
                    <div class="col-lg-12">
                        <label>Descripcion</label>
                        <textarea id="descripcion" class="form-control" rows="3">
                        </textarea>                                     
                        <br>
                    </div>
                
                    <div class="custom-control custom-radio">
                        <label>Estado:</label>
                    <br>
                        <input type="radio" class="custom-control-input" id="RBTN1"
                            name="estado">
                        <label class="custom-control-label" for="defaultGroupExample1">Mantenimiento</label>
                    </div>
            
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="RBTN2"
                            name="estado">
                        <label class="custom-control-label" for="defaultGroupExample2">Disponible</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="RBTN3"
                            name="estado">
                        <label class="custom-control-label" for="defaultGroupExample3">No Disponible</label>
                    </div>

                    <div class="col-lg-4">
                        <br>
                        <button type="button" class="btn btn-block btn-success" title="Agregar Herramienta">Agregar Registro <i class="fa fa-fw fa-check"></i></button>
                    </div>
                </div>

                <!--  Lugar de butons y label y textbox  -->
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Herramientas</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Cod Insumo</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th>Actualizar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include "../../model/Conexion.php";
                                    $conexion=new Conexion("localhost",5432,"jezoar","jezoar","123456");
                                    $result=$conexion->execute("SELECT insumo.cod_insumo,insumo.nombre,insumo.descripcion,herramienta.estado from herramienta,insumo where insumo.cod_insumo=herramienta.cod_insumo_herramienta;");
                                    if (!$result) {
                                        die("Error en la consulta");
                                    }
                                    $nroFilas=pg_num_rows($result);
                                    if ($nroFilas>0) {
                                        for ($nroTupla=0; $nroTupla < $nroFilas; $nroTupla++){ 
                                            echo "<tr> <td>". pg_result($result,$nroTupla,0)."</td>";
                                            echo "<td>". pg_result($result,$nroTupla,1)."</td>";
                                            echo "<td>". pg_result($result,$nroTupla,2)."</td>";
                                            echo "<td>". pg_result($result,$nroTupla,3)."</td>";
                                            echo '<td>  <div class="btn-group">
                                                            <button type="button" class="btn btn-warning btn-sm" title="Actualizar">
                                                                <i class="fa fa-fw fa-refresh"></i>
                                                            </button>
                                                        </div></td> </tr>';
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
            <div>
                <a href="hola" class="btn btn-block btn-social btn-facebook">
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