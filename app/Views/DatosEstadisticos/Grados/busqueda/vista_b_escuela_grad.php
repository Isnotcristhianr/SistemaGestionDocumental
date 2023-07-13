<!-- Datos Estadisticos -->

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="<?php echo base_url('index.php/FiltroEstadisticoGradoEscuela/Matriculados') ?>" class="btn btn-outline-primary">← Volver</a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Grados
            </h2>
            <h4 class="text-center text-dark">Búsqueda: Escuela</h4>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Graduados ↓</h5>
        </div>
    </div>
    <!-- Contenido-->
    <h3 class="text text-start text-success">Oferta Académica Vigentes</h3>
    <a href="" class="btn btn-success ">Ver Resumen</a>
    <br>
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
                    if ($escuelas['CAR_CAMPUS'] == 1) {
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
                                            echo base_url('index.php/ControladorFEEscuela/estadisticoGradoEscuela/' . $escuelas['CAR_ID'] . '/Graduados')
                                            ?>" class="btn btn-success">Datos →</a>
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

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <h3 class="text text-start text-primary">Oferta Académica Histórico</h3>
    <!-- Sede Ibarra -->
    <br>
    <h5 class="text text-primary">Campus Ibarra</h5>
    <a href="" class="btn btn-primary">Ver Resumen</a>
    <br>
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
                                            echo base_url('index.php/ControladorFEEscuela/estadisticoGradoEscuela/' . $escuelas['CAR_ID'] . '/Graduados')
                                            ?>" class="btn btn-primary">Datos →</a>
                            </td>
                        </tr>
            <?php
                    }
                }
            }
            ?>
        </tbody>
    </table>
    <!-- Sede Tulcan -->
    <br>
    <h5 class="text text-info">Campus Tulcán</h5>
    <a href="" class="btn btn-info">Ver Resumen</a>
    <br>
    <br>
    <!-- Llenar tabla con no ativas -->
    <table class="table table-info align-middle order-column hover row-border stripe " id="tbl3">
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
                    if ($escuelas['CAR_CAMPUS'] == 2) {
            ?>
                        <tr>
                            <td hidden><?php echo $escuelas['CAR_ID']; ?></td>
                            <td><?php
                                /* autoincrementar desde 0*/
                                static $numero3 = 1;
                                echo $numero3++;
                                ?></td>
                            <td><?php echo $escuelas['CAR_NOMBRE']; ?></td>
                            <td>
                                <a href="<?php
                                            echo base_url('index.php/ControladorFEEscuela/estadisticoGradoEscuela/' . $escuelas['CAR_ID'] . '/Graduados')
                                            ?>" class="btn btn-info">Datos →</a>
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