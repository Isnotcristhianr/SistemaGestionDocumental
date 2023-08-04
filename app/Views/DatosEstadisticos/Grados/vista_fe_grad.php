<?php

use App\Models\ModelFEcarreras;
use App\Models\ModelFEPeriodo;
use App\Models\ModelFEescuelas;
?>
<!-- Datos Estadisticos -->

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">
                Datos Estadísticos Grados
            </h2>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Condicion de Búsqueda ↓</h5>
        </div>
    </div>

    <!-- Boton  Centrado-->
    <div class="row m-2 p-2 ">
        <div class="col-12 text-center">
            <!-- Encabezados dividido 2 columnas, filtro y cantidad -->
            <div>
                <div class="row">
                    <div class="col-6">
                        <h5 class="text-start text-secondary">Filtro</h5>
                    </div>
                    <div class="col-6">
                        <h5 class="text-end text-secondary">Cantidad</h5>
                    </div>
                </div>
            </div>
            <ul class="list-group ">
                <a href="http://localhost/SistemaGestionDocumental/index.php/FiltroEstadisticoGradoBusqueda/Grado/Escuela" class="text-decoration-none fw-bolder">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Escuelas
                        <span class="badge bg-primary rounded-pill">
                            <!-- llenar escuelas total filas-->
                            <?php
                            $obgEscuela = new ModelFEescuelas();
                            echo $obgEscuela->contarEscuelasGrado();
                            ?>

                        </span>
                    </li>
                </a>
                <a href="http://localhost/SistemaGestionDocumental/index.php/FiltroEstadisticoGradoBusqueda/Grado/Carrera" class="text-decoration-none fw-bolder">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Carreras
                        <span class="badge bg-primary rounded-pill">
                            <!-- llenar carreras total filas -->
                            <?php
                            $obgCarrera = new ModelFEcarreras();
                            echo $obgCarrera->contarCarrerasGrado();
                            ?>
                        </span>
                    </li>
                </a>
                <a href="http://localhost/SistemaGestionDocumental/index.php/FiltroEstadisticoGradoBusqueda/Grado/Periodo" class="text-decoration-none fw-bolder">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Periodos
                        <span class="badge bg-primary rounded-pill">
                            <!-- llenar periodos total filas -->
                            <?php
                            $obgPeriodo = new ModelFEPeriodo();
                            echo $obgPeriodo->contarPeriodos();
                            ?>
                        </span>
                    </li>
                </a>
                <a href="http://localhost/SistemaGestionDocumental/index.php/FiltroEstadisticoGradoBusqueda/Grado/Fecha" class="text-decoration-none fw-bolder">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Fechas
                        <span class="badge bg-primary rounded-pill">
                            <!-- Icono Calendar -->
                            <i class="fa-solid fa-calendar-days"></i>
                        </span>
                    </li>
                </a>
                <a href="http://localhost/SistemaGestionDocumental/index.php/FiltroEstadisticoGradoBusqueda/Grado/General" class="text-decoration-none fw-bolder">
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