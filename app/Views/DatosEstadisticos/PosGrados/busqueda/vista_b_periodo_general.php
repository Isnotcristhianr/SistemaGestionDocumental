<!-- Datos Estadisticos -->


<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <a href="http://localhost/SistemaGestionDocumental/index.php/FiltroEstadisticoPosgradoBusqueda/Posgrado/Periodo" class="btn btn-outline-primary">← Volver</a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Posgrado
            </h2>
            <h4 class="text-center text-dark">Búsqueda: Periodo
            </h4>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary"> Graduados - Matriculados </h5>
        </div>
    </div>

    <!-- Contenido-->
    <h3 class="text text-start text-success">Oferta Académica Vigente</h3>
    <br>
    <table class="table table-success align-middle order-column hover row-border stripe " id="">
        <thead>
            <th hidden>ID</th>
            <th>Año</th>
            <th>Periodo</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <!-- llenar toda la tabla con fecha de año actual-->
            <?php
            foreach ($tbl_periodo as $periodo) {
                if (
                    /* Logica obtener ultimo periodo
                    1. ultimo id
                    2. debe pertenecer al año actual
                    3. debe estar activo
                    */
                    $periodo['PER_ID'] == $tbl_periodo[0]['PER_ID'] && $periodo['PER_ANO'] == date('Y') && $periodo['PER_ULTIMO'] == 1
                ) {

            ?>
                    <tr>
                        <td hidden><?php echo $periodo['PER_ID']; ?></td>
                        <td><?php echo $periodo['PER_ANO']; ?></td>
                        <td><?php echo $periodo['PER_PERIODO']; ?></td>
                        <!-- Capturar id -->
                        <td>
                            <a href="<?php echo base_url('index.php/ReportePosgradoPeriodoGeneral/' . $periodo['PER_ID']) ?>" class="btn btn-success">Datos →</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <h3 class="text text-start text-primary">Oferta Académica Histórico</h3>
    <br>
    <!-- Llenar tabla con no ativas -->
    <table class="table table-primary align-middle order-column hover row-border stripe " id="tbl2">
        <thead>
            <th hidden>ID</th>
            <th>Año</th>
            <th>Periodo</th>
            <th>Acciones</th>
        </thead>
        <tbody>

            <!-- llenar toda la tabla sin contar el año actual-->
            <?php
            foreach ($tbl_periodo as $periodo) {
                if ($periodo['PER_ANO'] != date('Y')) {
            ?>
                    <tr>
                        <td hidden><?php echo $periodo['PER_ID']; ?></td>
                        <td><?php echo $periodo['PER_ANO']; ?></td>
                        <td><?php echo $periodo['PER_PERIODO']; ?></td>
                        <!-- Capturar id -->
                        <td>
                            <a href="<?php echo base_url('index.php/ReportePosgradoPeriodoGeneral/' . $periodo['PER_ID']) ?>" class="btn btn-primary">Datos →</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>