<div class="container m-5 p-3">
    <div class="row justify-content-center">

        <div class="col-12 col-md-12">
            <div class="container border border-primary-subtle p-3 shadow rounded bg-light text-primary">
                <div class="mb-3 text-left">
                    <a href="<?= base_url('/index.php/subidaDatos'); ?>" class="btn btn-outline-primary">
                        <i class="fa-solid fa-caret-left"></i> Volver
                    </a>
                </div>
                <div class="text-center ">
                    <h2 class="fs-4">
                        <i class="fa-solid fa-upload "></i>
                        Subir conjunto de datos
                    </h2>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalayuda">
                        <i class="fa-solid fa-question"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalayuda" tabindex="-1" aria-labelledby="modalayuda" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalayuda">Ayuda Subir Conjunto de Datos</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Pasos subir conjunto de datos csv -->
                                    <!-- Pasos subir conjunto de datos CSV -->
                                    <ol class="list-group list-group-numbered">
                                        <li class="list-group-item list-group-item-secondary">Descargar la plantilla de datos en formato CSV desde el sistema.</li>
                                        <li class="list-group-item list-group-item-secondary">Abrir el archivo CSV descargado utilizando Microsoft Excel u otro software de hojas de cálculo.</li>
                                        <li class="list-group-item list-group-item-secondary">Actualizar los datos en la plantilla según las instrucciones proporcionadas.</li>
                                        <li class="list-group-item list-group-item-secondary">Guardar el archivo CSV después de realizar las actualizaciones.</li>
                                        <li class="list-group-item list-group-item-secondary">Ir a la sección de 'Subir Datos' en el sistema.</li>
                                        <li class="list-group-item list-group-item-secondary">Seleccionar el archivo CSV actualizado haciendo clic en el botón 'Examinar' o 'Seleccionar Archivo'.</li>
                                        <li class="list-group-item list-group-item-secondary">Hacer clic en el botón 'Subir' para cargar el archivo CSV al sistema.</li>
                                        <li class="list-group-item list-group-item-secondary">Esperar a que el sistema confirme la subida exitosa del archivo.</li>
                                        <li class="list-group-item list-group-item-secondary">Verificar los datos subidos para asegurarse de que la información esté correcta en el sistema.</li>
                                    </ol>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>