<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">

    <div class="row">
        <div class="col-12">
            <div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded text-center">
                <div class="col-12 d-flex">
                    <a href="<?= base_url('/index.php/calendarios/ver/' . $nombre); ?>" class="btn btn-outline-primary m-4">← Volver</a>
                </div>
                <h3 class="text-primary">Calendarios Academicos: <?= $nombre; ?></h3>
                <br>
            </div>
        </div>
    </div>

    <div class="card m-3 p-3 shadow"  style="background-color: rgba(175, 175, 175, 0.16);">
        <div class="justify-content-center">

            <!-- Directorio Raiz -->
            <div class="container d-flex">
                <img src="../../../../public/imgs/files.png" alt="file" width="100">
                <h4 class=" text-center mt-5 text-primary">Directorio: <?php echo $periodo ?></h4>
            </div>
            <!-- Insertar -->
            <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#subirCalendarioModal">
                <i class="fa-solid fa-file-circle-plus fa-xl"></i>
                Subir Calendario
            </button>

            <!-- Modal subir calendario -->
            <div class="modal fade" id="subirCalendarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Formulario para ingresar el nombre del directorio -->
                        <form action="<?= base_url('index.php/calendarioAcademico/insertar/' . $nombre); ?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-content text-center d-flex">
                                <div class="modal-header">
                                    <h3 class="modal-title text-primary">Nuevo Calendario</h3>
                                    <h5 class="text-secondary"><b>Fichero: </b> <br><?php echo $periodo; ?></h5>
                                </div>
                                <label for="text" class="text-secondary"><b>Solo se admiten archivos <i class="fa-regular fa-file-pdf fa-xl"></i></b></label>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="archivo" class="form-label"><b>Subir archivo <i class="fa-solid fa-arrow-up-from-bracket"></i> </b></label>
                                        <div class="input-group mb-3">
                                            <input type="file" name="archivo" id="inputGroupFile02" class="form-control" accept="application/pdf" required>
                                            <label class="input-group-text" for="inputGroupFile02">.pdf</label>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <label for="name" class="form-label"><b>Nombre del Calendario:</b></label>
                                            <input type="text" name="name" id="name" class="form-control text-center" placeholder="Ingrese el nombre del Archivo..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="periodo" id="periodo" class="form-control text-center" value="<?php echo $periodo ?>" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Subir</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-rectangle-xmark"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3 d-flex">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">🔍</span>
                </div>
                <input type="text" id="searchBox" placeholder="Buscar archivos..." class="form-control rounded">
            </div>


        </div>
        <!-- Contenedor para la vista de cuadrícula (inicialmente oculto) -->
        <div id="gridArchivos" style="display: block;">
            <?php foreach ($archivos as $archivo) : ?>
                <div style="display: inline-block; margin: 5px;" class="card p-3 shadow">
                    <a href="<?= base_url('index.php/calendarioAcademico/descargar/' . $nombre . '/' .
                                    /* periodo */
                                    $periodo
                                    . '/'
                                    . $archivo); ?>" style="text-decoration: none;">
                        <img src="../../../../public/imgs/pdf-file.png" alt="pdf" width="80">
                        <?= $archivo; ?>
                        <div class="text-dark">
                            <!-- fecha modificacion -->
                            <br>
                            <?php echo "Fecha de modificación: " . $fechaModificacion; ?>
                            <!-- tamaño archivo -->
                            <br>
                            <?php echo "Tamaño del archivo: " . $tamañoArchivo . " KB"; ?>
                        </div>
                    </a>
                    <div style=" align-items: center; display: flex;">
                        <!-- Botón para editar -->
                        <button type="button" class="btn btn-warning m-1 d-flex justify-content-end" data-bs-toggle="modal" data-bs-target="#editarcalendariomodal">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
    
                        <!-- Modal editar calendario -->
                        <div class="modal fade" id="editarcalendariomodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Formulario para editar el calendario -->
                                    <form action="<?= base_url('index.php/calendarioAcademico/editar/' . $nombre . '/' . $periodo . '/' . $archivo); ?>" method="post" enctype="multipart/form-data">
                                        <div class="modal-content text-center d-flex">
                                            <div class="modal-header">
                                                <h3 class="modal-title text-primary">Editar Calendario</h3>
                                                <h5 class="text-secondary"><b>Fichero: <?= $archivo; ?></b></h5>
                                            </div>
                                            <label for="text" class="text-secondary"><b>Modifique al menos un atributo</b></label>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="archivo" class="form-label"><b>Cambiar archivo PDF <i class="fa-solid fa-arrow-up-from-bracket"></i> (opcional)</b></label>
                                                    <div class="input-group mb-3">
                                                        <input type="file" name="nuevo_archivo" id="inputGroupFile02" class="form-control" accept="application/pdf" value="<?= $archivo; ?>">
                                                        <label class="input-group-text" for="inputGroupFile02">.pdf</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="form-label"><b>Nuevo nombre del Calendario (opcional)</b></label>
                                                    <input type="text" name="nuevo_nombre" id="name" class="form-control text-center" placeholder="Ingrese el nuevo nombre del Archivo...">
                                                </div>
                                                <input type="hidden" name="archivo_actual" value="<?= $archivo; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-rectangle-xmark"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
    
                        <!-- eliminar -->
                        <a href="<?= base_url('index.php/calendarioAcademico/eliminar/' . $nombre . '/' . $periodo . '/' . $archivo); ?>" class="btn btn-danger m-1 d-flex justify-content-end">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                        <!-- ver -->
                        <a href="<?= base_url('index.php/calendarioAcademico/verPdf/'  . $nombre . '/' . $periodo . '/' . $archivo); ?>" class="btn btn-primary m-1 d-flex justify-content-end" target="_blank">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <!-- Descargar -->
                        <a href="<?= base_url('index.php/calendarioAcademico/descargar/' . $nombre . '/' . $periodo . '/' . $archivo); ?>" class="btn btn-secondary m-1 d-flex justify-content-end">
                            <i class="fa-solid fa-download"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

<div id="overlay" class="overlay"></div>
<script>
    // Obtener elementos HTML
    const grid = document.getElementById('grid');
    const gridArchivos = document.getElementById('gridArchivos');
    const searchBox = document.getElementById('searchBox');


    // Agregar oyente de evento para el cuadro de búsqueda
    searchBox.addEventListener('input', filtrarArchivos);

    function mostrarVista() {
        if (grid.checked) {
            gridArchivos.style.display = 'block';
        }
    }

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