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
                    <h5 class="modal-title" id="exampleModalLabel">Crear Directorio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="crearDirectorioForm" action="<?php echo base_url('index.php/normativas/crearDirectorio') ?>" method="POST" enctype="multipart/form-data">
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

    <!-- Campo de búsqueda -->
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">🔍</span>
        </div>
        <input type="text" id="searchBox" class="form-control" placeholder="Buscar archivos..." onkeyup="filtrarArchivos()">
    </div>

    <div class="container mt-4 p-2">
        <!-- Vista tipo grid de carpetas  -->
        <ul id="listaArchivos" class="list-unstyled d-flex flex-wrap">
            <?php foreach ($carpetas as $carpeta) : ?>
                <li style="margin: 5px;" class="card p-1 shadow">
                    <a href="<?php echo base_url('index.php/normativas/verCarpetaEspecifica/' . $carpeta) ?>" style="text-decoration: none;">
                        <div class="text-center">
                            <img src="<?php echo base_url('/public/imgs/files.png') ?>" alt="files" class="card-img-top" style="max-width: 100px; margin-left: auto; margin-right: auto;">
                        </div>
                        <div class="card-body">
                            <p class="card-title text-center"><b><?php echo $carpeta ?></b></p>
                            <!-- fecha  modificacion -->
                            <p class="card-text text-left fs-6 fw-light text-secondary">
                                <?php
                                $ruta = $directorio . DIRECTORY_SEPARATOR . $carpeta;
                                echo 'Modificación: ' . date("d/m/Y", filemtime($ruta));
                                ?>
                            </p>
                        </div>
                    </a>
                    <div class="card-footer text-center">

                        <!-- editar -->
                        <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarCarpetamodal" data-carpeta="<?php echo $carpeta ?>">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>

                        <!-- Modal Editar -->
                        <div class="modal fade" id="editarCarpetamodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="<?php echo base_url('index.php/normativas/editarCarpeta/'.$carpeta) ?>" method="POST">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-primary" id="exampleModalLabel">Editar Directorio: <h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label for="">Ingrese el nuevo nombre de la carpeta: </label>
                                            <input type="text" class="form-control" id="nombreDirectorio" name="nombreDirectorio" placeholder="" required>
                                            <!-- input hidden  -->
                                            <input type="text" name="directorio" value="" hidden>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Editar</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fa-solid fa-rectangle-xmark"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Script modal editar -->
                        <script>
                            // Agregar un evento clic a todos los botones "Editar"
                            document.querySelectorAll('[data-bs-target="#editarCarpetamodal"]').forEach(function(button) {
                                button.addEventListener('click', function() {
                                    // Obtener la carpeta correspondiente desde el atributo data-carpeta
                                    var carpeta = this.getAttribute('data-carpeta');

                                    // Actualizar el título del modal con el nombre de la carpeta
                                    document.querySelector('#editarCarpetamodal .modal-title').textContent = 'Editar Directorio: ' + carpeta;

                                    // Actualizar el valor del campo hidden
                                    document.querySelector('#editarCarpetamodal input[name="directorio"]').value = carpeta;
                                });
                            });
                        </script>
                        <!-- ver -->
                        <a href="<?php echo base_url('index.php//normativas/verCarpetaEspecifica/' . $carpeta) ?>" class="btn btn-outline-primary btn-sm">
                            <i class="fa-solid fa-eye"></i>
                        </a>

                        <!-- descargar -->
                        <a href="<?php echo base_url('index.php/normativas/descargarCarpetaComprimida/' . $carpeta) ?>" class="btn btn-outline-secondary btn-sm">
                            <i class="fa-solid fa-download"></i>
                        </a>

                        <!-- eliminar -->
                        <a href="<?php echo base_url('index.php/normativas/eliminarDirectorio/' . $carpeta) ?>" class="btn btn-outline-danger btn-sm">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                    </div>
                </li>
            <?php endforeach; ?>

            <!-- Vista tipo grid de archivos  -->
            <?php foreach ($archivos as $archivo) : ?>
                <li style="margin: 5px;" class="card p-1 shadow">
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

                        <div class="text-center"> <!-- Utiliza la clase "text-center" para centrar horizontalmente -->
                            <img src="<?php echo $icono ?>" alt="file" class="card-img-top" style="max-width: 100px; margin-left: auto; margin-right: auto;">
                        </div>
                        <div class="card-body">
                            <p class="card-title text-center text-danger"><b><?php echo $archivo ?></b></p>
                            <!-- fecha  modificacion -->
                            <p class="card-text text-left fs-6 fw-light text-secondary">
                                <?php
                                $ruta = $directorio . DIRECTORY_SEPARATOR . $archivo;
                                echo 'Modificación: ' . date("d/m/Y", filemtime($ruta));
                                ?>
                            </p>
                        </div>
                    </a>
                    <div class="card-footer text-center">

                        <!-- ver -->
                        <a href="<?php echo base_url('/public/files/Reglamento General de Estudiantes/' . $archivo) ?>" class="btn btn-outline-primary btn-sm m-1" target="_blank">
                            <i class="fa-solid fa-eye"></i>
                        </a>

                        <!-- descargar -->
                        <a href="<?php echo base_url('index.php/normativas/descargarPdf/' . $archivo) ?>" class="btn btn-outline-secondary btn-sm m-1" download>
                            <i class="fa-solid fa-download"></i>
                        </a>

                    </div>
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