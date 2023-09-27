<!-- Datos Estadisticos -->

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="<?php echo base_url('index.php/FiltroEstadisticoGradoBusqueda/Grado/Carrera') ?>" class="btn btn-outline-primary">
        <i class="fa-solid fa-caret-left"></i> Volver
    </a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Grado
            </h2>
            <h4 class="text-center text-dark">Búsqueda: Carrera</h4>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Graduados ↓</h5>
        </div>
    </div>

    <!-- Contenido-->
    <h3 class="text text-start text-success">Oferta Académica Vigentes</h3>
    <br>
    <!-- Llenar tabla con activas -->
    <table class="table table-success align-middle order-column hover row-border stripe text-start" id="tbl">
        <thead>
            <th hidden>ID</th>
            <th>Numero</th>
            <th>Carrera</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <!-- llenar toda la tabla con car activas-->

            <?php
            foreach ($tbl_carrera as $carreras) {
                if ($carreras['CAR_ACTIVA'] == 'SÍ') {
                    if ($carreras['CAR_CAMPUS'] == 1) {
            ?>
                        <tr>
                            <td hidden><?php echo $carreras['CAR_ID']; ?></td>
                            <td><?php
                                /* autoincrementar */
                                static $numero = 1;
                                echo $numero++;
                                ?></td>
                            <td><?php echo $carreras['CAR_NOMBRE']; ?></td>

                            <td>
                                <!-- Obtener id de la carrera -->
                                <a href="<?php
                                            echo base_url('index.php/ReporteGradoCarreraGraduados/' . $carreras['CAR_ID'])
                                            ?>" class="btn btn-success">Datos <i class="fa-regular fa-circle-right"></i></a>
                            </td>
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
    <br>
    <!-- Sede Ibarra -->
    <h4 class="text-secondary">Campus Ibarra</h4>
    <br>
    <!-- Llenar tabla con no ativas -->
    <table class="table table-primary align-middle order-column hover row-border stripe " id="tbl2">
        <thead>
            <th hidden>ID</th>
            <th>Numero</th>
            <th>Carrera</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <!-- llenar toda la tabla con car no activas-->
            <?php
            foreach ($tbl_carrera as $carreras) {
                if ($carreras['CAR_CAMPUS'] == 1) {
            ?>
                    <tr>
                        <td hidden><?php echo $carreras['CAR_ID']; ?></td>
                        <td><?php
                            /* autoincrementar */
                            static $numero = 1;
                            echo $numero++;
                            ?></td>
                        <td><?php echo $carreras['CAR_NOMBRE']; ?></td>
                        <td>
                            <!-- Obtener id de la carrera -->
                            <a href="<?php
                                        echo base_url('index.php/ReporteGradoCarreraGraduados/' . $carreras['CAR_ID'])
                                        ?>" class="btn btn-primary">Datos <i class="fa-regular fa-circle-right"></i></a>
                        </td>
                    </tr>
            <?php

                }
            }
            ?>
        </tbody>
    </table>
    <br>
    <!-- Sede Tulcan -->
    <h4 class="text-secondary">Campus Tulcán</h4>
    <br>
    <!-- Llenar tabla con no ativas -->
    <table class="table table-info align-middle order-column hover row-border stripe " id="tbl3">
        <thead>
            <th hidden>ID</th>
            <th>Numero</th>
            <th>Carrera</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <!-- llenar toda la tabla con car no activas-->
            <?php
            foreach ($tbl_carrera as $carreras) {
                if ($carreras['CAR_ACTIVA'] == 'No') {
                    if ($carreras['CAR_CAMPUS'] == 2) {
            ?>
                        <tr>
                            <td hidden><?php echo $carreras['CAR_ID']; ?></td>
                            <td><?php
                                /* autoincrementar */
                                static $numero = 1;
                                echo $numero++;
                                ?></td>
                            <td><?php echo $carreras['CAR_NOMBRE']; ?></td>
                            <td>
                                <!-- Obtener id de la carrera -->
                                <a href="<?php
                                            echo base_url('index.php/ReporteGradoCarreraGraduados/' . $carreras['CAR_ID'])
                                            ?>" class="btn btn-info">Datos <i class="fa-regular fa-circle-right"></i></a>
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