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
                        <form action="" method="" enctype="multipart/form-data">

                            <!-- Generales -->
                            <div class="container col-md-6">
                                <!-- Tipo -->
                                <div class="mb-3 d-flex text-center justify-content-center align-items-center">
                                    <label class="form-label fw-bold fs-6">Tipo: </label>
                                    <select class="form-select m-2 p-1" aria-label="select" id="">
                                        <option selected hidden>Seleccione</option>
                                        <!-- Obtener valores de la  tabla-->
                                        <?php foreach ($tbl_carrera_tipo as $tipo) : ?>
                                            <option value="<?php echo $tipo['CTIP_ID']; ?>"><?php echo $tipo['CTIP_NOMBRE']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Condicion -->
                                <div class="mb-3 d-flex text-center justify-content-center align-items-center">
                                    <label class="form-label fw-bold fs-6">Condición: </label>
                                    <select class="form-select m-2 p-1" aria-label="select" id="">
                                        <option selected hidden>Seleccione</option>
                                        <!-- Obtener valores de la tbl -->
                                        <?php foreach ($tbl_estudiante as $condicion) : ?>
                                            <option value="<?php echo $condicion['EST_ID']; ?>"><?php echo $condicion['EST_NOMBRE']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Tipo Grado -->
                                <div class="mb-3 d-flex text-center justify-content-center align-items-center">
                                    <label class="form-label fw-bold fs-6">Modalidad Titulación: </label>
                                    <select class="form-select m-2 p-1" aria-label="select" id="">
                                        <option selected hidden>Seleccione</option>
                                        <!-- Obtener valores de la tbl -->
                                        <?php foreach ($tbl_modalida_titulacion as $modalidad) : ?>
                                            <option value="<?php echo $modalidad['MODT_ID']; ?>"><?php echo $modalidad['MODT_NOMBRE']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Periodo -->
                                <div class="mb-3 d-flex text-center justify-content-center align-items-center">
                                    <label class="form-label fw-bold fs-6">Periodo: </label>
                                    <select class="form-select m-2 p-1" aria-label="select" id="">
                                        <option selected hidden>Seleccione</option>
                                        <!-- Obtener valores de la tbl -->
                                        <?php foreach ($tbl_periodo as $periodo) : ?>
                                            <option value="<?php echo $periodo['PER_ID']; ?>"><?php echo $periodo['PER_PERIODO']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <!-- Carreras -->
                                <div class="mb-3 d-flex text-center justify-content-center align-items-center">
                                    <label class="form-label fw-bold fs-6">Carreras: </label>
                                    <select class="form-select m-2 p-1" aria-label="select" id="">
                                        <option selected hidden>Seleccione</option>
                                        <!-- Obtener valores de la tbl -->
                                        <?php foreach ($tbl_carrera as $carrera) : ?>
                                            <option value="<?php echo $carrera['CAR_ID']; ?>"><?php echo $carrera['CAR_NOMBRE']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Específicos -->
                            <div class="container col-md-6">
                                <!-- Genero -->
                                <label class="form-label fw-bold fs-6">Género: </label>
                                <div class="mb-3 d-flex text-center justify-content-center align-items-center">
                                    <br>
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-mars"></i> Masculino</span>
                                    <input type="number" class="form-control" placeholder="# Cantidad" aria-label="Username" aria-describedby="basic-addon1" min="0">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-venus"></i> Femenino</span>
                                    <input type="number" class="form-control" placeholder="# Cantidad" aria-label="Username" aria-describedby="basic-addon1" min="0">
                                </div>

                                <!-- Generador de etnia -->
                                <button type="button" class="btn btn-primary" id="btnEtnia"><i class="fa-solid fa-square-plus"></i> Ingresar Etnia</button>
                                <!-- Etnia -->
                                <div class="mb-3 d-flex text-center justify-content-center align-items-center">
                                    <label class="form-label fw-bold fs-6">Etnia: </label>
                                    <select class="form-select m-2 p-1" aria-label="select" id="">
                                        <option selected hidden>Seleccione</option>
                                        <option value="1">Mestizo</option>
                                        <option value="2">Indígena</option>
                                        <option value="3">Afroecuatoriano</option>
                                        <option value="4">Montubio</option>
                                        <option value="5">Mulato</option>
                                        <option value="6">Negro</option>
                                        <option value="7">Blanco</option>
                                    </select>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-success m-3">Ingresar Datos</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Js -->
<script>
    // btnEtnia
    var btnEtnia = document.getElementById("btnEtnia");

    btnEtnia.addEventListener("click", function() {
        alert("¡Haz hecho clic en el botón!");
    });
</script>