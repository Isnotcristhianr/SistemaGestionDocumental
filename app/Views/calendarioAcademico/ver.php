<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card bg-light shadow-lg p-3 mb-5 rounded">
                <div class="col-12">
                    <a href="<?= base_url('/index.php/calendarioAcademico'); ?>" class="btn btn-outline-primary mb-4">← Volver</a>
                </div>
                <div class="card-body text-center">
                    <h3 class="text-primary">Archivos de: <?= $nombre; ?></h3>
                </div>
                <div class="card m-3 p-3 shadow" style="background-color: rgba(175, 175, 175, 0.16);">
                    <div class="m-2 p-1">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">🔍</span>
                            </div>
                            <input type="text" id="searchBox" placeholder="Buscar archivos..." class="form-control rounded">
                        </div>
                    </div>

                    <!-- Contenedor para la vista de cuadrícula (inicialmente oculto) -->
                    <div id="gridArchivos" style="display: block;" class="p-2">
                        <?php foreach ($archivos as $archivo) : ?>
                            <div style="display: inline-block; margin: 5px;" class="card p-2 shadow">
                                <a href="<?= base_url('index.php/calendarioAcademico/verPeriodo/' . $nombre . '/' . $archivo); ?>" class="card-img-top" style="max-width: 100px; margin-left: auto; margin-right: auto;">
                                <div class="text-center">
                                    <img src="../../../public/imgs/files.png" alt="files" class="card-img-top" style="max-width: 100px; margin-left: auto; margin-right: auto;">                                    
                                </div>    
                                </a>
                                <p class="card-title text-center text-primary"><b><?= $archivo; ?></b></p>
                                <!-- modificacion -->
                                <p class="card-text text-left fs-6 fw-light text-secondary">
                                    <?php
                                    $ruta = $directorio . DIRECTORY_SEPARATOR . $archivo;
                                    echo 'Modificación: ' . date("d/m/Y", filemtime($ruta));
                                    ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Obtener elementos HTML
    const searchBox = document.getElementById('searchBox');
    const gridArchivos = document.getElementById('gridArchivos');

    // Agregar oyente de evento para el cuadro de búsqueda
    searchBox.addEventListener('input', filtrarArchivos);

    function filtrarArchivos() {
        const textoBuscado = searchBox.value.toLowerCase();
        const elementosGrid = gridArchivos.querySelectorAll('.card');

        elementosGrid.forEach((elemento) => {
            const textoElemento = elemento.textContent.toLowerCase();
            if (textoElemento.includes(textoBuscado) || textoBuscado === '') {
                elemento.style.display = 'inline-block';
            } else {
                elemento.style.display = 'none';
            }
        });
    }
</script>
