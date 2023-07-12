<!-- Datos Estadisticos -->

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="<?php echo base_url('index.php/FiltroEstadisticoTecnologiaBusqueda/Tecnologías/CarrerasTécnicasyTecnológias') ?>" class="btn btn-outline-primary">← Volver</a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Tecnologías
            </h2>
            <h4 class="text-center text-dark">Búsqueda: Carreras</h4>
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
    <div class="table-responsive text-center">
        <!-- Llenar tabla con activas -->
        <table class="table table-success align-middle order-column hover nowrap row-border stripe text-center" id="tbl" style="width: 100%;">
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
                ?>
                        <tr>
                            <td hidden><?php echo $carreras['CAR_ID']; ?></td>
                            <td><?php
                                //incrementar el numero de la tabla
                                static $num = 1;
                                echo $num++;
                                ?></td>
                            <td><?php echo $carreras['CAR_NOMBRE']; ?></td>
                            <td><?php
                                if ($carreras['CAR_PADREESC'] == 98) {
                                    echo 'Tecnología';
                                } else {
                                    echo $carreras['CAR_PADREESC'];
                                }
                                ?></td>
                            <td>
                                <a href="<?php echo base_url('index.php/FiltroEstadisticoGradoBusqueda/Grado/Carrera/Matriculados/' . $carreras['CAR_ID']) ?>" class="btn btn-success">Ver →</a>
                            </td>

                        </tr>
                <?php
                    }
                }
                ?>

            </tbody>
        </table>
    </div>
</div>

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <h3 class="text text-start text-primary">Oferta Académica Histórico</h3>
    <!-- Sede Ibarra -->
    <br>
    <h5 class="text text-start text-primary">Campus Ibarra</h5>
    <br>
    <a href="" class="btn btn-primary">Ver Resumen</a>
    <br>
    <br>
    <div class="table-responsive text-center">

        <!-- Llenar tabla con no ativas  -->
        <table class="table table-primary align-middle order-column hover nowrap row-border stripe" id="tbl2">
            <thead>
                <th hidden>ID</th>
                <th>Numero</th>
                <th>Carrera</th>
                <th>Escuela</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <!-- llenar toda la tabla con car no activas car_campus=1 (ibarra)-->
                <?php
                foreach ($tbl_carrera as $carreras) {
                    if ($carreras['CAR_ACTIVA'] == 'No') {
                        /* CAR_PADRE SOLO SI ES IGUAL A 98 */
                        if ($carreras['CAR_PADREESC'] == '98') {
                ?>
                            <tr>
                                <td hidden><?php echo $carreras['CAR_ID']; ?></td>
                                <td><?php
                                    static $num2 = 1;
                                    echo $num2++;
                                    ?></td>
                                <td><?php echo $carreras['CAR_NOMBRE']; ?></td>
                                <td><?php echo $carreras['CAR_PADREESC']; ?></td>
                                <td>
                                    <a href="<?php echo base_url('index.php/FiltroEstadisticoGradoBusqueda/Grado/Carrera/Matriculados/' . $carreras['CAR_ID']) ?>" class="btn btn-primary">Ver →</a>
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

    <br>
    <!-- Sede Tulcan -->
    <br>
    <h5 class="text text-start text-info">Campus Tulcan</h5>
    <br>
    <a href="" class="btn btn-info">Ver Resumen</a>
    <br>
    <br>
    <div class="table-responsive text-center">

        <!-- Llenar tabla con no ativas -->
        <table class="table table-info align-middle order-column hover nowrap row-border stripe" id="tbl3">
            <thead>
                <th hidden>ID</th>
                <th>Numero</th>
                <th>Carrera</th>
                <th>Escuela</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <!-- llenar toda la tabla con car no activas -->
                <?php
                foreach ($tbl_carrera as $carreras) {
                    if ($carreras['CAR_ACTIVA'] == 'No') {
                        /* CAR_PADRE SOLO SI ES IGUAL A 98 */
                        if ($carreras['CAR_PADREESC'] == '98') {

                ?>
                            <tr>
                                <td hidden><?php echo $carreras['CAR_ID']; ?></td>
                                <td><?php
                                    static $num2 = 1;
                                    echo $num2++;
                                    ?></td>
                                <td><?php echo $carreras['CAR_NOMBRE']; ?></td>
                                <td><?php echo $carreras['CAR_PADREESC']; ?></td>
                                <td>
                                    <a href="<?php echo base_url('index.php/FiltroEstadisticoGradoBusqueda/Grado/Carrera/Matriculados/' . $carreras['CAR_ID']) ?>" class="btn btn-info">Ver →</a>
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

</div>

</div>