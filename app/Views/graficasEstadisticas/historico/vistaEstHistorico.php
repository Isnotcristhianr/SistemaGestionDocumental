<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="<?php echo base_url('index.php/deHistorico') ?>" class="btn btn-outline-primary">← Volver</a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Historico PUCE-I
            </h2>
            <h4 class="text-center text-dark">Búsqueda: General </h4>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Reporte ↓</h5>
        </div>
    </div>
</div>
<!-- Contenido-->
<div class="container-center m-5 p-1 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div class="container">
        <h4>Reporte</h4>
        <!-- Excel Exportar -->
        <a href="<?php echo base_url('index.php/ControladorReportes/reporteTitulacion') ?>" class="btn btn-success btn-sm">
            <i class="fas fa-file-excel"></i> Exportar a Excel
        </a>
        <!-- Exportar PDF -->
        <a href="<?php echo base_url('index.php/ControladorReportes/reporteTitulacionPDF') ?>" class="btn btn-danger btn-sm">
            <i class="fas fa-file-pdf"></i> Exportar a PDF
        </a>
        <!-- Exportar Img -->
        <a href="<?php echo base_url('index.php/ControladorReportes/reporteTitulacionImg') ?>" class="btn btn-warning btn-sm">
            <i class="fas fa-file-image"></i> Exportar a Imagen
        </a>
        <!-- Imprimir -->
        <a href="<?php echo base_url('index.php/ControladorReportes/reporteTitulacion') ?>" class="btn btn-info btn-sm">
            <i class="fas fa-print"></i> Imprimir
        </a>
    </div>
    <!-- Reporte Estadistico -->
    <canvas id="myChart"></canvas>
    <!-- Script chart -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- grafica -->
    <script>
        //obtener datos de php del controlador
        var datos = <?php echo json_encode($tbl_estadistica_matriz) ?>;

        //preparar los datos para el grafico
        var total = datos.map(dato => dato.ESTM_TOTAL); //eje x
        //eje y
        //logica del periodo
        var periodo = datos.map(dato => dato.ESTM_PERIODO);

        //grafico de barras
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            //tipo de grafico
            type: 'line',
            data: {
                //datos
                labels: periodo,
                datasets: [{
                    label: 'Total de Estudiantes Historico PUCE-I',
                    data: total,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',

                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',

                    ],
                    borderWidth: 1
                }]
            },
            options: {
                //titulo
                title: {
                    display: true,
                    text: 'Total de Graduados por Periodo'
                },
                //animacion
                animation: {
                    duration: 2000,
                    easing: 'easeInOutBounce'
                },
                //leyenda
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        fontColor: '#000'
                    }
                },
                //diseño responsivo
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            fontColor: '#000'
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontColor: '#000'
                        }
                    }]
                }
            }
        });
    </script>
</div>