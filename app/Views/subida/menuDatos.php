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
    <div class="m-3 p-3 bg-primary-subtle">
        <div class="container mt-12 ">
            <div class="row ">
                <div class="col-md-3">
                </div>
                <div class="col-md-3 justify-content-center align-items-center">
                    <div class="card mb-4 p-3 shadow rounded col-12 bg-primary">
                        <div class="card-header text-center p-3">
                            <i class="fa-solid fa-user-pen fa-2xl" style="color: #ffffff;"></i>
                        </div>
                        <div class="card-title d-flex justify-content-center align-items-center m-2 ">
                            <a href="<?php echo base_url('index.php/subidaDatos/manualmente') ?>" class="btn btn-light border-secondary-subtle text-secondary"><b>Manual</b></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 justify-content-center align-items-center">
                    <div class="card mb-4 p-3 shadow rounded col-12 bg-primary">
                        <div class="card-header text-center p-3">
                            <i class="fa-solid fa-upload fa-2xl" style="color: #ffffff;"></i>
                        </div>
                        <div class="card-title d-flex justify-content-center align-items-center m-2">
                            <a href="<?php echo base_url('index.php/subidaDatos/subirConjuntoDatos') ?>" class="btn btn-light border-secondary-subtle text-secondary"><b>Conjunto</b></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
            </div>
        </div>
    
    
        <!-- Menu de creacion -->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                    <div class="card bg-primary text-light text-center">
                        <div class="card-header">
                            <div class="m-2">
                                <i class="fa-solid fa-calendar-check fa-2x"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="<?php echo base_url('index.php//subidaDatos/irCrearPeriodo') ?>" class="btn btn-light text-secondary">
                                <b>
                                    <i class="fa-solid fa-circle-plus"></i> Periodo
                                </b>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                    <div class="card bg-primary text-light text-center">
                        <div class="card-header">
                            <div class="m-2">
                                <i class="fa-solid fa-graduation-cap fa-2x"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="<?php echo base_url('index.php/subidaDatos/irCrearCarrera') ?>" class="btn btn-light text-secondary">
                                <b>
                                    <i class="fa-solid fa-circle-plus"></i> Carrera
                                </b>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-3">
                    <div class="card bg-primary text-light text-center">
                        <div class="card-header">
                            <div class="m-2">
                                <i class="fa-solid fa-school fa-2x"></i>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="<?php echo base_url('index.php/subidaDatos/irCrearEscuela') ?>" class="btn btn-light text-secondary">
                                <b>
                                    <i class="fa-solid fa-circle-plus"></i> Escuela
                                </b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>