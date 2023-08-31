<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="http://localhost/SistemaGestionDocumental/index.php/FiltroEstadisticoGradoCarrera/General" class="btn btn-outline-primary">← Volver</a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Grado PUCE-I
            </h2>
            <h4 class="text-center text-dark">Búsqueda: 
                <!-- Obtener el id de la escuela -->
                <?php
                foreach ($tbl_carrera as $row) {
                    if ($row['CAR_ID'] == $id) {
                        echo $row['CAR_NOMBRE'];
                    }
                }
                ?>
            </h4>
            <h5 class="text-center text-secondary"> Matriculados - Graduados
            </h5>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Reporte ↓</h5>
        </div>
    </div>
</div>
<!-- Contenido-->
