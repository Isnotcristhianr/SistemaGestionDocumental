<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Calendarios Académicos</h2>
            <h4 class="text-center text-dark"><?= $nombre; ?></h4>
        </div>
    </div>
    <div class="card m-3 shadow p-2">
        <h3>Archivos de <?= $nombre; ?></h3>
        <div class="card-body">
            <!-- Lista de archivos -->
            <ul>
                <?php foreach ($archivos as $archivo) : ?>
                    <li>
                        <a href="<?= base_url('index.php/calendarioAcademico/verArchivo/' . $nombre . '/' . $archivo); ?>">
                            <?= $archivo; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
