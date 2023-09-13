<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div class="row ">
        <div class="col-12">
            <a href="<?= base_url('/index.php/calendarioAcademico'); ?>" class="btn btn-outline-primary m-4">← Volver</a>
        </div>
        <div class="card-body text-center">
            <h3 class="text-primary">Archivos de: <?= $nombre; ?></h3>

            <!-- Lista de archivos, cuadrícula horizontal -->
            <label for="" class="fs-2">Vista</label>
            <div>
                <input type="radio" name="grupo" id="list">
                <label for="list">
                    <i class="fa-solid fa-list"></i>
                    Lista
                </label>
                <input type="radio" name="grupo" id="grid" checked>
                <label for="grid">
                    <i class="fa-solid fa-grip"></i>
                    Cuadrícula
                </label>
            </div>
        </div>

        <div class="card m-3 p-3 shadow">
            <div class="m-2 p-1">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">🔍</span>
                    </div>
                    <input type="text" id="searchBox" placeholder="Buscar archivos..." class="rounded" oninput="filtrarArchivos()">
                </div>
            </div>

            <div id="vista">
                <!-- Contenedor para la vista de lista -->
                <div id="listaArchivos" style="display: none;">
                    <ul class="list-group m-1">
                        <?php foreach ($archivos as $archivo) : ?>
                            <a href="<?= base_url('index.php/calendarioAcademico/verPeriodo/' . $nombre . '/' . $archivo); ?>" style="text-decoration: none;">
                                <li class="list-group-item list-group-item-action">
                                    <img src="../../../public/imgs/files.png" alt="files" width="80">
                                    <?= $archivo; ?>
                                </li>
                            </a>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- Contenedor para la vista de cuadrícula (inicialmente oculto) -->
                <div id="gridArchivos" style="display: block;">
                    <?php foreach ($archivos as $archivo) : ?>
                        <div style="display: inline-block; margin: 5px;" class="card p-1 shadow">
                            <a href="<?= base_url('index.php/calendarioAcademico/verPeriodo/' . $nombre . '/' . $archivo); ?>" style="text-decoration: none;">
                                <img src="../../../public/imgs/files.png" alt="files" width="100">
                                <br>
                                <?= $archivo; ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Obtener elementos HTML
    const list = document.getElementById('list');
    const grid = document.getElementById('grid');
    const listaArchivos = document.getElementById('listaArchivos');
    const gridArchivos = document.getElementById('gridArchivos');
    const searchBox = document.getElementById('searchBox');
    const vista = document.getElementById('vista');

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
            if (textoElemento.includes(textoBuscado) || textoBuscado === '') {
                elemento.style.display = 'block';
            } else {
                elemento.style.display = 'none';
            }
        });

        elementosGrid.forEach((elemento) => {
            const textoElemento = elemento.textContent.toLowerCase();
            if (textoElemento.includes(textoBuscado) || textoBuscado === '') {
                elemento.style.display = 'block';
            } else {
                elemento.style.display = 'none';
            }
        });

        // Mantener el estilo (grid o lista) dependiendo de la vista seleccionada
        if (list.checked) {
            vista.style.display = 'block';
        } else if (grid.checked) {
            vista.style.display = 'inline-block';
        }
    }
</script>

