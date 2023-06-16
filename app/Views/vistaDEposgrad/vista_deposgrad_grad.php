<!-- Datos Estadisticos -->

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="http://localhost/SistemaGestionDocumental/index.php/dePosgrado" class="btn btn-primary m-1">
        ← Volver
    </a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Posgrado - Graduados</h2>
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
                <input class="form-check-input" type="radio" name="busqueda" value="fecha"> <label for="text-dark">Fecha</label> 
                <input class="form-check-input" type="radio" name="busqueda" value="noFecha"> <label for="text-dark">General</label> 
            </div>
        </div>
    </div>

    <div id="resBusqueda">

    </div>

</div>