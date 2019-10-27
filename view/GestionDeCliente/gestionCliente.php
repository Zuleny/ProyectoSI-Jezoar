<!DOCTYPE html>
<html>
<head>
    <?php
        include "../../view/theme/AdminLTE/Additional/head.php";
    ?>
</head>
<!-- the fixed layout is not compatible with sidebar-mini -->
<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">
        <?php
            include "../../view/theme/AdminLTE/Additional/header.php";
            include "../../view/theme/AdminLTE/Additional/aside.php";
        ?>
        <div class="content-wrapper">
            <!-- Titulo de la cabecera -->
            <section class="content-header">
                <h1>
                    Cliente
                    <!-- <small>Blank example to the fixed layout</small> -->
                </h1>
            </section>
            <!-- Fin de la cabecera -->
            <!-- contenido -->
            <section class="content">
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title">Gestion de Clientes</h3>
                        <div class="box-tools pull-right">
                            <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                            <span class="glyphicon glyphicon-home"></span></a>
                        </div>s
                    </div>
                   <!-- Inicia tu codigo aqui -->                    
                    <form role="form" action="../../controller/clienteController.php" method="post" >
                        <!--  Lugar de butons y label y textbox  -->

                        <div class="box-body">
                            <div class="col-lg-4">
                                <label>Nombre del cliente</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name = "nombre_cliente" class="form-control" >
                                </div>        
                            </div>
                            <div class="col-lg-2">
                                <label>Telefono del cliente</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name = "telefono_cliente"class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <label>Telefono del cliente(2)</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-phone fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name = "telefono2_cliente" class="form-control">
                                </div>
                            </div> 
                        </div>
                        <div class="box-body">
                            <div class="col-lg-4">
                                <label>Correo electronico</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name ="correo_cliente"class="form-control" >
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <label>Nit / C.I.</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-id-card-o fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control"name ="nit_cliente" placeholder="CI, solo si es persona">
                                </div>
                            </div>
                            
                        </div>
                        <div class="box-body">
                        <div class="col-lg-5">
                                <label>Direccion</label>
                                <div class="input-group margin-bottom-sm"> 
                                    <span class="input-group-addon"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i></span>
                                        <input type="text" name="direccion_cliente" class="form-control" >
                                </div>
                            </div>  
                            <div class="col-lg-3">  
                            <label>Tipo de cliente:</label>
                                <p><input type="radio" name="tipo" value="P">Persona</p>
                                <p><input type="radio" name="tipo" value="E">Empresa</p>
                            </div> 
                            <div class="col-lg-1"></div> 
                            <div class="col-lg-3"> 
                                <br><br>                              
                                <button type="submit" name ="agregar_cliente" class="btn btn-block btn-success" style="border-radius: 15px;" title="Agregar Servicio">Agregar cliente <i class="fa fa-fw fa-user-plus"></i></button>
                            </div>
                        </div>                
                    </div>  
                        <!--  Lugar de butons y label y textbox  -->
                        <div class="box box-info">
                            <div class="box-header">
                                <h3 class="box-title">Clientes de la Empresa Jezoar</h3>
                            </div>
                            <div class="box-body">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Cod Cliente</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th>Direccion</th>
                                            <th>Telefono</th>
                                            <th>Tipo</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include "../../model/Conexion.php";
                                            $conexion=new Conexion("localhost",5432,"jezoar","jezoar","123456");
                                            $result=$conexion->execute("SELECT cliente.cod_cliente,cliente.nombre,cliente.email, cliente.direccion, telefono.telefono, cliente.tipo 
                                                from cliente, telefono
                                                where cliente.cod_cliente=telefono.cod_cliente_telefono 
                                                order by cliente.cod_cliente");
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
                                                    echo "<td>". pg_result($result,$nroTupla,4)."</td>";                                                    
                                                    echo "<td>". pg_result($result,$nroTupla,5)."</td>";  
                                                    //echo "<td>". pg_result($result,$nroTupla,6)."</td>"; 
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
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
    </div>
    <?php
        include "../../view/theme/AdminLTE/Additional/scripts.php";
    ?>
</body>