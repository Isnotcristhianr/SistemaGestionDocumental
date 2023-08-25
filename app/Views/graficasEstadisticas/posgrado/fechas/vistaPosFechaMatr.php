<!-- Datos Estadisticos -->

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="http://localhost/SistemaGestionDocumental/index.php/FiltroEstadisticoPosgradoBusqueda/Posgrado/Fecha" class="btn btn-outline-primary">← Volver</a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos PosGrado
            </h2>
            <h4 class="text-center text-dark">Búsqueda: Fecha General
            </h4>
            <h5 class="text-center text-secondary"> Matriculados
            </h5>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Seleccione ↓</h5>
        </div>
    </div>

    <!-- Contenido-->

</div>
<!-- Buton busqueda -->
<div class="container-center m-5 p-3 bg-light rounded shadow-lg p-3 mb-5 bg-body rounded ">
    <form action="/SistemaGestionDocumental/index.php/ReporteFechaMatriculadosPosgradoBusqueda" method="GET" class="form d-flex" style="justify-content: center;">
        <div class="input-group-text m-2">
            <label for="">Desde: </label>
            <input type="date" class="form-control" placeholder="FechaInicio" min="1976-01-01" max="<?php echo date("Y-m-d"); ?>" id="fechaInicio" name="fechaInicio" required>
        </div>
        <div class="input-group-text m-2">
            <label for="">Hasta: </label>
            <input type="date" class="form-control" placeholder="FechaFin" min="1976-01-01" max="<?php echo date("Y-m-d"); ?>" id="fechaFin" name="fechaFin" required>
        </div>
        <button type="submit" class="btn btn-primary col-2 m-2" name="consulta">
            <i class="fa-solid fa-magnifying-glass"> </i><small class="fs-6 fw-semibold"> Consultar </small>
        </button>
    </form>

</div>