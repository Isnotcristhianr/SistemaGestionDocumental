<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div class="row  align-items-center">
        <div class="col-12">
            <a href="<?= base_url('/index.php/subidaDatos'); ?>" class="btn btn-outline-primary">
                <i class="fa-solid fa-caret-left"></i> Volver
            </a>
        </div>
        <div class="col-12">
            <h3 class="text-center text-primary m-3">
                <i class="fa-solid fa-chart-simple fa-sm"></i>
                Subir Datos Manualmente
                <i class="fa-solid fa-chart-simple fa-sm"></i>
            </h3>
        </div>
        <div class="col">
            <div class="card m-2 p-2">
                <div class="header text-center">
                    <img src="<?php echo base_url('/public/imgs/secretary2.png') ?>" alt="secretaryManual" class="img img-fluid m-1 p-1">
                </div>
                <div class="tittle text-center">
                    <h4 class="text text-secondary">Subida de datos Matriz Estudiantes</h4>
                </div>
                <div class="body">
                    <div class="form text-center ">
                        <form action="" method="" enctype="multipart/form-data">

                            <!-- Tipo -->
                            <div class="mb-3 d-flex text-center justify-content-center align-items-center">
                                <label class="form-label fw-bold fs-5">Tipo: </label>
                                <select class="form-select m-2 p-1" aria-label="select" id="">
                                    <option selected hidden>Seleccione</option>
                                    <!-- Obtener valores de la  -->
                                </select>
                            </div>




                            <button type="submit" class="btn btn-success m-3">Ingresar Datos</button>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>