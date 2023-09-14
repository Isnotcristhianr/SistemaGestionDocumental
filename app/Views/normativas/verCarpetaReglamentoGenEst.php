<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div class="row">
        <!-- volver -->
        <div class="col-12">
            <a href="<?php echo base_url('index.php/normativas/reglamentoGeneralEstudiantes') ?>" class="btn btn-outline-primary">← Volver</a>
        </div>
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

            <h5 class="text-center text-secondary">Directorio: <?php echo $carpeta ?> </h5>

            <!-- Subir Archivo -->
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-primary m-3" data-bs-toggle="modal" data-bs-target="#subirArchivoModal">
                            <i class="fa-solid fa-file-circle-plus"></i> Subir Archivo
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal subir archivo -->
            <div class="modal fade" id="subirArchivoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-primary" id="exampleModalLabel">Subir Archivo</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?php echo base_url('index.php/normativas/subirArchivoEspecifico') ?>" method="POST" enctype="multipart/form-data">

                            <div class="modal-body text-center">
                                <label for="text" class="text-secondary "><b>Solo se admiten archivos
                                        <i class="fa-regular fa-file-pdf fa-xl"></i>
                                        <i class="fa-regular fa-file-word fa-xl"></i>

                                    </b></label>
                                <div class="mb-3">
                                    <label for="archivo" class="form-label">Seleccionar Archivo</label>
                                    <div class="input-group mb-3">
                                        <input type="file" name="archivo" id="inputGroupFile02" class="form-control" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" required>
                                        <label class="input-group-text" for="inputGroupFile02">.pdf/.doc</label>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="nombreDirectorio" class="form-label">Nombre del Archivo</label>
                                    <input class="form-control" type="text" name="nombreDirectorio">
                                </div>
                                <div class="mb-4">
                                    <input class="form-control" type="text" name="carpeta" value="<?php echo $carpeta ?>" hidden>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Subir Archivo</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
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
        <!-- Vista tipo grid de archivos  -->
        <ul id="listaArchivos" class="list-unstyled d-flex flex-wrap">

            <?php foreach ($archivos as $archivo) : ?>
                <li style="margin: 5px;" class="card p-1 shadow">
                    <a href="<?php echo base_url('/public/files/Reglamento General de Estudiantes/' . $carpeta . '/' . $archivo) ?>" target="_blank" style="text-decoration: none;">
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

                        <div class="card-body">
                            <div class="text-center">
                                <img src="<?php echo $icono ?>" alt="icono" alt="file" class="card-img-top" style="max-width: 100px; margin-left: auto; margin-right: auto;">
                                <?php
                                if ($extension == 'pdf' || $extension == 'PDF') {
                                    echo '<p class="card-title text-danger"><b>' . $archivo . '</b></p>';
                                } else if ($extension == 'docx' || $extension == 'DOCX') {
                                    echo '<p class="card-title text-primary"><b>' . $archivo . '</b></p>';
                                }
                                ?>
                            </div>
                        </div>

                        </a>
                        <div class="card-footer text-center">

                            <!-- btn editar -->
                            <button type="button" class="btn btn-outline-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editarreglamentomodal">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            <!-- modal editar archivo -->
                            <div class="modal fade" id="editarreglamentomodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="" method="get">
                                        <div class="modal-content text-center d-flex">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-primary">
                                                    Editar Archivo
                                                </h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
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
                                                <button type="submit" class="btn btn-success">Editar Archivo</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                                    <i class="fa-solid fa-xmark"></i>
                                                </button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- ver -->
                            <a href="<?php echo base_url('/public/files/Reglamento General de Estudiantes/' . $carpeta . '/' . $archivo) ?>" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <!-- descargar -->
                            <a href="<?php echo base_url('index.php/normativas/descargarArchivoEspecifico/' . $carpeta . '/' . $archivo) ?>" class="btn btn-outline-secondary btn-sm">
                                <i class="fa-solid fa-download"></i>
                            </a>

                            <!-- eliminar -->
                            <a href="<?php echo base_url('index.php/normativas/eliminarArchivoEspecifico/' . $carpeta . '/'  . $archivo) ?>" class="btn btn-outline-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
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
</script>