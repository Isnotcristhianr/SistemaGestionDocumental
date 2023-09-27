<!-- Buton busqueda -->
<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div class="row ">
        <div class="col-12">
            <!-- btn -->
            <div class="d-grid gap-2 col-2 mx-auto m-2">
                <a href="<?php echo base_url('index.php/ReporteGeneralMatriculados') ?>" class="btn btn-dark " type="button">
                    <i class="fa-solid fa-person-chalkboard fa-xl"></i>
                    <br>
                    Matriculados
                </a>
            </div>

            <div class="d-grid gap-2 col-2 mx-auto m-2">
                <a href="<?php echo base_url('/index.php/ReporteGeneralGraduados') ?>" class="btn btn-dark" type="button">
                    <i class="fa-solid fa-user-graduate fa-xl"></i>
                    <br>
                    Graduados
                </a>
            </div>

            <div class="d-grid gap-2 col-2 mx-auto m-2">
                <a href="<?php echo base_url('/index.php/ReporteGeneral') ?>" class="btn btn-dark" type="button">
                    <i class="fa-solid fa-people-group fa-xl"></i>
                    <br>
                    General
                </a>
            </div>

        </div>
    </div>
</div>