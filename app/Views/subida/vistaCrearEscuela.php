<div class="container m-5 p-3">
    <div class="row justify-content-center">

        <div class="col-12 col-md-8">
            <div class="container border border-primary-subtle p-3 shadow rounded bg-light text-primary">
                <div class="mb-3 text-left">
                    <a href="<?= base_url('/index.php/subidaDatos'); ?>" class="btn btn-outline-primary">
                        <i class="fa-solid fa-caret-left"></i> Volver
                    </a>
                </div>
                <div class="text-center ">
                    <h1 class="fs-5">
                        <i class="fa-solid fa-calendar-check"></i> Crear Escuela
                    </h1>
                </div>
                <form action="<?= base_url('index.php/subidaDatos/crearEscuelaDesdeMenu') ?>" method="POST" enctype="multipart/form-data">

                    <label for="form-nombre"><b>Nombre: </b></label>
                    <input type="text" class="form-control" id="form-nombre" name="carnombre" required>

                    <label for="form-sede"><b>Sede: </b></label>
                    <div class="d-flex">
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="sede" id="sedeib" checked required value="1">
                            <label class="form-check-label" for="sedeib">
                                Ibarra
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="sede" id="sedetul" required value="2">
                            <label class="form-check-label" for="sedetul">
                                Tulcan
                            </label>
                        </div>
                    </div>

                    <label for="form-active"><b>Activa: </b></label>
                    <div class="d-flex">
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="activecar" id="sicar" required value="SÍ">
                            <label class="form-check-label" for="sicar">
                                Sí
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="activecar" id="nocar" checked required value="No">
                            <label class="form-check-label" for="nocar">
                                No
                            </label>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="<?= base_url('/index.php/subidaDatos'); ?>" class="btn btn-danger me-2">
                            <i class="fa-solid fa-xmark"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-success">
                            Crear Periodo
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>