<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div class="row  align-items-center">
        <div class="col-12">
            <a href="<?= base_url('/index.php/subidaDatos'); ?>" class="btn btn-outline-primary">
                <i class="fa-solid fa-caret-left"></i> Volver
            </a>
        </div>
        <div class="col-12">
            <h3 class="text-center text-primary m-3">
                <i class="fa-solid fa-chart-simple fa-sm"></i>
                Subir Datos Manualmente
                <i class="fa-solid fa-chart-simple fa-sm"></i>
            </h3>
        </div>
        <div class="col">
            <div class="card m-2 p-2">
                <div class="header text-center">
                    <img src="<?php echo base_url('/public/imgs/secretary2.png') ?>" alt="secretaryManual" class="img img-fluid m-1 p-1">
                </div>
                <div class="tittle text-center">
                    <h4 class="text text-secondary">Subida de datos Matriz Estudiantes</h4>
                </div>
                <div class="body">
                    <div class="form text-center ">
                        <form action="<?php echo base_url('index.php/subidaDatos/enviarManualmente') ?>" method="POST" enctype="multipart/form-data">

                            <!-- Generales -->
                            <div class="container col-md-6">
                                <!-- Tipo -->
                                <div class="mb-3 d-flex text-center justify-content-center align-items-center">
                                    <label class="form-label fw-bold fs-6">Tipo: </label>
                                    <input type="text" list="tipo" class="form-control m-2 p-1" name="id_carrera_tipo" required>
                                    <datalist id="tipo">
                                        <!-- Obtener valores de la tabla-->
                                        <?php foreach ($tbl_carrera_tipo as $tipo) : ?>
                                            <option value="<?php echo $tipo['CTIP_NOMBRE']; ?>"></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>

                                <!-- Condicion -->
                                <div class="mb-3 d-flex text-center justify-content-center align-items-center">
                                    <label class="form-label fw-bold fs-6">Condición: </label>
                                    <input type="list" list="condicion" class="form-control m-2 p-1" name="id_condicion" required>
                                    <datalist id="condicion">
                                        <option value="" selected disabled>Seleccione</option>
                                        <!-- Obtener valores de la tbl -->
                                        <?php foreach ($tbl_estudiante as $condicion) : ?>
                                            <option value="<?php echo $condicion['EST_NOMBRE']; ?>"></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>

                                <!-- Tipo Grado -->
                                <div class="mb-3 d-flex text-center justify-content-center align-items-center">
                                    <label class="form-label fw-bold fs-6">Modalidad Titulación: </label>
                                    <input type="list" list="tipograd" class="form-control m-2 p-1" name="id_tipo_grado" required>
                                    <datalist id="tipograd">
                                        <option value="" selected disabled>Seleccione</option>
                                        <!-- Obtener valores de la tbl -->
                                        <?php foreach ($tbl_modalida_titulacion as $modalidad) : ?>
                                            <option value="<?php echo $modalidad['MODT_NOMBRE']; ?>"></option>
                                        <?php endforeach; ?>
                                    </datalist>
                                </div>

                                <!-- Periodo -->
                                <div class="mb-3 d-flex text-center justify-content-center align-items-center">
                                    <label class="form-label fw-bold fs-6">Periodo: </label>
                                    <input list="periodos" class="form-control m-2 p-1" id="periodoInput" name="id_periodo" required>
                                    <!-- crear periodo  modal-->
                                    <button type="button" class="btn btn-primary badge rounded-pill" data-bs-toggle="modal" data-bs-target="#modalPeriodo">
                                        <i class="fa-solid fa-plus fa-lg"></i> </button>

                                    <datalist id="periodos">
                                        <!-- Obtener valores de la tbl y generar opciones -->
                                        <?php foreach ($tbl_periodo as $periodo) : ?>
                                            <option value="<?php echo $periodo['PER_PERIODO']; ?>">
                                            <?php endforeach; ?>
                                    </datalist>
                                </div>

                                <!-- Carreras -->
                                <div class="mb-3 d-flex text-center justify-content-center align-items-center">
                                    <label class="form-label fw-bold fs-6">Carreras: </label>
                                    <input list="carreras" class="form-control m-2 p-1" id="carreraInput" name="id_carrera" required>
                                    <!-- Carrera modal crear -->
                                    <button type="button" class="btn btn-primary badge rounded-pill" data-bs-toggle="modal" data-bs-target="#modalCarrera">
                                        <i class="fa-solid fa-plus fa-lg"></i> </button>
                                    <datalist id="carreras">
                                        <!-- Obtener valores de la tbl y generar opciones -->
                                        <?php foreach ($tbl_carrera as $carrera) : ?>
                                            <option value="<?php echo $carrera['CAR_NOMBRE']; ?>">
                                            <?php endforeach; ?>
                                    </datalist>
                                </div>

                                <!-- Sede -->
                                <div class="mb-3 d-flex text-center justify-content-center align-items-center">
                                    <label class="form-label fw-bold fs-6">Sede: </label>
                                    <input list="sede" class="form-control m-2 p-1" id="sedeInput" name="sede" required>
                                    <datalist id="sede">
                                        <option value="Ibarra"></option>
                                        <option value="Tulcán"></option>
                                    </datalist>
                                </div>

                            </div>

                            <!-- Específicos -->
                            <div class="container col-md-6">
                                <!-- Genero -->
                                <label class="form-label fw-bold fs-6">Género: </label>
                                <div class="d-flex text-center justify-content-center align-items-center">
                                    <br>
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mars"></i> Masculino</span>
                                    <input type="number" class="form-control" placeholder="# Cantidad" aria-label="Username" aria-describedby="basic-addon1" min="0" required id="cantmasgen" name="cantmasgen">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-venus"></i> Femenino</span>
                                    <input type="number" class="form-control" placeholder="# Cantidad" aria-label="Username" aria-describedby="basic-addon1" min="0" required id="cantfemgen" name="cantfemgen">
                                </div>

                                <br>
                                <!-- Generador de etnia -->
                                <button type="button" class="btn btn-primary m-1" id="btnEtnia"><i class="fa-solid fa-square-plus"></i> Ingresar Género por Etnia</button>
                                <input type="number" id="indexetnia" name="indexetnia" val=0 hidden>
                                <div id="etnias"></div>

                                <!-- Gnerador de nacionalidad -->
                                <button type="button" class="btn btn-primary m-1" id="btnNacionalidad"><i class="fa-solid fa-square-plus"></i> Ingresar Género por Nacionalidad</button>
                                <input type="number" id="indexnacionalidad" name="indexnacionalidad" val=0 hidden>

                                <div id="nacionalidades"></div>

                                <!-- genero discapacitados -->
                                <button type="button" class="btn btn-primary m-1" id="btnDiscapacitado"><i class="fa-solid fa-square-plus"></i> Ingresar Género por Discapacidad</button>
                                <div id="discapacidad"></div>

                                <!-- total -->
                                <input type="number" id="total" name="totalgen" hidden>
                            </div>

                            <button type="submit" class="btn btn-success m-3">Ingresar Datos</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Periodo -->
<div class="modal fade " id="modalPeriodo" tabindex="-1" aria-labelledby="modalper" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalper">
                    <i class="fa-solid fa-calendar-check"></i>
                    Crear Periodo
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('index.php/subidaDatos/crearPeriodo') ?>" method="POST" enctype="multipart/form-data">
                    <label for="añotextPeriodo"><b>Año: </b></label>
                    <input type="text" class="form-control" id="añotextPeriodo" name="anoperiodo" required>
                    <label for="periodoNombre"><b>Periodo Nombre: </b></label>
                    <input type="text" class="form-control" id="periodoNombre" name="nombreperiodo" required>
                    <label for=""><b>Periodo Actual: </b></label>
                    <div class="d-flex">
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="activoper" id="siper" required value="1">
                            <label class="form-check-label" for="siper">
                                Sí
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="activoper" id="noper" checked required value="0">
                            <label class="form-check-label" for="noper">
                                No
                            </label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <button type="submit" class="btn btn-success">
                    Crear Periodo
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    jQuery(document).ready(function() {

        //?buscador select

        //?etnia    
        var index = 0;
        // Al hacer clic en el botón "Ingresar Género por Etnia"
        $("#btnEtnia").click(function() {

            // Crea un nuevo formulario
            var newForm = `
                    <div class="card p-3 m-2">
                        <div class="mb-3 d-flex text-center justify-content-center align-items-center">
                            <label class="form-label fw-bold fs-6">Etnia: </label>
                            <select class="form-select m-2 p-1" aria-label="select" name="etnia_${index}" required>
                                <option value="" selected disabled>Seleccione</option>
                                <option value="Mestizo">Mestizo</option>
                                <option value="Indígena">Indígena</option>
                                <option value="Afroecuatoriano">Afroecuatoriano</option>
                                <option value="Montubio">Montubio</option>
                                <option value="Mulato">Mulato</option>
                                <option value="Negro">Negro</option>
                                <option value="Blanco">Blanco</option>
                             </select>
                        </div>
                        <div class="d-flex text-center justify-content-center align-items-center">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mars"></i> Masculino</span>
                            <input type="number" class="form-control cantidadMasculino" placeholder="# Cantidad" aria-label="masculino" aria-describedby="basic-addon1" min="0" required id="cantmasgenetnia" name="cantmasgenetnia_${index}">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-venus"></i> Femenino</span>
                            <input type="number" class="form-control cantidadFemenino" placeholder="# Cantidad" aria-label="femenino" aria-describedby="basic-addon1" min="0" required  id="cantfemgenetnia" name="cantfemgenetnia_${index}">
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="button" class="btn btn-danger m-1 delete"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                `;

            // Agrega el nuevo formulario al div con ID "etnias"
            $("#etnias").append(newForm);

            index++;
            //agregar index valor
            $("#indexetnia").val(index);

        });

        // Al hacer clic en el botón "Delete" dentro del formulario
        $("#etnias").on("click", ".delete", function() {
            // Elimina el formulario al que pertenece el botón de eliminar
            $(this).closest(".card").remove();
            //restar -1 al index
            $("#indexetnia").val($("#indexetnia").val() - 1);
        });

        //?nacionalidad
        var indexnacionalidad = 0;
        // Al hacer clic en el botón "Ingresar Género por Nacionalidad"
        $("#btnNacionalidad").click(function() {
            //crear form nacionalidad
            var newForm = `
                    <div class="card p-3 m-2">
                        <div class="mb-3 d-flex text-center justify-content-center align-items-center">
                            <label class="form-label fw-bold fs-6">Etnia: </label>
                            <select class="form-select m-2 p-1" aria-label="select" name="nacionalidad_${indexnacionalidad}" required>
                                <option value="" selected disabled>Seleccione</option>
                                <option value="Ecuatoriana">Ecuatoriana</option>
                                <option value="Colombiana">Colombiana</option>
                                <option value="Española">Española</option>
                                <option value="Francesa">Francesa</option>
                                <option value="Estadounidense">Estadounidense</option>
                                <option value="Peruana">Peruana</option>
                                <option value="Rumana">Rumana</option>
                                <option value="Cubana">Cubana</option>
                                <option value="Ucraniana">Ucraniana</option>
                                <option value="Venezolana">Venezolana</option>
                             </select>
                        </div>
                        <div class="d-flex text-center justify-content-center align-items-center">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mars"></i> Masculino</span>
                            <input type="number" class="form-control cantidadMasculino" placeholder="# Cantidad" aria-label="Username" aria-describedby="basic-addon1" min="0" required id="cantmasgennacionalidad" name="cantmasgennacionalidad_${indexnacionalidad}">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-venus"></i> Femenino</span>
                            <input type="number" class="form-control cantidadFemenino" placeholder="# Cantidad" aria-label="Username" aria-describedby="basic-addon1" min="0" required id="cantmasgennacionalidad" name="cantmasgennacionalidad_${indexnacionalidad}">
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="button" class="btn btn-danger m-1 delete"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                `;

            // Agrega el nuevo formulario al div con ID "nacionalidades"
            $("#nacionalidades").append(newForm);

            indexnacionalidad++;
            //agregar index valor
            $("#indexnacionalidad").val(indexnacionalidad);
        });

        //delete nacionalidad
        $("#nacionalidades").on("click", ".delete", function() {
            // Elimina el formulario al que pertenece el botón de eliminar
            $(this).closest(".card").remove();
            //restar -1 al index
            $("#indexnacionalidad").val($("#indexnacionalidad").val() - 1);
        });

        //?discapacidad
        // Al hacer clic en el botón "Ingresar Género por Discapacidad"
        $("#btnDiscapacitado").click(function() {
            //crear form nacionalidad
            var newForm = `
                    <div class="card p-3 m-2">
                        <div class="mb-3 d-flex text-center justify-content-center align-items-center">
                            <label class="form-label fw-bold fs-6">Dispacadidad: </label>
                        </div>
                        <div class="d-flex text-center justify-content-center align-items-center">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mars"></i> Masculino</span>
                            <input type="number" class="form-control cantidadMasculino" placeholder="# Cantidad" aria-label="Username" aria-describedby="basic-addon1" min="0" required name="discgenmas">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-venus"></i> Femenino</span>
                            <input type="number" class="form-control cantidadFemenino" placeholder="# Cantidad" aria-label="Username" aria-describedby="basic-addon1" min="0" required name="discgenfem">
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            <button type="button" class="btn btn-danger m-1 delete"><i class="fa-solid fa-trash"></i></button>
                        </div>
                    </div>
                `;

            // Agrega el nuevo formulario al div con ID "nacionalidades"
            $("#discapacidad").append(newForm);

            //ocultar boton
            $("#btnDiscapacitado").hide();
        });

        //delete discapacidad
        $("#discapacidad").on("click", ".delete", function() {
            // Elimina el formulario al que pertenece el botón de eliminar
            $(this).closest(".card").remove();
            //mostrar boton
            $("#btnDiscapacitado").show();
        });

        //?total
        // Función para calcular la suma y mostrarla en el campo de entrada
        function calcularSuma() {
            var cantMasculino = parseInt($("#cantmasgen").val()) || 0;
            var cantFemenino = parseInt($("#cantfemgen").val()) || 0;
            var suma = cantMasculino + cantFemenino;
            $("#total").val(suma);
        }

        // Detectar cambios en los campos de cantidad y calcular la suma
        $("#cantmasgen, #cantfemgen").on("input", calcularSuma);

    });
</script>