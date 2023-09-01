<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="http://localhost/SistemaGestionDocumental/index.php/FiltroEstadisticoGradoEscuela/General" class="btn btn-outline-primary">← Volver</a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Grado PUCE-I
            </h2>
            <h4 class="text-center text-dark">Búsqueda:
                <!-- Obtener el id de la escuela -->
                <?php
                foreach ($tbl_carrera as $row) {
                    if ($row['CAR_ID'] == $id) {
                        echo $row['CAR_NOMBRE'];
                    }
                }
                ?>
            </h4>
            <h5 class="text-center text-secondary"> Matriculados - Graduados
            </h5>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Reporte ↓</h5>
            <p class="text-center text-secondary" id="carreras"></p>
        </div>
    </div>
</div>

<!-- Contenido-->
<div class="container-center m-5 p-1 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <div id="exportContainer">

        <!-- Reporte Estadistico -->
        <figure class="highcharts-figure">
            <div id="container"></div>
        </figure>
    </div>

    <!-- Hichart -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <!-- Grafica -->
    <script>
        //TODO: obtener datos de php del controlador
        var datos = <?php echo json_encode($tbl_estadistica_matriz) ?>;
        var carrera = <?php echo json_encode($tbl_carrera) ?>;

        //tbl_carrera tiene car_padreesc que se compara con el id de la escuela
        //se obtiene un conjunto de carreras que corresponden a la escuela
        //guardar los id de las carreras en un array, se guardan los id de CAR_ID que corresponden a la escuela
        //CTIP_ID debe ser 2 (GRADO), CAR_CARRERA = 1 (CARRERA)
        //CAR_ACTIVA = SÍ
        var carreras = [];
        for (var i = 0; i < carrera.length; i++) {
            if (carrera[i].CAR_PADREESC == <?php echo $id ?> && carrera[i].CTIP_ID == 2 && carrera[i].CAR_CARRERA == 1 && carrera[i].CAR_ACTIVA == 'SÍ') {
                carreras.push(carrera[i].CAR_ID);
            }
        }
        //alert(carreras);
        //mostrar nombres de carreras segun el id
        var nombreCarreras = [];
        for (var i = 0; i < carreras.length; i++) {
            for (var j = 0; j < carrera.length; j++) {
                if (carreras[i] == carrera[j].CAR_ID) {
                    nombreCarreras.push(carrera[j].CAR_NOMBRE);
                }
            }
        }
        document.getElementById("carreras").innerHTML = nombreCarreras;

        //graficar datos acorde a las carreras
        var carid = carreras;

        // Filtrar datos por ESTM_TIPO y ESTM_CONDICION con las carreras seleccionada, por ESTM_TIPO y ESTM_CONDICION
        var filteredData = datos.filter(function(dato) {
            return carid.includes(dato.ESTM_CARRERA) && (dato.ESTM_TIPO === '2' && (dato.ESTM_CONDICION === '1' || dato.ESTM_CONDICION === '3'));
        });

        //! Por Años General
        {
            // Objeto para asociar carreras con totales
            var carreraTotalMap = {};

            // Recorrer los datos y las carreras
            for (let i = 0; i < filteredData.length; i++) { // Cambiado a filteredData
                var carrera = filteredData[i].ESTM_CARRERA; // Obtener la carrera directamente
                // Agregar la carrera si no está en el objeto
                if (!carreraTotalMap[carrera]) {
                    carreraTotalMap[carrera] = 0;
                }
                // Sumar el total
                carreraTotalMap[carrera] += parseInt(filteredData[i].ESTM_TOTAL);
            }

            // Obtener las carreras y sus totales
            var carreras = Object.keys(carreraTotalMap).map(Number);
            var totales = carreras.map(function(carrera) {
                return carreraTotalMap[carrera];
            });


        }

        //! Por Años Genero Masculino -> ESTM_GENERO_H
        {
            // Objeto para asociar carreras con totales
            var carreraTotalMap = {};

            // Recorrer los datos y las carreras
            for (let i = 0; i < filteredData.length; i++) { // Cambiado a filteredData
                var carrera = filteredData[i].ESTM_CARRERA; // Obtener la carrera directamente
                // Agregar la carrera si no está en el objeto
                if (!carreraTotalMap[carrera]) {
                    carreraTotalMap[carrera] = 0;
                }
                // Sumar el total
                carreraTotalMap[carrera] += parseInt(filteredData[i].ESTM_GENERO_H);
            }

            // Obtener las carreras y sus totales
            var carreras = Object.keys(carreraTotalMap).map(Number);
            var totalesH = carreras.map(function(carrera) {
                return carreraTotalMap[carrera];
            });
        }

        //! Por Años Genero Femenino -> ESTM_GENERO_M
        {
            // Objeto para asociar carreras con totales
            var carreraTotalMap = {};

            // Recorrer los datos y las carreras
            for (let i = 0; i < filteredData.length; i++) { // Cambiado a filteredData
                var carrera = filteredData[i].ESTM_CARRERA; // Obtener la carrera directamente
                // Agregar la carrera si no está en el objeto
                if (!carreraTotalMap[carrera]) {
                    carreraTotalMap[carrera] = 0;
                }
                // Sumar el total
                carreraTotalMap[carrera] += parseInt(filteredData[i].ESTM_GENERO_M);
            }

            // Obtener las carreras y sus totales
            var carreras = Object.keys(carreraTotalMap).map(Number);
            var totalesM = carreras.map(function(carrera) {
                return carreraTotalMap[carrera];
            });
        }

        //grafica
        Highcharts.chart('container', {
            chart: {
                type: 'column',
                //marca de agua
                events: {
                    load: function() {
                        //imagen opaca fondo
                        this.renderer.image('<?php echo base_url('/public/imgs/logoPucesi.png') ?>')
                            .css({
                                opacity: 0.35
                            })
                            .add();
                    }
                }
            },
            title: {
                text: 'Total Estudiantes Grado PUCE-I'
            },
            subtitle: {
                text: 'Matriculados - Graduados <br> <b>Escuela: </b>' +
                    /* nombre de la escuela */
                    <?php
                    foreach ($tbl_carrera as $row) {
                        if ($row['CAR_ID'] == $id) {
                            echo "'" . $row['CAR_NOMBRE'] . "'";
                        }
                    }
                    ?> +
                    '<br> <b>Carreras: </b>' +
                    /* nombre de las carreras */
                    nombreCarreras
            },
            xAxis: {
                crosshair: true,
                /* Nombre escuela */
                categories: [
                    <?php
                    foreach ($tbl_carrera as $row) {
                        if ($row['CAR_ID'] == $id) {
                            echo "'" . $row['CAR_NOMBRE'] . "'";
                        }
                    }
                    ?>
                ]

            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Cantidad de Estudiantes'
                }
            },

            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true, // Habilita etiquetas de datos
                        format: '{y}', // Muestra el valor de Y (cantidad de estudiantes)
                        style: {
                            fontWeight: 'bold',
                            color: 'black' // Color de las etiquetas
                        }
                    }
                }
            },
            series: [{
                    name: 'Hombres',
                    data: totalesH
                },
                {
                    name: 'Mujeres',
                    data: totalesM
                },
                {
                    name: 'Total',
                    data: totales
                },
            ],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            },
            credits: {
                enabled: true,
                href: "https://www.pucesi.edu.ec/webs2/",
                text: "Secretaria General PUCE-I",
                style: {
                    color: "#666666",
                    cursor: "pointer",
                    fontSize: "10px"
                },
            }
        });
    </script>
    <br>
</div>