<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center text-primary">Reglamento General Estudiantes
            </h2>
            <h4 class="text-center text-dark">
                1977 -
                <?php
                $fecha = date('Y');
                echo $fecha;
                ?>
            </h4>
        </div>
    </div>

    <!-- Contenido -->
    <!-- Crear archivo -->
    <!-- Botón para abrir el modal de creación de directorio -->
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearDirectorioModal">
                    <i class="fa-solid fa-folder-plus fa-xl"></i> Crear Directorio
                </button>
            </div>
        </div>
    </div>

    <!-- Modal para crear un directorio -->
    <div class="modal fade" id="crearDirectorioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Directorio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulario para ingresar el nombre del directorio -->
                    <form id="crearDirectorioForm">
                        <div class="mb-3">
                            <label for="nombreDirectorio" class="form-label">Nombre del Directorio:</label>
                            <input type="text" class="form-control" id="nombreDirectorio" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="crearDirectorioModal()">Crear</button>
                </div>
            </div>
        </div>
    </div>

    <div class="input-group mb-3 d-flex">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">🔍</span>
        </div>
        <input type="text" id="searchBox" placeholder="Buscar archivos..." class="rounded" onkeyup="filtrarArchivos()">
    </div>

    <div class="container mt-4">
        <!-- Vista tipo grid de carpetas  -->
        <ul id="listaArchivos">
            <?php foreach ($carpetas as $carpeta) : ?>
                <li style="display: inline-block; margin: 5px;" class="card p-1 shadow">
                    <a href="<?php echo base_url('/public/files/Reglamento General de Estudiantes/' . $carpeta) ?>" target="_blank" style="text-decoration: none;">
                        <img src="<?php echo base_url('/public/imgs/files.png') ?>" alt="files" width="100">
                        <div class="card-body">
                            <p class="card-text text-center"><?php echo $carpeta ?></p>
                        </div>
                    </a>
                </li>
            <?php endforeach; ?>

            <!-- Vista tipo grid de archivos  -->
            <?php foreach ($archivos as $archivo) : ?>
                <li style="display: inline-block; margin: 5px;" class="card p-1 shadow">
                    <a href="<?php echo base_url('/public/files/Reglamento General de Estudiantes/' . $archivo) ?>" target="_blank" style="text-decoration: none;">

                        <!-- asignar icono pdf y word -->
                        <?php
                        $extension = explode('.', $archivo);
                        $extension = end($extension);
                        if ($extension == 'pdf' || $extension == 'PDF') {
                            $icono = base_url('/public/imgs/pdf-file.png');
                        } else if ($extension == 'docx' || $extension == 'DOCX') {
                            $icono = base_url('/public/imgs/word.png');
                        } else {
                            $icono = base_url('/public/imgs/zip-file.png');
                        }
                        ?>

                        <img src="<?php echo $icono ?>" alt="pdf" width="100">

                        <div class="card-body">
                            <p class="card-text text-center"><?php echo $archivo ?></p>
                        </div>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<script>
    function filtrarArchivos() {
        // Variables
        let input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('searchBox');
        filter = input.value.toUpperCase();

        // Obtener la lista de archivos y carpetas
        ul = document.getElementById("listaArchivos");
        li = ul.getElementsByTagName('li');

        // Recorrer la lista de archivos y carpetas
        for (i = 0; i < li.length; i++) {
            // Obtener el nombre del archivo o carpeta
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;

            // Verificar si el nombre del archivo o carpeta contiene el filtro
            if (txtValue.toUpperCase().indexOf(filter) > -1 || filter === '') {
                // Mostrar el archivo o carpeta o restablecerlo si no hay filtro
                li[i].style.display = "inline-block";
            } else {
                // Ocultar el archivo o carpeta
                li[i].style.display = "none";
            }
        }
    }

    function crearDirectorio() {
        // Obtener el nombre del directorio ingresado por el usuario
        const nombreDirectorio = document.getElementById('nombreDirectorio').value;

        // Validar que el nombre no esté vacío
        if (nombreDirectorio.trim() === '') {
            alert('Por favor, ingrese un nombre para el directorio.');
            return;
        }


        // Cerrar el modal
        $('#crearDirectorioModal').modal('hide');

        // Limpiar el campo de nombre del directorio
        document.getElementById('nombreDirectorio').value = '';

    }
</script>