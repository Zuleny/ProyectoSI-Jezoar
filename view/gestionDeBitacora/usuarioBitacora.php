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
                <h3 class="box-title">Registro de Actividades del usuario(a) <b><? echo $_POST['nombreUser'];?> </b> </h3>
                <div class="box-tools pull-right">
                    <a href="administrarBitacora.php" class="btn btn-primary" title="Volver a Adm. Bitacora">
                    <span class="fa fa-fw fa-mail-reply"></span></a>
                    <a href="../../index.php" class="btn btn-primary" title="Menú Inicio">
                    <span class="glyphicon glyphicon-home"></span></a>
                </div>
            </div>
            <div class="box-group">
                <div class="box-header">
                    <h3 class="box-title">Tabla de Actividades</h3>
                </div>
                <div class="table-responsive col-sm-12">
                    <br>
                    <p>Actividades registradas por el usuario: <? echo $_POST['nombreUser']; ?></p>
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
                                require "../../controller/usuarioController.php";
                                $result = getActividadesUsuarioBitacora($_POST['nombreUser']);
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
</body>