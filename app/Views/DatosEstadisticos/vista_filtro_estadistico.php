<!-- Datos Estadisticos -->

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos
                <?php
                /* Asignar un value */
                if ($id == 1) {
                    echo "Grado";
                } else if ($id == 2) {
                    echo "Posgrado";
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
        <div class="col-12 text-center m-1 ">
            <form action="<?php base_url('/BuscarFiltroEstadistico/' . $id) ?>" method="GET"></form>
            <div id="fitradoDatoEstadistico" class="d-flex align-items-center
             justify-content-center text-light rounded-pill m-2" style="background-color: #164284;">
                <div class="form-check text-center p-3">
                    <input class="form-check-input" type="radio" name="busquedaDatEst" value="escuelas">
                    <label for="form-check-labe text-dark">Escuelas</label>
                </div>
                <div class="form-check text-center p-3">
                    <input class="form-check-input" type="radio" name="busquedaDatEst" value="carreras">
                    <label for="text-dark">Carreras</label>
                </div>
                <div class="form-check text-center p-3">
                    <input class="form-check-input" type="radio" name="busquedaDatEst" value="periodos">
                    <label for="text-dark">Periodos</label>
                </div>
                <div class="form-check text-center p-3">
                    <input class="form-check-input" type="radio" name="busquedaDatEst" value="fechas">
                    <label for="text-dark">Fechas</label>
                </div>
                <div class="form-check text-center p-3">
                    <input class="form-check-input" type="radio" name="busquedaDatEst" value="general">
                    <label for="text-dark">General</label>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">
                Buscar
            </button>
            </form>
        </div>
    </div>
</div>