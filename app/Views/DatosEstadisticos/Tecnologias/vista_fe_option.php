<!-- Datos Estadisticos -->

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- volver -->
    <div class="row">
        <div class="col-12">
            <a href="<?php echo base_url('index.php/FiltroEstadisticoTecnologia') ?>" class="btn btn-outline-primary">← Volver</a>
        </div>
    </div>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos
                <?php
                echo $tipo;
                ?>
            </h2>
            <h4 class="text-center text-dark">Busqueda:
                <?php
                    echo $filtro;
                
                ?>
            </h4>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Resultados ↓</h5>
        </div>
    </div>

    <!-- Contenido-->

</div>