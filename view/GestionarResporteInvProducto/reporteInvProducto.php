<?php
    include "../../view/theme/AdminLTE/Additional/head.php";    
    include "Conexion.php";
?>
<script src =" https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"> </script>
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
                <form role="form" action="../../controller/servicioController.php" method="post">
                    <!--  Lugar de butons y label y textbox  -->
                    
                    <div class="box-body">
                        <div class="col-lg-2">                                
                                <button type="button" class="btn btn-block btn-primary" >Exportar PDF<i class="fa fa-fw fa-file-pdf-o "></i></button>
                            </div><br>                   
                        </div> 
                        /* while($row=sql_fetch) <?php ?> */
                        <div class="chart-container" style="position: relative; height:80vh; width:80vw">
                         <canvas id="myChart"></canvas>
                                <script>
                                var ctx = document.getElementById('myChart');
                                var myChart = new Chart(ctx, {                                    
                                    type: 'bar',                                    
                                    data: {
                                       
                                        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                        datasets: [{
                                            label: '# of Votes',
                                            data: [12, 19, 3, 5, 2, 3],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            
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
           
                    
                    <!--  Lugar de butons y label y textbox  -->
                    
                </form>
              
                <!-- Termina tu codigo aqui -->
            </div>
        </section>
        <!-- fin de contenido de mi Vista -->
    </div>
<?php
    include "../../view/theme/AdminLTE/Additional/scripts.php";
?>