<?php
    include "../../view/theme/AdminLTE/Additional/head.php";
?>
<!-- the fixed layout is not compatible with sidebar-mini -->
<div class="content-wrapper">
    <!-- Titulo de la cabecera -->
    <section class="content-header">
        <h1>
            Administrar Bitacora
            <small>Gestion de Usuario</small>
        </h1>
    </section>
    <!-- Fin de la cabecera -->
    <!-- contenido -->
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Registro de Actividades</h3>
                <div class="box-tools pull-right">
                    <a href="../../index.php" class="btn btn-primary" title="Menú Inicio">
                    <span class="glyphicon glyphicon-home"></span></a>
                </div>
                <br>
                <form role="form" action="usuarioBitacora.php" method="post">
                    <div class="box-body">
                        <br>
                        <div class="col-lg-4">
                            <p>
                                <b><?php echo $_SESSION['user'] ?></b>, en esta parte del sistema 
                                se visualiza las actividades que se realizaron por parte de 
                                todos los usuarios en general, incluyendote, <br>
                                asi que mucho cuidado XD
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <label>Nombre Personal</label>
                            <select class="form-control" name="nombreUser" >
                                <?php
                                    require "../../controller/usuarioController.php";
                                    $result = getUsuarios();
                                    $nroFilas = pg_num_rows($result);
                                    for ($tupla=0; $tupla < $nroFilas; $tupla++) { 
                                        echo '<option value="'.pg_result($result,$tupla,1).'">'.pg_result($result,$tupla,1).'</option>';
                                    } 
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-4" >
                            <button type="submit" class="btn btn-block btn-success" style="border-radius: 15px;" id="button1" title="Verificar">
                                Visualizar Actividades <i class="fa fa-fw fa-spinner fa-spin"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Tabla de Actividades en el Sistema Jezoar</h3>
                </div>
                <div class="box-body"  >
                    <table class="table table-bordered table-hover" id="tabla1">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Usuario </th>
                                <th> Descripción </th>
                                <th> Hora-Fecha </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $result = getListaBitacora();
                                $countRows = pg_num_rows($result);
                                for ($tupla=0; $tupla < $countRows ; $tupla++) { 
                                    echo '<tr>';
                                    echo    '<td>'.pg_result($result,$tupla,0).'</td>';
                                    echo    '<td>'.pg_result($result,$tupla,1).'</td>';
                                    echo    '<td>'.pg_result($result,$tupla,2).'</td>';
                                    echo    '<td>'.date('d F Y H:i:s',strtotime(pg_result($result,$tupla,3))).'</td>';
                                    echo '</tr>';
                                }             
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div>
                <a href="https://www.facebook.com/Jezoar-228770924276961/" target="_blank"class="btn btn-block btn-social btn-facebook">
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