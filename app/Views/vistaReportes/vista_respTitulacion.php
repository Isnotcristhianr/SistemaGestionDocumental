<!-- Datos Estadisticos -->

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Reporte Titulación</h2>
        </div>
    </div>

    <!-- Filtrado Busqueda -->
    <div class="row m-2 p-2 responsive">
        <div class="col-12 text-center m-1" id="textoBusqueda">
            <h5 class="text-center text-secondary">↓ Filtrar ↓</h5>
        </div>
        <div class="col-12 text-center m-1">
            <!-- Check box -->
            <div id="fitradoBusqueda">
                <input class="form-check-input" type="radio" name="busqueda" value="fechaRepTit"> <label for="text-dark">Fecha</label>
                <input class="form-check-input" type="radio" name="busqueda" value="noFechaRepTit"> <label for="text-dark">General</label>
            </div>
        </div>
    </div>

    <div id="resBusqueda">
        <table>
            <thead>
                <th>ID</th>
                <th>Año</th>
                <th>Periodo</th>
            </thead>
            <tbody>
                <?php
                foreach ($tbl_periodo as $periodo);
                ?>
                <tr>
                    <td><?php echo $periodo['PER_ID']; ?></td>
                    <td><?php echo $periodo['PER_ANO']; ?></td>
                    <td><?php echo $periodo['PER_PERIODO']; ?></td>
                   
                </tr>
                
                <?php
                /* Cerrar for each */
                ?>
            </tbody>
        </table>

    </div>

    <div id="resRepTit">
    </div>
</div>