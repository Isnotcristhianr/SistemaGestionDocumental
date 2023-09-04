<!-- Datos Estadisticos -->
<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="http://localhost/SistemaGestionDocumental/index.php/FiltroEstadisticoGradoBusqueda/Grado/Escuela" class="btn btn-outline-primary">← Volver</a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Grados
            </h2>
            <h4 class="text-center text-dark">Búsqueda: Carreras</h4>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Matriculados ↓</h5>
        </div>
    </div>
    <!-- Contenido-->
    <h3 class="text text-start text-success">Oferta Académica Vigentes</h3>
    <a href="" class="btn btn-success ">Ver Resumen</a>
    <br>
    <br>
    <!-- Llenar tabla con activas -->
    <table class="table table-success align-middle order-column hover row-border stripe text-start" id="tbl">
        <thead>
            <th hidden>ID</th>
            <th>Numero</th>
            <th>Carrera</th>
            <th>Escuela</th>
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
                                <!-- Obtener largo tbl_escuela -->
                                <?php
                                $largo = count($tbl_escuela);
                                /* comparar 2 tbl_carrera con tbl_escuela, tbl_escuela obtiene esc_padre y esc_nombre,
                                     se compara esc_padre con CAR_PADREESC con esc_padre asignando el nombre correspondiente */
                                for ($i = 0; $i < $largo; $i++) {
                                    if ($carreras['CAR_PADREESC'] == $tbl_escuela[$i]['esc_padre']) {
                                        echo $tbl_escuela[$i]['esc_nombre'];
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <!-- Obtener id de la carrera -->
                                <a href="<?php
                                            echo base_url('index.php/ReporteGradoCarreraMatriculados/' . $carreras['CAR_ID'])
                                            ?>" class="btn btn-success">Datos →</a>
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
    <h4>Campus Ibarra</h4>
    <a href="" class="btn btn-primary">Ver Resumen</a>
    <br>
    <br>
    <!-- Llenar tabla con no ativas -->
    <table class="table table-primary align-middle order-column hover row-border stripe " id="tbl2">
        <thead>
            <th hidden>ID</th>
            <th>Numero</th>
            <th>Carrera</th>
            <th>Escuela</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <!-- llenar toda la tabla con car no activas-->
            <?php
            foreach ($tbl_carrera as $carreras) {
                if ($carreras['CAR_ACTIVA'] == 'No') {
                    if ($carreras['CAR_CAMPUS'] == 1) {
            ?>
                        <tr>
                            <td hidden><?php echo $carreras['CAR_ID']; ?></td>
                            <td><?php
                                static $num = 1;
                                echo $num++;
                                ?></td>
                            <td><?php echo $carreras['CAR_NOMBRE']; ?></td>
                            <td>
                                <!-- Obtener largo tbl_escuela -->
                                <?php
                                $largo = count($tbl_escuela);
                                /* comparar 2 tbl_carrera con tbl_escuela, tbl_escuela obtiene esc_padre y esc_nombre,
                                     se compara esc_padre con CAR_PADREESC con esc_padre asignando el nombre correspondiente */
                                for ($i = 0; $i < $largo; $i++) {
                                    if ($carreras['CAR_PADREESC'] == $tbl_escuela[$i]['esc_padre']) {
                                        echo $tbl_escuela[$i]['esc_nombre'];
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <!-- Obtener id de la carrera -->
                                <a href="<?php
                                            echo base_url('index.php/ReporteGradoCarreraMatriculados/' . $carreras['CAR_ID'])
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
    <br>
    <!-- Sede Tulcan -->
    <h4 class="text-info">Campus Tulcán</h4>
    <a href="" class="btn btn-info">Ver Resumen</a>
    <br>
    <br>
    <!-- Llenar tabla con no ativas -->
    <table class="table table-info align-middle order-column hover row-border stripe " id="tbl3">
        <thead>
            <th hidden>ID</th>
            <th>Numero</th>
            <th>Carrera</th>
            <th>Escuela</th>
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
                                static $num = 1;
                                echo $num++;
                                ?></td>
                            <td><?php echo $carreras['CAR_NOMBRE']; ?></td>
                            <td>
                                <!-- Obtener largo tbl_escuela -->
                                <?php
                                $largo = count($tbl_escuela);
                                /* comparar 2 tbl_carrera con tbl_escuela, tbl_escuela obtiene esc_padre y esc_nombre,
                                     se compara esc_padre con CAR_PADREESC con esc_padre asignando el nombre correspondiente */
                                for ($i = 0; $i < $largo; $i++) {
                                    if ($carreras['CAR_PADREESC'] == $tbl_escuela[$i]['esc_padre']) {
                                        echo $tbl_escuela[$i]['esc_nombre'];
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <!-- Obtener id de la carrera -->
                                <a href="<?php
                                            echo base_url('index.php/ReporteGradoCarreraMatriculados/' . $carreras['CAR_ID'])
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