<!-- Datos Estadisticos -->

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="<?php echo base_url('index.php/FiltroEstadisticoGrado') ?>" class="btn btn-primary">← Volver</a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Grados
            </h2>
            <h4 class="text-center text-dark">Búsqueda: Escuela</h4>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Matriculados ↓</h5>
        </div>
    </div>

    <!-- Contenido-->
    <div class="table-responsive text-center">
        <h3 class="text text-start text-success">Vigentes</h3>
        <table class="table align-middle order-column hover nowrap row-border stripe " id="tbl">
            <thead>
                <th hidden>ID</th>
                <th>Numero</th>
                <th>Escuela</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                <!-- llenar toda la tabla -->
                <?php
                foreach ($tbl_carrera as $escuelas) {
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
                                        echo base_url('index.php/ControladorFEEscuela/estadisticoGradoEscuela/' . $escuelas['CAR_ID'] . '/Matriculados')
                                        ?>" class="btn btn-success">Visualizar →</a>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>

</div>