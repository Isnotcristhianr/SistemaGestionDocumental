<div class="container-center m-5 p-3 bg-light rounded col-xs-6 shadow-lg p-3 mb-5 bg-body rounded">
    <!-- Volver -->
    <a href="http://localhost/SistemaGestionDocumental/index.php/ReporteFechaGeneral" class="btn btn-outline-primary">← Volver</a>
    <div class="row ">
        <div class="col-12">
            <h2 class="text-center text-primary">Datos Estadísticos Grado PUCE-I Por Fechas
            </h2>
            <h4 class="text-center text-dark">Búsqueda
                Desde: <?php echo $fechaInicio ?>
                Hasta: <?php echo $fechaFin ?> </h4>
            <h5 class="text-center text-secondary"> Matriculados - Graduados
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
        var fechasEnRango = [];

        for (var i = fechaDesde; i <= fechaHasta; i++) {
            fechasEnRango.push(i.toString()); // Convierte de nuevo a cadena de texto si es necesario
        }

        function getYears(data) {
            var years = [];
            //logica -> periodo
            //recorrer datos
            for (let i = 0; i < data.length; i++) {
                //recorrer peri
                for (let j = 0; j < peri.length; j++) {
                    //comparar PER_ID con ESTM_PERIODO
                    if (data[i].ESTM_PERIODO == peri[j].PER_ID) {
                        //agregar PER_ANO a periodo
                        years.push(peri[j].PER_ANO);
                    }
                }
            }

            //eliminar años repetidos de periodo y su total asignado
            years = years.filter((value, index) => years.indexOf(value) === index);

            //ordenar periodo de menor a mayor
            years.sort(function(a, b) {
                return a - b;
            });

            return years;

        }

        // Filtrar datos por ESTM_TIPO y ESTM_CONDICION (2 y 1 o 3)
        var filteredData = datos.filter(function(dato) {
            return dato.ESTM_TIPO === '2' && (dato.ESTM_CONDICION === '1' || dato.ESTM_CONDICION === '3');
        });

        // Obtener los años de los datos filtrados
        var yearsFiltered = getYears(filteredData);

        // Obtener los periodos de los datos fecha desde y hasta
        var periodoFiltrado = getYears(filteredData);


        //! Por Años General
        {
            // Objeto para asociar periodos con totales
            var periodoTotalMap = {};

            // Recorrer los datos y el período
            for (let i = 0; i < filteredData.length; i++) { // Cambiado a filteredData
                for (let j = 0; j < peri.length; j++) {
                    if (filteredData[i].ESTM_PERIODO == peri[j].PER_ID) { // Cambiado a filteredData
                        // Agregar PER_ANO a periodo si no está en el objeto
                        if (!periodoTotalMap.hasOwnProperty(peri[j].PER_ANO)) {
                            periodoTotalMap[peri[j].PER_ANO] = 0; // Inicializar el total para este año en 0
                        }
                        // Acumular el total
                        periodoTotalMap[peri[j].PER_ANO] += parseInt(filteredData[i].ESTM_TOTAL); // Cambiado a filteredData
                    }
                }
            }

            // Obtener los totales ordenados de acuerdo con el nuevo orden de periodos
            var total = yearsFiltered.map(function(periodoKey) {
                return periodoTotalMap[periodoKey];
            });
        }

        //! Por Años Genero Masculino -> ESTM_GENERO_H
        {
            // Objeto para asociar periodos con totales de género masculino
            var periodoHTotalMap = {};

            // Recorrer los datos y el período
            for (let i = 0; i < filteredData.length; i++) { // Cambiado a filteredData
                for (let j = 0; j < peri.length; j++) {
                    if (filteredData[i].ESTM_PERIODO == peri[j].PER_ID) { // Cambiado a filteredData
                        // Agregar PER_ANO a periodoH si no está en el objeto
                        if (!periodoHTotalMap.hasOwnProperty(peri[j].PER_ANO)) {
                            periodoHTotalMap[peri[j].PER_ANO] = 0; // Inicializar el total para este año en 0
                        }
                        // Acumular el total de género masculino
                        periodoHTotalMap[peri[j].PER_ANO] += parseInt(filteredData[i].ESTM_GENERO_H); // Cambiado a filteredData
                    }
                }
            }

            // Obtener los totales de género masculino ordenados de acuerdo con el nuevo orden de periodos
            var totalH = yearsFiltered.map(function(periodoKey) {
                return periodoHTotalMap[periodoKey];
            });
        }

        //! Por Años Genero Femenino -> ESTM_GENERO_M
        {
            // Objeto para asociar periodos con totales de género femenino
            var periodoMTotalMap = {};

            // Recorrer los datos y el período
            for (let i = 0; i < filteredData.length; i++) { // Cambiado a filteredData
                for (let j = 0; j < peri.length; j++) {
                    if (filteredData[i].ESTM_PERIODO == peri[j].PER_ID) { // Cambiado a filteredData
                        // Agregar PER_ANO a periodoM si no está en el objeto
                        if (!periodoMTotalMap.hasOwnProperty(peri[j].PER_ANO)) {
                            periodoMTotalMap[peri[j].PER_ANO] = 0; // Inicializar el total para este año en 0
                        }
                        // Acumular el total de género femenino
                        periodoMTotalMap[peri[j].PER_ANO] += parseInt(filteredData[i].ESTM_GENERO_M); // Cambiado a filteredData
                    }
                }
            }

            // Obtener los totales de género femenino ordenados de acuerdo con el nuevo orden de periodos
            var totalM = yearsFiltered.map(function(periodoKey) {
                return periodoMTotalMap[periodoKey];
            });
        }


        //grafica
        Highcharts.chart('container', {
            chart: {
                type: 'line',
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
                text: 'Total de Estudiantes Histórico PUCE-I '
            },
            subtitle: {
                text: '<b>📅 Desde: </b> ' +
                    '<?php echo $fechaInicio ?>' +
                    ' <b>📅 Hasta: </b> ' +
                    '<?php echo $fechaFin ?>'
            },
            xAxis: {
                categories: fechasEnRango,
                title: {
                    text: 'Año'
                },
            },
            yAxis: {
                title: {
                    text: 'Total de Estudiantes'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                },
            },
            series: [{
                    name: 'Total',
                    data: total
                },

                {
                    name: '👨‍🦱 Hombres',
                    data: totalH
                },
                {
                    name: '👩‍🦰 Mujeres',
                    data: totalM
                }
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
                    fontSize: "15px"
                },
            }
        });
    </script>
    <br>

</div>