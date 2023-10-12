
<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary m-3">
                <i class="fa-solid fa-chart-simple fa-sm"></i>
                Menú Subir Datos
                <i class="fa-solid fa-chart-simple fa-sm"></i>
            </h2>
        </div>
    </div>

    <br>
    <!-- Contenido-->
    <div class="container mt-12">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-4 justify-content-center align-items-center">
                <div class="card mb-4 p-3 shadow rounded col-12 bg-primary">
                    <div class="card-header text-center  p-3">
                        <i class="fa-solid fa-user-pen fa-2xl" style="color: #ffffff;"></i>
                    </div>
                    <div class="card-title d-flex justify-content-center align-items-center m-2 ">
                        <a href="<?php echo base_url('index.php/subidaDatos/manualmente') ?>" class="btn btn-light border-secondary-subtle text-secondary"><b>Manual</b></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 justify-content-center align-items-center">
                <div class="card mb-4 p-3 shadow rounded col-12 bg-primary">
                    <div class="card-header text-center p-3">
                        <i class="fa-solid fa-upload fa-2xl" style="color: #ffffff;"></i>
                    </div>
                    <div class="card-title d-flex justify-content-center align-items-center m-2">
                        <a href="<?php echo base_url('index.php/subidaDatos/') ?>" class="btn btn-light border-secondary-subtle text-secondary"><b>Conjunto</b></a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>