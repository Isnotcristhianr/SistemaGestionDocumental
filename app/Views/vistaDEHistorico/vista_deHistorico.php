<!-- Datos Estadisticos -->

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Histórico PUCE-I</h2>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Filtrar ↓</h5>
        </div>
    </div>

    <!-- Filtrado Busqueda -->
    <div class="col-12 text-center m-3 p-4">
        <!-- Check box -->
        <div id="fitradoBusqueda" class="rounded">
            <label for="" class="text text-secondary">Seleccione: </label>
            <br>
            <input class="form-check-input m-1 bg-secondary" type="radio" name="busqueda" value="fechah"> <label for="text-dark"><b>Fecha </b></label>
            <input class="form-check-input m-1 bg-secondary" type="radio" name="busqueda" value="nofechah"> <label for="text-dark"><b>General</b></label>
        </div>
    </div>
    <div id="resBusqueda"></div>
    <div id="resRepTit"></div>
</div>