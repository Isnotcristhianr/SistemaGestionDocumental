<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card bg-light shadow-lg p-3 mb-5 rounded">
                <div class="col-12">
                    <a href="<?= base_url('/index.php/calendarioAcademico'); ?>" class="btn btn-outline-primary mb-4">← Volver</a>
                </div>
                <div class="card-body text-center">
                    <h3 class="text-primary">Archivos de: <?= $nombre; ?></h3>

                    <!-- Crear directorio -->
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#crearDirectorioModal">
                                    <i class="fa-solid fa-folder-plus fa-xl"></i> Crear Directorio
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal para crear un directorio -->
                    <div class="modal fade" id="crearDirectorioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-primary" id="exampleModalLabel">Crear Directorio</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form id="crearDirectorioForm" action="<?php echo base_url('index.php/calendarioAcademico/crearCarpeta/' . $nombre) ?>" method="POST" enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <!-- Formulario para ingresar el nombre del directorio -->
                                        <div class="mb-3">
                                            <label for="nombreDirectorio" class="form-label">Nombre del Directorio:</label>
                                            <input type="text" class="form-control" id="nombreDirectorio" name="nombreDirectorio" required>
                                        </div>
                                        <!-- directorio actual hidden -->
                                        <input type="hidden" name="directorio" value="<?php echo $directorio ?>">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Crear</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-rectangle-xmark"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

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
                    <div class="container mt-4 p-2">
                        <?php foreach ($archivos as $archivo) : ?>
                            <div style="display: inline-block; margin: 2px;" class="card shadow">
                                <a href="<?= base_url('index.php/calendarioAcademico/verPeriodo/' . $nombre . '/' . $archivo); ?>" class="card-img-top" style="max-width: 100px; margin-left: auto; margin-right: auto;">
                                    <div class="text-center">
                                        <img src="../../../public/imgs/files.png" alt="files" class="card-img-top" style="max-width: 100px; margin-left: auto; margin-right: auto;">
                                    </div>
                                </a>
                                <p class="card-title text-center text-primary"><b><?= $archivo; ?></b></p>
                                <!-- modificacion -->
                                <p class="card boddy card-text text-left fs-6 fw-light text-secondary p-2">
                                    <?php
                                    $ruta = $directorio . DIRECTORY_SEPARATOR . $archivo;
                                    echo 'Modificación: ' . date("d/m/Y", filemtime($ruta));
                                    ?>
                                </p>
                                <div class="card-footer">
                                    <!-- Editar -->
                                    <a href="" class="btn btn-outline-warning btn-sm">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>


                                    <!-- Ver -->
                                    <a href="<?= base_url('index.php/calendarioAcademico/verPeriodo/' . $nombre . '/' . $archivo); ?>" class="btn btn-outline-primary btn-sm">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <!-- Descargar -->
                                    <a href="<?php echo base_url('index.php/calendarioAcademico/descargarZipCarpeta/' . $nombre . '/' . $archivo) ?>" class="btn btn-outline-secondary btn-sm">
                                        <i class="fa-solid fa-download"></i>
                                    </a>

                                    <!-- Eliminar -->
                                    <a href="<?php echo base_url('index.php/calendarioAcademico/eliminarCarpeta/' . $nombre . '/' . $archivo) ?>" class="btn btn-outline-danger btn-sm">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
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