<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="http://localhost/SistemaGestionDocumental/index.php/FiltroEstadisticoPosgradoPeriodo/Graduados" class="btn btn-outline-primary">← Volver</a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Posgrado PUCE-I Por Periodos
            </h2>
            <h4 class="text-center text-dark">Búsqueda
                <!-- Obtener el periodo per_periodo desde el $perid -->
                <?php
                foreach ($tbl_periodo as $periodo) {
                    if ($periodo['PER_ID'] == $perid) {
                        echo $periodo['PER_PERIODO'];
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
        var peri = <?php echo json_encode($tbl_periodo) ?>;

        //graficar datos acorde al periodo
        var perid = <?php echo json_encode($perid) ?>;

        // Filtrar datos por ESTM_TIPO y ESTM_CONDICION y por el periodo seleccionado
        var filteredData = datos.filter(function(dato) {
            return dato.ESTM_PERIODO == perid && (dato.ESTM_TIPO === '1' && dato.ESTM_CONDICION === '3');
        });

        //! Por Años General
        {
            // Objeto para asociar periodos con totales
            var periodoTotalMap = {};

            // Recorrer los datos y el período
            for (let i = 0; i < filteredData.length; i++) { // Cambiado a filteredData
                var periodo = filteredData[i].ESTM_PERIODO; // Obtener el período directamente
                // Agregar el período si no está en el objeto
                if (!periodoTotalMap.hasOwnProperty(periodo)) {
                    periodoTotalMap[periodo] = 0; // Inicializar el total para este período en 0
                }
                // Acumular el total
                periodoTotalMap[periodo] += parseInt(filteredData[i].ESTM_TOTAL); // Cambiado a filteredData
            }

            // Obtener los períodos y sus totales
            var periodos = Object.keys(periodoTotalMap).map(Number);
            var totales = periodos.map(function(periodo) {
                return periodoTotalMap[periodo];
            });
        }

        //! Por Años Genero Masculino -> ESTM_GENERO_H
        {
            // Objeto para asociar periodos con totales
            var periodoTotalMap = {};

            // Recorrer los datos y el período
            for (let i = 0; i < filteredData.length; i++) { // Cambiado a filteredData
                var periodo = filteredData[i].ESTM_PERIODO; // Obtener el período directamente
                // Agregar el período si no está en el objeto
                if (!periodoTotalMap.hasOwnProperty(periodo)) {
                    periodoTotalMap[periodo] = 0; // Inicializar el total para este período en 0
                }
                // Acumular el total
                periodoTotalMap[periodo] += parseInt(filteredData[i].ESTM_GENERO_H); // Cambiado a filteredData
            }

            // Obtener los períodos y sus totales
            var periodos = Object.keys(periodoTotalMap).map(Number);
            var totalesH = periodos.map(function(periodo) {
                return periodoTotalMap[periodo];
            });
        }

        //! Por Años Genero Femenino -> ESTM_GENERO_M
        {
            // Objeto para asociar periodos con totales
            var periodoTotalMap = {};

            // Recorrer los datos y el período
            for (let i = 0; i < filteredData.length; i++) { // Cambiado a filteredData
                var periodo = filteredData[i].ESTM_PERIODO; // Obtener el período directamente
                // Agregar el período si no está en el objeto
                if (!periodoTotalMap.hasOwnProperty(periodo)) {
                    periodoTotalMap[periodo] = 0; // Inicializar el total para este período en 0
                }
                // Acumular el total
                periodoTotalMap[periodo] += parseInt(filteredData[i].ESTM_GENERO_M); // Cambiado a filteredData
            }

            // Obtener los períodos y sus totales
            var periodos = Object.keys(periodoTotalMap).map(Number);
            var totalesM = periodos.map(function(periodo) {
                return periodoTotalMap[periodo];
            });
        }

        //grafica pie chart
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
                text: 'Total Estudiantes Posgrado PUCE-I'
            },
            subtitle: {
                text: 'Graduados <br> <b>Periodo: </b>' +
                    /* nombre del periodo */
                    <?php
                    foreach ($tbl_periodo as $periodo) {
                        if ($periodo['PER_ID'] == $perid) {
                            echo "'" . $periodo['PER_PERIODO'] . "'";
                        }
                    }
                    ?>
            },
            xAxis: {
                crosshair: true,
                /* Nombre Periodo */
                categories: [
                    <?php
                    foreach ($tbl_periodo as $periodo) {
                        if ($periodo['PER_ID'] == $perid) {
                            echo "'" . $periodo['PER_PERIODO'] . "'";
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
                    name: '👨🏻‍🎓 Hmmbres',
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