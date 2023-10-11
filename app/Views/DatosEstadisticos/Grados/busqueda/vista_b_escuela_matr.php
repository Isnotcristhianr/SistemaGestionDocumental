<!-- Datos Estadisticos -->

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="<?php echo base_url('index.php/FiltroEstadisticoGradoBusqueda/Grado/Escuela') ?>" class="btn btn-outline-primary"><i class="fa-solid fa-caret-left"></i> Volver</a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Grado
            </h2>
            <h4 class="text-center text-dark">Búsqueda: Escuela</h4>
        </div>
        <div class="col-12 m-2">
            <h5 class="text-center text-secondary">↓ Matriculados ↓
                <br>
                <a id="btnBox"></a>
            </h5>
        </div>
    </div>

    <!-- Contenido-->
    <h3 class="text text-start text-success">Oferta Académica Vigentes</h3>
    <!-- Sede Ibarra -->
    <br>
    <!-- Llenar tabla con activas -->
    <table class="table table-success align-middle order-column hover row-border stripe" id="tbl">
        <thead>
            <th hidden>ID</th>
            <th>Seleccionar</th>
            <th>Escuela</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <!-- llenar toda con CAR_CAMPUS = 1 (ibarra) Y ACTIVOS-->
            <?php
            foreach ($tbl_carrera as $escuelas) {
                if ($escuelas['CAR_ACTIVA'] == 'SÍ') {
                    if ($escuelas['CAR_CAMPUS'] == 1) {
            ?>
                        <tr>
                            <td hidden><?php echo $escuelas['CAR_ID']; ?></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="seleccionar[]" value="<?php echo $escuelas['CAR_ID']; ?>">
                                </div>
                            </td>

                            <td><?php echo $escuelas['CAR_NOMBRE']; ?></td>
                            <td>
                                <a href="<?php
                                            echo base_url('index.php/ReporteEscuelaMatriculadosVigente/' . $escuelas['CAR_ID'])
                                            ?>" class="btn btn-success">Datos <i class="fa-regular fa-circle-right"></i></a>
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
    <h4 class="text text-secondary">Campus Ibarra</h4>
    <br>
    <!-- Llenar tabla con no ativas -->
    <table class="table table-primary align-middle order-column hover row-border stripe" id="tbl2">
        <thead>
            <th hidden>ID</th>
            <th>Seleccionar</th>
            <th>Escuela</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php
            /* Llenar tbl con car_campus =2 */
            foreach ($tbl_carrera as $escuelas) {

                /* Car capus == 1 */
                if ($escuelas['CAR_CAMPUS'] == 1) {
            ?>
                    <tr>
                        <td hidden><?php echo $escuelas['CAR_ID']; ?></td>
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="seleccionar[]" value="<?php echo $escuelas['CAR_ID']; ?>">
                            </div>
                        </td>

                        <td><?php echo $escuelas['CAR_NOMBRE']; ?></td>
                        <td>
                            <a href="<?php
                                        echo base_url('index.php/ReporteEscuelaMatriculadosHistorico/' . $escuelas['CAR_ID'])
                                        ?>" class="btn btn-primary">Datos <i class="fa-regular fa-circle-right"></i></a>
                        </td>
                    </tr>
            <?php

                }
            }
            ?>
        </tbody>
    </table>

    <!-- Sede tulcan -->
    <br>
    <h4 class="text text-secondary">Campus Tulcán</h4>
    <br>
    <!-- Llenar tabla con activas -->
    <table class="table table-info align-middle order-column hover row-border stripe" id="tbl3">
        <thead>
            <th hidden>ID</th>
            <th>Seleccionar</th>
            <th>Escuela</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php

            /* Llenar tbl con car_campus =2 */
            foreach ($tbl_carrera as $escuelas) {

                if ($escuelas['CAR_ACTIVA'] == 'No') {
                    /* Car campus == 2 */
                    if ($escuelas['CAR_CAMPUS'] == 2) {

            ?>
                        <tr>
                            <td hidden><?php echo $escuelas['CAR_ID']; ?></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="seleccionar[]" value="<?php echo $escuelas['CAR_ID']; ?>">
                                </div>
                            </td>

                            <td><?php echo $escuelas['CAR_NOMBRE']; ?></td>
                            <td>
                                <a href="<?php
                                            echo base_url('index.php/ReporteEscuelaMatriculadosTulcan/' . $escuelas['CAR_ID'])
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

<script>
    // Obtener todos los checkboxes con name="seleccionar[]"
    const checkboxes = document.querySelectorAll('input[name="seleccionar[]"]');

    // Agregar un evento de cambio a cada checkbox
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', function() {
            const valoresSeleccionados = Array.from(checkboxes)
                .filter((cb) => cb.checked)
                .map((cb) => cb.value);
        });

        //crear btn si hay al menos una seleccion
        checkbox.addEventListener('change', function() {
            if (document.querySelectorAll('input[name="seleccionar[]"]:checked').length > 0) {
                document.getElementById('btnBox').innerHTML = '<br><a href="#" class="btn btn-primary"><i class="fa-solid fa-circle-info p-1"></i>Generar Reporte Selección<i class="fa-solid fa-circle-info p-1"></i></a><br>';
            } else {
                document.getElementById('btnBox').innerHTML = '';
            }
        });
    });

    //al hacer click en btn capturar valores seleccionados 
    document.getElementById('btnBox').addEventListener('click', function() {
        const valoresSeleccionados = Array.from(checkboxes)
            .filter((cb) => cb.checked)
            .map((cb) => cb.value);

        alert(valoresSeleccionados);
    });
</script>