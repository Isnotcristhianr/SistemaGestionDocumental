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
                        <i class="fa-solid fa-calendar-check"></i> Crear Periodo
                    </h1>
                </div>
                <form action="<?= base_url('index.php/subidaDatos/crearPeriodoDesdeMenu') ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="añotextPeriodo" class="form-label"><b>Año:</b></label>
                        <input type="text" class="form-control" id="añotextPeriodo" name="anoperiodo" required>
                    </div>
                    <div class="mb-3">
                        <label for="periodoNombre" class="form-label"><b>Periodo Nombre:</b></label>
                        <input type="text" class="form-control" id="periodoNombre" name="nombreperiodo" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label"><b>Periodo Actual:</b></label>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="activoper" id="siper" required value="1">
                                <label class="form-check-label" for="siper">
                                    Sí
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="activoper" id="noper" checked required value="0">
                                <label class="form-check-label" for="noper">
                                    No
                                </label>
                            </div>
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