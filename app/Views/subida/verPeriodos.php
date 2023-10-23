<div class="container m-5 p-3">
    <div class="row justify-content-center">

        <div class="col-12 col-md-10">
            <div class="container border border-primary-subtle p-3 shadow rounded bg-light">
                <div class="mb-3 text-left">
                    <a href="<?= base_url('/index.php/subidaDatos'); ?>" class="btn btn-outline-primary">
                        <i class="fa-solid fa-caret-left"></i> Volver
                    </a>
                </div>
                <div class="text-center text-primary">
                    <h1 class="fs-5">
                        Ver Periodos
                    </h1>
                </div>

                <!-- tbl periodos -->
                <div class="table-responsive p-2 m-1">
                    <table class="table table-striped table-hover table-bordered text-center" id="tbl">
                        <thead class="table-primary">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Año</th>
                                <th scope="col">Periodo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($tbl_periodo as $periodo) : ?>
                                <tr>
                                    <td><?= $periodo['PER_ID'] ?></td>
                                    <td><?= $periodo['PER_ANO'] ?></td>
                                    <td><?= $periodo['PER_PERIODO'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>