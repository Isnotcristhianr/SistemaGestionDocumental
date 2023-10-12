<!-- Datos Estadisticos -->

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="<?php echo base_url('index.php/FiltroEstadisticoTecnologiaBusqueda/Técnicas%20y%20Tecnológicas/CarrerasTécnicasyTecnológias') ?>" class="btn btn-outline-primary">
        <i class="fa-solid fa-caret-left"></i> Volver
    </a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Técnicas y Tecnológicas
            </h2>
            <h4 class="text-center text-dark">Búsqueda: Carreras</h4>
        </div>
        <div class="col-12 m-2">
            <h5 class="text-center text-secondary">↓ Graduados ↓
                <br>
                <a id="btnBox"></a>
            </h5>
        </div>
    </div>

    <!-- Contenido-->
    <h3 class="text text-start text-success">Oferta Académica Vigentes</h3>
    <br>
    <!-- Llenar tabla con activas -->
    <table class="table table-success align-middle order-column hover row-border stripe text-start" id="tbl" style="width: 100%;">
        <thead>
            <th hidden>ID</th>
            <th>Seleccione</th>
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
                        <td>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="seleccionar[]" value="<?php echo $carreras['CAR_ID']; ?>">
                            </div>
                        </td>
                        <td><?php echo $carreras['CAR_NOMBRE']; ?></td>

                        <td>
                            <a href="<?php echo base_url('index.php/ReporteTecnologiaCarreraGraduados/' . $carreras['CAR_ID']) ?>" class="btn btn-success">Datos <i class="fa-regular fa-circle-right"></i></a>
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
    <!-- Llenar tabla con no ativas  -->
    <table class="table table-primary align-middle order-column hover row-border stripe" id="tbl2">
        <thead>
            <th hidden>ID</th>
            <th>Seleccione</th>
            <th>Carrera</th>
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
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="seleccionar[]" value="<?php echo $carreras['CAR_ID']; ?>">
                                </div>
                            </td>
                            <td><?php echo $carreras['CAR_NOMBRE']; ?></td>

                            <td>
                                <a href="<?php echo base_url('index.php/ReporteTecnologiaCarreraGraduados/' . $carreras['CAR_ID']) ?>" class="btn btn-primary">Datos <i class="fa-regular fa-circle-right"></i></a>
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

<script>
    // Obtener todos los checkboxes con name="seleccionar[]"
    const checkboxes = document.querySelectorAll('input[name="seleccionar[]"]');
    const btnBox = document.getElementById('btnBox');

    // Agregar un evento de cambio a cada checkbox
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', function() {
            const valoresSeleccionados = Array.from(checkboxes)
                .filter((cb) => cb.checked)
                .map((cb) => cb.value);

            // Crear la ruta con los valores seleccionados
            const ruta = valoresSeleccionados.length > 0 ?
                '<?php echo base_url('index.php/SelectorReporteCarreraTecnologiaGraduados/'); ?>' + valoresSeleccionados.join(',') :
                'javascript:void(0)';
            btnBox.href = ruta;

            // Establecer el atributo href del enlace
            btnBox.href = ruta;

            // Establecer el texto del enlace según si hay selecciones o no
            btnBox.innerHTML = valoresSeleccionados.length > 0 ?
                '<i class="fa-solid fa-circle-info p-1"></i> Generar Reporte Selección <i class="fa-solid fa-circle-info p-1"></i>' :
                '';

            // Establecer estilos para el botón
            btnBox.style.display = valoresSeleccionados.length > 0 ? 'block' : 'none';
            btnBox.style.marginTop = '10px';
            btnBox.style.backgroundColor = '#007bff';
            btnBox.style.color = '#fff';
            btnBox.style.border = 'none';
            btnBox.style.borderRadius = '5px';
            btnBox.style.padding = '10px 20px';
            btnBox.style.textDecoration = 'none';
            btnBox.style.cursor = 'pointer';
            btnBox.style.fontSize = '15px';

        });
    });

    // Al hacer clic en el enlace, capturar valores seleccionados 
    btnBox.addEventListener('click', function(event) {
        if (btnBox.href === 'javascript:void(0)') {
            event.preventDefault(); // Evitar la redirección si no hay selecciones
        } else {
            const valoresSeleccionados = Array.from(checkboxes)
                .filter((cb) => cb.checked)
                .map((cb) => cb.value);

            alert(valoresSeleccionados);
        }
    });
</script>