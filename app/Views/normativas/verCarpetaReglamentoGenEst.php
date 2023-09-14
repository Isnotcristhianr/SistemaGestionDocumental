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

                        <div class="card-footer">
                            <!-- ver -->
                            <a href="<?php echo base_url('/public/files/Reglamento General de Estudiantes/' . $archivo) ?>" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="fa-solid fa-eye"></i>
                            </a>

                            <!-- descargar -->
                            <a href="<?php echo base_url('index.php/normativas/descargarPDF/' . $archivo) ?>" class="btn btn-outline-secondary btn-sm">
                                <i class="fa-solid fa-download"></i>
                            </a>

                            <!-- eliminar -->
                            <a href="<?php echo base_url('index.php/normativas/eliminarArchivo/' . $archivo) ?>" class="btn btn-outline-danger btn-sm">
                                <i class="fa-solid fa-trash"></i>
                            </a>

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
</script>