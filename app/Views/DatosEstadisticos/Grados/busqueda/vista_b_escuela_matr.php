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
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Matriculados ↓</h5>
        </div>
    </div>

    <!-- Contenido-->
    <h3 class="text text-start text-success">Oferta Académica Vigentes</h3>
    <!-- Sede Ibarra -->
    <br>
    <div id="seleccionvigente" hidden></div>
    <a id="btnvigente"></a>
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
    <script>
        // Función para actualizar la lista de valores seleccionados y mostrar u ocultar el botón
        function actualizarSeleccionVigente() {
            const checkboxesVigente = document.querySelectorAll('input[name="seleccionar[]"]');
            const seleccionVigenteDiv = document.getElementById('seleccionvigente');
            const btnVigente = document.getElementById('btnvigente');

            // Obtener todos los valores de los checkboxes seleccionados
            const valoresSeleccionadosVigente = Array.from(checkboxesVigente)
                .filter((cb) => cb.checked)
                .map((cb) => cb.value);

            // Actualizar el contenido del div con los valores seleccionados
            seleccionVigenteDiv.innerHTML = valoresSeleccionadosVigente.join(', ');

            // Mostrar u ocultar el botón según si hay selecciones
            if (valoresSeleccionadosVigente.length > 0) {
                btnVigente.innerHTML = '<button type="button" class="btn btn-success">Datos Seleccion <i class="fa-solid fa-circle-info p-1"></i></button>';
            } else {
                btnVigente.innerHTML = '';
            }
        }

        // Obtener todos los checkboxes con name="seleccionar[]"
        const checkboxesVigente = document.querySelectorAll('input[name="seleccionar[]"]');

        // Agregar un evento de cambio a cada checkbox para actualizar la selección
        checkboxesVigente.forEach((checkboxVigente) => {
            checkboxVigente.addEventListener('change', actualizarSeleccionVigente);
        });

        // Al hacer clic en el botón, capturar y mostrar los valores seleccionados
        document.getElementById('btnvigente').addEventListener('click', function() {
            const valoresSeleccionadosVigente = Array.from(checkboxesVigente)
                .filter((cb) => cb.checked)
                .map((cb) => cb.value);

            if (valoresSeleccionadosVigente.length > 0) {
                alert(valoresSeleccionadosVigente.join(', '));
            } else {
                alert('No se ha seleccionado ningún valor.');
            }
        });

        // Inicialmente, al cargar la página, actualiza la selección
        actualizarSeleccionVigente();
    </script>

</div>

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <h3 class="text text-start text-primary">Oferta Académica Histórico</h3>
    <!-- Sede Ibarra -->
    <br>
    <h4 class="text text-secondary">Campus Ibarra</h4>
    <br>
    <div class="seleccionhistorico" hidden></div>
    <a id="btnHistorico"></a>
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
    <script>
        // Función para actualizar la lista de valores seleccionados y mostrar u ocultar el botón
        function actualizarSeleccionHistorico() {
            const checkboxesHistorico = document.querySelectorAll('input[name="seleccionar[]"]');
            const seleccionHistoricoDiv = document.querySelector('.seleccionhistorico');
            const btnHistorico = document.getElementById('btnHistorico');

            // Obtener todos los valores de los checkboxes seleccionados
            const valoresSeleccionadosHistorico = Array.from(checkboxesHistorico)
                .filter((cb) => cb.checked)
                .map((cb) => cb.value);

            // Actualizar el contenido del div con los valores seleccionados
            seleccionHistoricoDiv.innerHTML = valoresSeleccionadosHistorico.join(', ');

            // Mostrar u ocultar el botón según si hay selecciones
            if (valoresSeleccionadosHistorico.length > 0) {
                btnHistorico.innerHTML = '<button type="button" class="btn btn-primary">Datos Seleccion <i class="fa-solid fa-circle-info p-1"></i></button>';
            } else {
                btnHistorico.innerHTML = '';
            }
        }

        // Obtener todos los checkboxes con name="seleccionar[]"
        const checkboxesHistorico = document.querySelectorAll('input[name="seleccionar[]"]');

        // Agregar un evento de cambio a cada checkbox para actualizar la selección
        checkboxesHistorico.forEach((checkboxHistorico) => {
            checkboxHistorico.addEventListener('change', actualizarSeleccionHistorico);
        });

        // Al hacer clic en el botón, capturar y mostrar los valores seleccionados
        document.getElementById('btnHistorico').addEventListener('click', function() {
            const valoresSeleccionadosHistorico = Array.from(checkboxesHistorico)
                .filter((cb) => cb.checked)
                .map((cb) => cb.value);

            if (valoresSeleccionadosHistorico.length > 0) {
                alert(valoresSeleccionadosHistorico.join(', '));
            } else {
                alert('No se ha seleccionado ningún valor.');
            }
        });

        // Inicialmente, al cargar la página, actualiza la selección
        actualizarSeleccionHistorico();
    </script>

    <!-- Sede tulcan -->
    <br>
    <h4 class="text text-secondary">Campus Tulcán</h4>
    <br>
    <div class="selecciontulcan" hidden></div>
    <a id="btntulcan"></a>
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
    <script>
        // Función para actualizar la lista de valores seleccionados y mostrar u ocultar el botón
        function actualizarSeleccionTulcan() {
            const checkboxesTulcan = document.querySelectorAll('input[name="seleccionar[]"]');
            const seleccionTulcanDiv = document.querySelector('.selecciontulcan');
            const btnTulcan = document.getElementById('btntulcan');

            // Obtener todos los valores de los checkboxes seleccionados
            const valoresSeleccionadosTulcan = Array.from(checkboxesTulcan)
                .filter((cb) => cb.checked)
                .map((cb) => cb.value);

            // Actualizar el contenido del div con los valores seleccionados
            seleccionTulcanDiv.innerHTML = valoresSeleccionadosTulcan.join(', ');

            // Mostrar u ocultar el botón según si hay selecciones
            if (valoresSeleccionadosTulcan.length > 0) {
                btnTulcan.innerHTML = '<button type="button" class="btn btn-info">Datos Seleccion <i class="fa-solid fa-circle-info p-1"></i></button>';
            } else {
                btnTulcan.innerHTML = '';
            }
        }

        // Obtener todos los checkboxes con name="seleccionar[]"
        const checkboxesTulcan = document.querySelectorAll('input[name="seleccionar[]"]');

        // Agregar un evento de cambio a cada checkbox para actualizar la selección
        checkboxesTulcan.forEach((checkboxTulcan) => {
            checkboxTulcan.addEventListener('change', actualizarSeleccionTulcan);
        });

        // Al hacer clic en el botón, capturar y mostrar los valores seleccionados
        document.getElementById('btntulcan').addEventListener('click', function() {
            const valoresSeleccionadosTulcan = Array.from(checkboxesTulcan)
                .filter((cb) => cb.checked)
                .map((cb) => cb.value);

            if (valoresSeleccionadosTulcan.length > 0) {
                alert(valoresSeleccionadosTulcan.join(', '));
            } else {
                alert('No se ha seleccionado ningún valor.');
            }
        });

        // Inicialmente, al cargar la página, actualiza la selección
        actualizarSeleccionTulcan();
    </script>

</div>