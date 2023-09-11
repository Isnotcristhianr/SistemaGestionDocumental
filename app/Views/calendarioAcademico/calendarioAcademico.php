<!-- Datos Estadisticos -->

<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Calendarios Academicos
            </h2>
            <h4 class="text-center text-dark">1977 - 2023
            </h4>
        </div>
    </div>

    <!-- Contenido-->
    <div class="container mt-4">
        <div class="row">
            <?php foreach ($archivos as $archivo) : ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow">
                        <div class="card-body d-flex justify-content-center align-items-center">
                            <h5 class="card-title">
                                <img src="../public//imgs/files.png" alt="files" width="60">
                                <?= $archivo; ?>
                            </h5>
                            <a href="<?= base_url('/index.php/calendarios/ver/' . $archivo); ?>" class="btn btn-primary m-4">Ver →</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


</div>