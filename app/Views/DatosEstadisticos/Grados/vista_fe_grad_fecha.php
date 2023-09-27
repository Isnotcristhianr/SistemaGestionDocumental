<!-- Buton busqueda -->

<div class="container-center m-5 p-3 bg-light rounded shadow-lg p-3 mb-5 bg-body rounded ">
    <div class="row">
        <div class="col-12">
            <!-- btn -->
            <div class="d-grid gap-2 col-2 mx-auto m-2">
                <a href="<?php echo base_url('index.php/ReporteFechaMatriculados') ?>" class="btn btn-dark " type="button">
                    <i class="fa-solid fa-person-chalkboard fa-xl"></i>
                    <br>
                    Matriculados
                </a>
            </div>

            <!-- btn -->
            <div class="d-grid gap-2 col-2 mx-auto m-2">
                <a href="<?php echo base_url('index.php/ReporteFechaGraduados') ?>" class="btn btn-dark" type="button">
                    <i class="fa-solid fa-user-graduate fa-xl"></i>
                    <br>
                    Graduados
                </a>
            </div>

            <!-- btn -->
            <div class="d-grid gap-2 col-2 mx-auto m-2">
                <a href="<?php echo base_url('index.php/ReporteFechaGeneral') ?>" class="btn btn-dark" type="button">
                    <i class="fa-solid fa-people-group fa-xl"></i>
                    <br>
                    General
                </a>
            </div>

        </div>
    </div>
</div>