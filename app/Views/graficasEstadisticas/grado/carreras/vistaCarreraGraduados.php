<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="http://localhost/SistemaGestionDocumental/index.php/FiltroEstadisticoGradoCarrera/General" class="btn btn-outline-primary">← Volver</a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Grado PUCE-I
            </h2>
            <h4 class="text-center text-dark">Búsqueda
                <!-- Obtener el id de la carrera -->
                <?php
                //comparar el id de la carrera con el id de la carrera de la matriz y obtener el nombre
                //la carrera se obtiene de la tabla tbl_carrera 
                foreach ($tbl_carrera as $carrera) {
                    if ($carrera['CAR_ID'] == $car_id) {
                        echo $carrera['CAR_NOMBRE'];
                    }
                }

                ?>
            </h4>
            <h5 class="text-center text-secondary"> Graduados
            </h5>
        </div>
        <div class="col-12">
            <h5 class="text-center text-secondary">↓ Reporte ↓</h5>
        </div>
    </div>
</div>
<!-- Contenido-->

<!--! ERROR DESDE AQUI REVISAR -->
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

        //graficar datos acorde a la carrera seleccionada de tbl_estadistica_matriz, donde el id se compara con ESTM_CARRERA
        var carid = <?php echo $car_id ?>;

        // Filtrar datos por ESTM_TIPO y ESTM_CONDICION con la carrera seleccionada, por ESTM_TIPO y ESTM_CONDICION
        var filteredData = datos.filter(function(dato) {
            return dato.ESTM_CARRERA == carid && (dato.ESTM_TIPO === '2' && dato.ESTM_CONDICION === '3');
        });

        //! Por Años General
        {
            // Objeto para asociar carreras con totales
            var carreraTotalMap = {};

            // Recorrer los datos y la carrera
            for (let i = 0; i < filteredData.length; i++) { // Cambiado a filteredData
                var carrera = filteredData[i].ESTM_CARRERA; // Obtener la carrera directamente
                // Agregar la carrera si no está en el objeto
                if (!carreraTotalMap.hasOwnProperty(carrera)) {
                    carreraTotalMap[carrera] = 0; // Inicializar el total para esta carrera en 0
                }
                // Acumular el total
                carreraTotalMap[carrera] += parseInt(filteredData[i].ESTM_TOTAL); // Cambiado a filteredData
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

            // Recorrer los datos y la carrera
            for (let i = 0; i < filteredData.length; i++) { // Cambiado a filteredData
                var carrera = filteredData[i].ESTM_CARRERA; // Obtener la carrera directamente
                // Agregar la carrera si no está en el objeto
                if (!carreraTotalMap.hasOwnProperty(carrera)) {
                    carreraTotalMap[carrera] = 0; // Inicializar el total para esta carrera en 0
                }
                // Acumular el total
                carreraTotalMap[carrera] += parseInt(filteredData[i].ESTM_GENERO_H); // Cambiado a filteredData
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

            // Recorrer los datos y la carrera
            for (let i = 0; i < filteredData.length; i++) { // Cambiado a filteredData
                var carrera = filteredData[i].ESTM_CARRERA; // Obtener la carrera directamente
                // Agregar la carrera si no está en el objeto
                if (!carreraTotalMap.hasOwnProperty(carrera)) {
                    carreraTotalMap[carrera] = 0; // Inicializar el total para esta carrera en 0
                }
                // Acumular el total
                carreraTotalMap[carrera] += parseInt(filteredData[i].ESTM_GENERO_M); // Cambiado a filteredData
            }

            // Obtener las carreras y sus totales
            var carreras = Object.keys(carreraTotalMap).map(Number);
            var totalesM = carreras.map(function(carrera) {
                return carreraTotalMap[carrera];
            });
        }

        //grafica pie chart


        //tam dinamico
        // Calcular el alto deseado en función de la cantidad de carreras
        var altoDeseado = carreras.length * 100;

        //ALTO MINIMO
        if (altoDeseado < 400) {
            altoDeseado = 400;
        }

        //ALTO MAXIMO
        if (altoDeseado > 500) {
            altoDeseado = 500;
        }

        // Establecer el alto del contenedor
        document.getElementById('container').style.height = altoDeseado + 'px';

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
                text: 'Graduados <br> <b>Carrera: </b>' +
                    /* nombre de la carrera */
                    <?php
                    foreach ($tbl_carrera as $carrera) {
                        if ($carrera['CAR_ID'] == $car_id) {
                            echo "'" . $carrera['CAR_NOMBRE'] . "'";
                        }
                    }
                    ?>
            },
            xAxis: {
                crosshair: true,
                /* Nombre Carrera */
                categories: [
                    <?php
                    foreach ($tbl_carrera as $carrera) {
                        if ($carrera['CAR_ID'] == $car_id) {
                            echo "'" . $carrera['CAR_NOMBRE'] . "'";
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
                    name: '👨🏻‍🎓 Hombres',
                    data: totalesH
                },
                {
                    name: '👩🏻‍🎓 Mujeres',
                    data: totalesM
                },
                {
                    name: '👨🏻‍🎓👩🏻‍🎓 Total',
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
                text: "Secretaría General PUCE-I",
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