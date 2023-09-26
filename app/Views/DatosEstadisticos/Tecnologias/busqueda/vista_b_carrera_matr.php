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
            <h5 class="text-center text-secondary">↓ Matriculados ↓</h5>
        </div>
    </div>

    <!-- Contenido-->
    <h3 class="text text-start text-success">Oferta Académica Vigentes</h3>
    <br>
    <!-- Llenar tabla con activas -->
    <table class="table table-success align-middle order-column hover row-border stripe text-start" id="tbl" style="width: 100%;">
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
                        <td>
                            <a href="<?php echo base_url('index.php/ReporteTecnologiaCarreraMatriculados/' . $carreras['CAR_ID']) ?>" class="btn btn-success">Datos  <i class="fa-regular fa-circle-right"></i></a>
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
    <!-- Sede Ibarra -->
    <h4 class="text text-primary">Campus Ibarra</h4>
    <br>
    <!-- Llenar tabla con no ativas -->
    <table class="table table-primary align-middle order-column hover row-border stripe" id="tbl2">
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
                            <td>
                                <a href="<?php echo base_url('index.php/ReporteTecnologiaCarreraMatriculados/' . $carreras['CAR_ID']) ?>" class="btn btn-primary">Datos  <i class="fa-regular fa-circle-right"></i></a>
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

</div>