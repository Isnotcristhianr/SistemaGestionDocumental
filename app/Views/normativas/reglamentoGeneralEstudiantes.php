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
    <div class="input-group mb-3 d-flex">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">🔍</span>
        </div>
        <input type="text" id="searchBox" placeholder="Buscar archivos..." class="rounded" onkeyup="filtrarArchivos()">
        <div class="m-2"></div>
    </div>
    <div class="container mt-4">
        <!-- Vista tipo grid de carpetas  -->
        <ul id="listaArchivos">
            <?php foreach ($carpetas as $carpeta) : ?>
                <li style="display: inline-block; margin: 5px;" class="card p-1 shadow">
                    <a href="<?php echo base_url('/public/files/Reglamento General de Estudiantes/' . $carpeta) ?>" target="_blank">
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
                    <a href="<?php echo base_url('/public/files/Reglamento General de Estudiantes/' . $archivo) ?>" target="_blank">

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
</script>