<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Calendarios Académicos</h2>
            <h4 class="text-center text-dark"><?= $nombre; ?></h4>
        </div>
    </div>
    <div class="card m-3 p-3 shadow">
        <h3>Archivos de: <?= $nombre; ?></h3>
        <div>
            <label for="searchBox">Búsqueda: </label>
            <input type="text" id="searchBox" placeholder="Buscar archivos..." class="rounded">
        </div>
        <div class="card-body">
            <!-- Lista de archivos, cuadricula horizontal -->
            <label for="" class="fs-2">Vista</label>
            <div>
                <input type="radio" name="grupo" id="list" checked>
                <label for="list">
                    <i class="fa-solid fa-list"></i>
                    Lista</label>
                <input type="radio" name="grupo" id="grid">
                <label for="grid">
                    <i class="fa-solid fa-grip"></i>
                    Cuadricula</label>
            </div>

            <div id="vista">
                <!-- Contenedor para la vista de lista -->
                <div id="listaArchivos" style="display: block;">

                    <ul class="list-group m-1">
                        <?php foreach ($archivos as $archivo) : ?>
                            <a href="<?= base_url('index.php/calendarioAcademico/verArchivo/' . $nombre . '/' . $archivo); ?>" style="text-decoration: none;">
                                <li class="list-group-item list-group-item-action">
                                    <img src="../../../public/imgs/files.png" alt="files" width="80">
                                    <?= $archivo; ?>
                            </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Contenedor para la vista de cuadrícula (inicialmente oculto) -->
                <div id="gridArchivos" style="display: none;">

                    <?php foreach ($archivos as $archivo) : ?>
                        <div style="display: inline-block; margin: 10px;" class="card p-2 shadow">
                            <a href="<?= base_url('index.php/calendarioAcademico/verArchivo/' . $nombre . '/' . $archivo); ?>" style="text-decoration: none;" class="color">
                                <img src="../../../public/imgs/files.png" alt="files" width="100">
                                <br>
                                <?= $archivo; ?>
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
                }
            </script>

        </div>
    </div>
</div>