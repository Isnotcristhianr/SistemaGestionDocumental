<!-- Datos Estadisticos -->

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="<?php echo base_url('index.php/FiltroEstadisticoGrado') ?>" class="btn btn-outline-primary">
        <i class="fa-solid fa-caret-left"></i> Volver
    </a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos General
            </h2>
            <h4 class="text-center text-dark">Búsqueda:
            </h4>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Selecione uno ↓</h5>
        </div>
    </div>
</div>
<!-- Buton busqueda -->
<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div class="row ">
        <div class="col-12">
            <!-- btn -->
            <div class="d-grid gap-2 col-2 mx-auto m-2">
                <a href="<?php echo base_url('index.php/verMenuGeneral/verMatriculados') ?>" class="btn btn-dark " type="button">
                    <i class="fa-solid fa-person-chalkboard fa-xl"></i>
                    <br>
                    Matriculados
                </a>
            </div>

            <!-- btn -->
            <div class="d-grid gap-2 col-2 mx-auto m-2">
                <a href="<?php echo base_url('index.php/verMenuGeneral/verGraduados') ?>" class="btn btn-dark" type="button">
                    <i class="fa-solid fa-user-graduate fa-xl"></i>
                    <br>
                    Graduados
                </a>
            </div>

            <!-- btn -->
            <div class="d-grid gap-2 col-2 mx-auto m-2">
                <a href="<?php echo base_url('index.php/verMenuGeneral/verGeneral') ?>" class="btn btn-dark" type="button">
                    <i class="fa-solid fa-user-graduate fa-xl"></i>
                    <br>
                    General
                </a>
            </div>

        </div>
    </div>
</div>