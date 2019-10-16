<?php
    include "../../view/theme/AdminLTE/Additional/head.php";    
    include "../../model/Conexion.php";
?>
<script type="text/javascript" src ="reportes.js"> </script>
    <div class="content-wrapper">
        <!-- Titulo de la cabecera -->
        <section class="content-header">
            <h1>
                Reportes de inventarios 
                <!-- <small>Blank example to the fixed layout</small> -->
            </h1>
        </section>
        <!-- Fin de la cabecera -->
        <!-- contenido de mi Vista -->
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Productos</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-primary" title="Volver Atras">
                            <i class="fa fa-fw fa-arrow-circle-left"></i>
                        </button>
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
                        $result = $jezoar->execute("select insumonombre, stockinsumo from getInventarioDeProductos('Almacen1');");
                        $count = $jezoar->execute("select count(*) from producto;");
                        
                    ?>
                    <div class="chart-container" style="position: relative; height:80vh; width:80vw">
                        <canvas id="myChart"></canvas>
                            <script>
                            var ctx = document.getElementById('myChart');
                            
                            var myChart = new Chart(ctx, {                                    
                                type: 'bar',                                    
                                data: {
                                    labels:   
                                    ['<?php echo pg_result($result,0,0) ?>', '<?php echo pg_result($result,1,0) ?>', '<?php echo pg_result($result,2,0) ?>', 'Green', 'Purple', 'Orange','Yellow','Red'],
                                    datasets: [{
                                        label: 'Producto Stock',
                                        data: [<?php echo pg_result($result,0,1) ?>, <?php echo pg_result($result,1,1) ?>, <?php echo pg_result($result,2,1) ?>, 5, 2, 3, 8, 4],
                        
                                        backgroundColor: 
                                            'rgba(54, 162, 235, 0.2)',
                                        
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