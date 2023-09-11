<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- volver -->
    <div class="row">
        <div class="col-12">
            <a href="<?= base_url('/index.php/calendarios/ver/' . $nombre); ?>" class="btn btn-outline-primary m-4">← Volver</a>
        </div>
    </div>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Calendarios Académicos</h2>
            <h4 class="text-center text-dark"><?= $nombre; ?></h4>
        </div>
    </div>
    <div class="card m-3 p-3 shadow">
        <h3 class="text-primary">Archivos de: <?= $nombre; ?></h3>
        <div class="m-2 p-1">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">🔍</span>
                </div>
                <input type="text" id="searchBox" placeholder="Buscar archivos..." class="rounded">
            </div>
        </div>
        <div class="card-body">
            <!-- Lista de archivos, cuadricula horizontal -->
            <label for="" class="fs-2">Vista</label>
            <div>
                <input type="radio" name="grupo" id="list">
                <label for="list">
                    <i class="fa-solid fa-list"></i>
                    Lista</label>
                <input type="radio" name="grupo" id="grid" checked>
                <label for="grid">
                    <i class="fa-solid fa-grip"></i>
                    Cuadricula</label>
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
                                            $archivo
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
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <script>
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