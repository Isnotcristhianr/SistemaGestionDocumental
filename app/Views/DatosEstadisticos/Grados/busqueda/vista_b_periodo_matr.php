<!-- Datos Estadisticos -->


<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <a href="http://localhost/SistemaGestionDocumental/index.php/FiltroEstadisticoGradoBusqueda/Grado/Periodo" class="btn btn-primary">← Volver</a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Grado
            </h2>
            <h4 class="text-center text-dark">Búsqueda: Periodo
            </h4>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary"> Matriculados </h5>
        </div>
    </div>

    <!-- Contenido-->
    <div class="table-responsive text-center">
        <table class="table align-middle order-column" id="tbl">
            <thead>
                <th hidden>ID</th>
                <th>Año</th>
                <th>Periodo</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <!-- llenar toda la tabla -->
                <?php

                foreach ($tbl_periodo as $periodo) {
                ?>
                    <tr>
                        <td hidden><?php echo $periodo['PER_ID']; ?></td>
                        <td><?php echo $periodo['PER_ANO']; ?></td>
                        <td><?php echo $periodo['PER_PERIODO']; ?></td>
                        <td><a href="" class="btn btn-success">Visualizar</a></td>
                    </tr>
                <?php
                }
                ?>


            </tbody>
        </table>
    </div>
</div>