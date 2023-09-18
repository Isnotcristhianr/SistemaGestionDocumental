<!-- Datos Estadisticos -->

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="<?php echo base_url('index.php/FiltroEstadisticoPosgradoBusqueda/Posgrado/Escuela') ?>" class="btn btn-outline-primary">← Volver</a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Posgrados
            </h2>
            <h4 class="text-center text-dark">Búsqueda: Escuela</h4>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Graduados ↓</h5>
        </div>
    </div>
    <!-- Contenido-->
    <h3 class="text text-start text-success">Oferta Académica Vigente</h3>
    <br>
    <!-- Llenar tabla con activas -->
    <table class="table table-success align-middle order-column hover row-border stripe " id="tbl">
        <thead>
            <th hidden>ID</th>
            <th>Numero</th>
            <th>Escuela</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <!-- llenar toda la tabla con car activas-->
            <?php
            foreach ($tbl_carrera as $escuelas) {
                if ($escuelas['CAR_ACTIVA'] == 'SÍ') {

            ?>
                    <tr>
                        <td hidden><?php echo $escuelas['CAR_ID']; ?></td>
                        <td><?php
                            /* autoincrementar */
                            static $numero = 1;
                            echo $numero++;
                            ?></td>
                        <td><?php echo $escuelas['CAR_NOMBRE']; ?></td>
                        <td>
                            <a href="<?php
                                        echo base_url('index.php/ReportePosgradoEscuelaGraduadosVigente/' . $escuelas['CAR_ID'])
                                        ?>" class="btn btn-success">Datos  <i class="fa-regular fa-circle-right"></i></a>
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
            <th>Numero</th>
            <th>Escuela</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php
            foreach ($tbl_carrera as $escuelas) {
                if ($escuelas['CAR_ACTIVA'] == 'No') {
                    /* Car capus == 1 */
                    if ($escuelas['CAR_CAMPUS'] == 1) {
            ?>
                        <tr>
                            <td hidden><?php echo $escuelas['CAR_ID']; ?></td>
                            <td><?php
                                /* autoincrementar desde 0*/
                                static $numero2 = 1;
                                echo $numero2++;
                                ?></td>
                            <td><?php echo $escuelas['CAR_NOMBRE']; ?></td>
                            <td>
                                <a href="<?php
                                            echo base_url('index.php/ReportePosgradoEscuelaGraduadosHistorico/' . $escuelas['CAR_ID'])
                                            ?>" class="btn btn-primary">Datos  <i class="fa-regular fa-circle-right"></i></a>
                            </td>
                        </tr>
            <?php
                    }
                }
            }
            ?>
        </tbody>
    </table>
</div>