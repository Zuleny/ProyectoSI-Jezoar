<?php
    include "../../view/theme/AdminLTE/Additional/head.php";    
    include "../../model/Conexion.php";
?>
<script type="text/javascript" src ="../../public/assets/reportes.js"> </script>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Reporte de herramientas en almacen
                <!-- <small>Blank example to the fixed layout</small> -->
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido de mi Vista -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Herramienta</h3>
                    <div class="box-tools pull-right">
                        <a href="http://localhost/ProyectoSI-Jezoar" class="btn btn-primary" title="Volver Atras">
                        <span class="glyphicon glyphicon-home"></span></a>
                    </div>
                </div>
                <!-- Inicia tu codigo aqui -->                    
                <div class="box-body">
                    <div class="col-lg-2">                                
                            <button type="button" class="btn btn-block btn-primary" >Exportar PDF <i class="fa fa-fw fa-file-pdf-o "></i></button>
                        </div><br>          <!-- Lugar de butons y label y textbox  -->         
                    </div> 
                    <?php
                        $jezoar = new Conexion();
                        $result = $jezoar->execute("SELECT nombre, stock from getHerramientaStock('Almacen1');");
                        $arreglo = array();
                        $arregloStock = array();
                        for ($i=0; $i < pg_num_rows($result); $i++) { 
                            $arreglo[$i] = pg_result($result,$i,0);
                            $arregloStock[$i] = pg_result($result,$i,1);
                        }
                    ?>
                    <div class="chart-container" style="position: relative; height:80vh; width:80vw">
                        <canvas id="myChart"></canvas>
                            <script>
                            var ctx = document.getElementById('myChart');
                            arregloProductos = <?php echo json_encode($arreglo);?>;
                            arregloStock = <?php echo json_encode($arregloStock);?>;
                            var myChart = new Chart(ctx, {                                    
                                type: 'bar',                                    
                                data: {
                                    labels: arregloProductos,
                                    datasets: [{
                                        data: arregloStock,
                                        backgroundColor: 
                                            'rgba(54, 162, 235, 0.2)',
                                        label: 'Herramienta stock',
                                        borderWidth: 1
                                    }]
                                },  
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }                                    
                            });                                                                        

                        </script>  
                    </div>  

                </div>   
                <!-- Termina tu codigo aqui -->
            </div>
        </section>
        <!-- fin de contenido de mi Vista -->
    </div>
<?php
    include "../../view/theme/AdminLTE/Additional/scripts.php";
?>