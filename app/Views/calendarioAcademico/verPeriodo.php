<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">

    <div class="row ">
        <div class="col-12">
            <a href="<?= base_url('/index.php/calendarios/ver/' . $nombre); ?>" class="btn btn-outline-primary m-4">← Volver</a>
        </div>
        <div class="col-12">
            <div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded text-center">
                <h3 class="text-primary">Calendarios Academicos: <?= $nombre; ?></h3>

                <!-- Insertar -->
                <button onclick="showModal();" class="btn btn-success">
                    <i class="fa-solid fa-file-circle-plus fa-xl"></i>
                    Subir Calendario
                </button>

                <br>


                <!-- Modal subir calendario -->
                <dialog id="modal" class="modal-dialog ">
                    <form action="<?= base_url('index.php/calendarioAcademico/insertar/' . $nombre); ?>" method="POST" enctype="multipart/form-data">
                        <div class="modal-content text-center d-flex">
                            <div class="modal-header">
                                <h3 class="modal-title text-primary">Nuevo Calendario</h3>
                                <h5 class="text-secondary"><b>Fichero: </b> <br><?php echo $periodo; ?></h5>
                            </div>
                            <label for="text" class="text-secondary"><b>Solo se adminten archivos <i class="fa-regular fa-file-pdf fa-xl"></i></b></label>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="archivo" class="form-label"><b>Subir archivo <i class="fa-solid fa-arrow-up-from-bracket"></i> </b></label>

                                    <div class="input-group mb-3">
                                        <input type="file" name="archivo" id="inputGroupFile02" class="form-control" accept="application/pdf" required>
                                        <label class="input-group-text" for="inputGroupFile02">.pdf</label>
                                    </div>

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
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Subir</button>
                                <button onclick="closeModal();" class="btn btn-danger"><i class="fa-solid fa-rectangle-xmark"></i></button>
                            </div>
                        </div>
                    </form>
                </dialog>


                <!-- Lista de archivos, cuadrícula horizontal -->
                <label for="" class="fs-2">Vista</label>
                <div class="text-center">
                    <input type="radio" name="grupo" id="list">
                    <label for="list">
                        <i class="fa-solid fa-list"></i>
                        Lista</label>
                    <input type="radio" name="grupo" id="grid" checked>
                    <label for="grid">
                        <i class="fa-solid fa-grip"></i>
                        Cuadrícula</label>
                </div>
            </div>

        </div>
    </div>
    <div class="card m-3 p-3 shadow">
        <div class="justify-content-center">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">🔍</span>
                </div>
                <input type="text" id="searchBox" placeholder="Buscar archivos..." class="rounded">
            </div>
        </div>
        <div id="vista">
            <!-- Contenedor para la vista de lista -->
            <div id="listaArchivos" style="display: none;">

                <ul class="list-group m-1">
                    <?php foreach ($archivos as $archivo) : ?>
                        <a href="<?= base_url('index.php/calendarioAcademico/descargar/' . $nombre . '/' . $archivo); ?>" style="text-decoration: none;">
                            <li class="list-group-item list-group-item-action">
                                <img src="../../../../public/imgs/pdf-file.png" alt="pdf" width="60">
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
                            <!-- editar -->
                            <a href="<?= base_url('index.php/calendarioAcademico/editar/' . $nombre . '/' . $archivo); ?>" class="btn btn-warning m-1 d-flex justify-content-end">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <!-- eliminar -->
                            <a href="<?= base_url('index.php/calendarioAcademico/eliminar/' . $nombre . '/' . $archivo); ?>" class="btn btn-danger m-1 d-flex justify-content-end">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <!-- ver -->
                            <a href="<?= base_url('index.php/calendarioAcademico/verPdf/'  . $nombre . '/' . $periodo . '/' . $archivo); ?>" class="btn btn-primary m-1 d-flex justify-content-end">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <!-- Descargar -->
                            <a href="<?= base_url('index.php/calendarioAcademico/descargar/' . $nombre . '/' . $periodo . '/' . $archivo); ?>" class="btn btn-secondary m-1 d-flex justify-content-end">
                                <i class="fa-solid fa-download"></i>
                            </a>
                        </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Contenedor para la vista de cuadrícula (inicialmente oculto) -->
            <div id="gridArchivos" style="display: block;">
                <?php foreach ($archivos as $archivo) : ?>
                    <div style="display: inline-block; margin: 5px;" class="card p-1 shadow">
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
                            <!-- editar -->
                            <a href="<?= base_url('index.php/calendarioAcademico/editar/' . $nombre . '/' . $archivo); ?>" class="btn btn-warning m-1 d-flex justify-content-end">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <!-- eliminar -->
                            <a href="<?= base_url('index.php/calendarioAcademico/eliminar/' . $nombre . '/' . $archivo); ?>" class="btn btn-danger m-1 d-flex justify-content-end">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <!-- ver -->
                            <a href="<?= base_url('index.php/calendarioAcademico/verPdf/'  . $nombre . '/' . $periodo . '/' . $archivo); ?>" class="btn btn-primary m-1 d-flex justify-content-end">
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
        <script>
            //todo MODAL
            // Función para abrir el modal y mostrar el fondo opaco
            function showModal() {
                const modal = document.querySelector('#modal');
                const overlay = document.querySelector('#overlay');

                // Centrar  modal
                const windowHeight = window.innerHeight;
                const modalHeight = modal.clientHeight;
                const topOffset = (windowHeight - modalHeight) / 2;
                modal.style.top = topOffset + 'px';

                modal.showModal();
                overlay.style.display = 'block';
            }

            // Función para cerrar el modal y ocultar el fondo opaco
            function closeModal() {
                const modal = document.querySelector('#modal');
                const overlay = document.querySelector('#overlay');
                modal.close();
                overlay.style.display = 'none';
                document.body.style.overflow = ''; // Habilita el scroll del cuerpo nuevamente
            }

            // Obtener elementos HTML
            const list = document.getElementById('list');
            const grid = document.getElementById('grid');
            const listaArchivos = document.getElementById('listaArchivos');
            const gridArchivos = document.getElementById('gridArchivos');
            const searchBox = document.getElementById('searchBox');

            // Agregar oyentes de eventos para los radio buttons
            list.addEventListener('change', mostrarVista);
            grid.addEventListener('change', mostrarVista);

            // Agregar oyente de evento para el cuadro de búsqueda
            searchBox.addEventListener('input', filtrarArchivos);

            function mostrarVista() {
                if (list.checked) {
                    listaArchivos.style.display = 'block';
                    gridArchivos.style.display = 'none';
                } else if (grid.checked) {
                    listaArchivos.style.display = 'none';
                    gridArchivos.style.display = 'block';
                }
            }

            function filtrarArchivos() {
                const textoBuscado = searchBox.value.toLowerCase();
                const elementosLista = listaArchivos.querySelectorAll('li');
                const elementosGrid = gridArchivos.querySelectorAll('.card');

                elementosLista.forEach((elemento) => {
                    const textoElemento = elemento.textContent.toLowerCase();
                    if (textoElemento.includes(textoBuscado)) {
                        elemento.style.display = 'block';
                    } else {
                        elemento.style.display = 'none';

                    }


                });

                elementosGrid.forEach((elemento) => {
                    const textoElemento = elemento.textContent.toLowerCase();
                    if (textoElemento.includes(textoBuscado)) {
                        elemento.style.display = 'block';
                    } else {
                        elemento.style.display = 'none';
                    }
                });

                if (list.checked === true) {
                    const elementosMostrados = listaArchivos.querySelectorAll('li[style="display: block;"]');
                    if (elementosMostrados.length === 0) {
                        const listaVacia = document.createElement('li');
                        listaVacia.textContent = 'No se encontraron archivos';
                        listaVacia.id = 'listaVacia';
                        listaVacia.classList.add('list-group-item');
                        listaVacia.classList.add('list-group-item-action');
                        listaArchivos.appendChild(listaVacia);
                    }
                } else if (grid.checked === true) {
                    const elementosMostrados = gridArchivos.querySelectorAll('.card[style="display: inline-block; margin: 5px;"]');
                    if (elementosMostrados.length === 0) {
                        const listaVacia = document.createElement('div');
                        listaVacia.textContent = 'No se encontraron archivos';
                        listaVacia.id = 'listaVacia';
                        listaVacia.classList.add('card');
                        listaVacia.classList.add('p-1');
                        listaVacia.classList.add('shadow');
                        gridArchivos.appendChild(listaVacia);
                    }
                }

            }
        </script>
    </div>
</div>
</div>

<div id="overlay" class="overlay"></div>