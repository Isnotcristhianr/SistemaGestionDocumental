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
        <!-- ENVIAR IMG A CORREO -->
        <a href="<?php echo base_url('index.php/ControladorReportes/reporteTitulacionImg') ?>" class="btn btn-secondary btn-sm">
            <i class="fas fa-envelope"></i> Enviar a Correo
        </a>
    </div>
    <!-- Reporte Estadistico -->
    <canvas id="myChart"></canvas>
    <!-- Grafica -->
    <!-- Script HighChart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- Logica Grafica -->
    <script>
        
    </script>
</div>