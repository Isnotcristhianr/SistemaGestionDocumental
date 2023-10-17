<div class="container m-5 p-3">
    <div class="row justify-content-center">

        <div class="col-12 col-md-8">
            <div class="container border border-primary-subtle p-3 shadow rounded bg-light text-primary">
                <div class="mb-3 text-left">
                    <a href="<?= base_url('/index.php/subidaDatos'); ?>" class="btn btn-outline-primary">
                        <i class="fa-solid fa-caret-left"></i> Volver
                    </a>
                </div>
                <div class="text-center ">
                    <h1 class="fs-5">
                        <i class="fa-solid fa-calendar-check"></i> Crear Carrera
                    </h1>
                </div>
                <form action="<?php echo base_url('index.php/subidaDatos/crearCarreraDesdeMenu') ?>" method="POST" enctype="multipart/form-data">
                    <label class="form-label"><b>Carrera Tipo: </b></label>
                    <input type="text" list="carreratipo" class="form-control" name="cartipo" id="form-label" required>
                    <datalist id="carreratipo">
                        <!-- Obtener valores de la tabla-->
                        <option value="Grado"></option>
                        <option value="Posgrado"></option>
                        <option value="Tecnología"></option>
                    </datalist>

                    <label for="form-nombre"><b>Nombre: </b></label>
                    <input type="text" class="form-control" id="form-nombre" name="carnombre" required>

                    <label for="form-escuela"><b>Escuela: </b></label>
                    <!-- datalist de escuelas -->
                    <input type="text" list="escuelas" class="form-control" name="escuela" id="form-escuela" required>
                    <datalist id="escuelas">
                        <?php
                        $opciones = [];

                        foreach ($tbl_carrera as $carreraesc) {
                            /* 
                            1.CAR_CARRERA=0
                            2.CAR_ESCUELA=1
                            */

                            if ($carreraesc['CAR_CARRERA'] == 0 && $carreraesc['CAR_ESCUELA'] == 1 && count($opciones) < 325) {
                                $opciones[] = $carreraesc['CAR_NOMBRE'];
                            }
                        }

                        echo "<script>console.log('Mnesaje Desarrolador: la consulta esta optimizada a 325 registros de tbl_carreras, si no registra o no muestra contactarlo para modificar el codigo')</script>";
                        // Imprimir las opciones como elementos de lista
                        foreach ($opciones as $opcion) {
                            echo '<option value="' . htmlspecialchars($opcion) . '"></option>';
                        }
                        ?>
                    </datalist>

                    <label for="form-active"><b>Activa: </b></label>
                    <div class="d-flex">
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="activecar" id="sicar" required value="SÍ">
                            <label class="form-check-label" for="sicar">
                                Sí
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="activecar" id="nocar" checked required value="No">
                            <label class="form-check-label" for="nocar">
                                No
                            </label>
                        </div>
                    </div>

                    <label for="form-sede"><b>Sede: </b></label>
                    <div class="d-flex">
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="sede" id="sedeib" checked required value="1">
                            <label class="form-check-label" for="sedeib">
                                Ibarra
                            </label>
                        </div>
                        <div class="form-check m-2">
                            <input class="form-check-input" type="radio" name="sede" id="sedetul" required value="2">
                            <label class="form-check-label" for="sedetul">
                                Tulcan
                            </label>
                        </div>
                    </div>

                    <div class="text-end">
                        <a href="<?= base_url('/index.php/subidaDatos'); ?>" class="btn btn-danger me-2">
                            <i class="fa-solid fa-xmark"></i> Cancelar
                        </a>
                        <button type="submit" class="btn btn-success">
                            Crear Carrera
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
