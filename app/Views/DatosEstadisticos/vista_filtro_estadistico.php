<!-- Datos Estadisticos -->

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos
                <?php
                /* Asignar un value */
                if ($id == 1) {
                    echo "Grado";
                    $id = 1;
                } else if ($id == 2) {
                    echo "Posgrado";
                    $id = 2;
                } else if ($id == 3) {
                    echo "Tecnología";
                }
                ?>
            </h2>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Condicion de Búsqueda ↓</h5>
        </div>
    </div>

    <!-- Boton  Centrado-->
    <div class="row m-2 p-2 ">
        <div class="col-12 text-center">
            <ul class="list-group ">
                <a href="http://localhost/SistemaGestionDocumental/index.php/BuscarFiltroEstadistico/<?php echo $id ?>/escuela" class="text-decoration-none fw-bolder">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Escuelas
                        <span class="badge bg-primary rounded-pill">7</span>
                    </li>
                </a>
                <a href="http://localhost/SistemaGestionDocumental/index.php/BuscarFiltroEstadistico/<?php echo $id ?>/carrera" class="text-decoration-none fw-bolder">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Carreras
                        <span class="badge bg-primary rounded-pill">79</span>
                    </li>
                </a>
                <a href="http://localhost/SistemaGestionDocumental/index.php/BuscarFiltroEstadistico/<?php echo $id ?>/periodo" class="text-decoration-none fw-bolder">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Periodos
                        <span class="badge bg-primary rounded-pill">112</span>
                    </li>
                </a>
                <a href="http://localhost/SistemaGestionDocumental/index.php/BuscarFiltroEstadistico/<?php echo $id ?>/fecha" class="text-decoration-none fw-bolder">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Fechas
                        <span class="badge bg-primary rounded-pill">
                            <!-- Icono Calendar -->
                            <i class="fa-solid fa-calendar-days"></i>
                        </span>
                    </li>
                </a>
                <a href="http://localhost/SistemaGestionDocumental/index.php/BuscarFiltroEstadistico/<?php echo $id ?>/general" class="text-decoration-none fw-bolder">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        General
                        <span class="badge bg-primary rounded-pill">
                            <!-- Lupa Busqueda icono-->
                            <i class="fa-solid fa-search"></i>
                        </span>
                    </li>
                </a>
        </div>
    </div>
</div>