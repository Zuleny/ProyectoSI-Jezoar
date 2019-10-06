<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Categoria de Productos
            <!-- <small>Blank example to the fixed layout</small> -->
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido de mi Vista -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Gestion de Categoria de Productos</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-primary" title="Volver Atras">
                        <i class="fa fa-fw fa-arrow-circle-left"></i>
                    </button>
                </div>
            </div>
            <!-- Inicia tu codigo aqui -->                    
            <form role="form" action="../../controller/categoriaController.php" method="post">
                <!--  Lugar de butons y label y textbox  -->
                <div class="box-body">
                    <div class="col-lg-3">
                        <label>Codigo de Categoria</label>
                        <input type="number" class="form-control" placeholder="cod_product" name="id_servicio">
                    </div>
                    <div class="col-lg-6">
                        <label>Nombre del Categoria</label>
                        <input type="text" class="form-control" placeholder="Limpieza general de oficinas" name="nombre_categor">
                    </div>
                    <div class="col-lg-3">
                        <br>
                        <button type="submit" class="btn btn-block btn-success" title="Agregar Servicio">Crear Categoria
                            <i class="fa fa-fw fa-check"></i>
                        </button>
                    </div>
                </div>
                <!--  Lugar de butons y label y textbox  -->
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Categoria de Productos de la Empresa Jezoar</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Codigo de Categoria</th>
                                    <th>Nombre de Categoria</th>
                                    <th>Modificadores</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    include "../../model/Conexion.php";
                                    $conexion=new Conexion();
                                    $result=$conexion->execute("SELECT cod_categoria,nombre from categoria;");
                                    if (!$result) {
                                        die("Error en la consulta");
                                    }
                                    $nroFilas=pg_num_rows($result);
                                    if ($nroFilas>0) {
                                        for ($nroTupla=0; $nroTupla < $nroFilas; $nroTupla++){ 
                                            echo "<tr><td>".'<div contentEditable="false">'. pg_result($result,$nroTupla,0)."</div></td>";
                                            echo "<td>".'<div contentEditable="false">'.pg_result($result,$nroTupla,1)."</div> </td>";
                                            echo '<td> 
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-warning btn-sm" title="Actualizar">
                                                            <i class="fa fa-fw fa-refresh"></i>
                                                        </button>
                                                        <button type="button" class="btn bg-purple  btn-sm" title="Editar">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    </div>
                                                  </td> 
                                                </tr>';
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </".>
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